<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelKrs extends Model
{
    public function allData()
    {
        return $this->db->table('tbl_mhs')
            ->join('tbl_prodi', 'tbl_prodi.id_prodi=tbl_mhs.id_prodi')
            ->orderBy('id_mhs', 'DESC')
            ->get()->getResultArray();
    }
    public function DataMahasiswa()
    {
        return $this->db->table('tbl_mhs')
            ->join('tbl_prodi', 'tbl_prodi.id_prodi=tbl_mhs.id_prodi')
            ->join('tbl_fakultas', 'tbl_prodi.id_fakultas=tbl_fakultas.id_fakultas')
            ->join('tbl_kelas', 'tbl_mhs.id_kelas=tbl_kelas.id_kelas')
            ->join('tbl_dosen', 'tbl_dosen.id_dosen=tbl_kelas.id_dosen')
            ->where('tbl_mhs.nim', session()->get('nim'))
            ->get()->getRowArray();
    }

    public function DetailMhs()
    {
        return $this->db->table('tbl_mhs')
            ->join('tbl_prodi', 'tbl_prodi.id_prodi=tbl_mhs.id_prodi', 'left')
            ->join('tbl_fakultas', 'tbl_fakultas.id_fakultas=tbl_prodi.id_fakultas')
            ->join('tbl_kelas', 'tbl_mhs.id_kelas=tbl_kelas.id_kelas', 'left')
            ->join('tbl_dosen', 'tbl_dosen.id_dosen=tbl_kelas.id_dosen', 'left')
            ->where('tbl_mhs.nim', session()->get('nim'))
            ->get()->getRowArray();
    }
    public function add($data)
    {
        $this->db->table('tbl_mhs')->insert($data);
    }

    public function edit($data)
    {
        $this->db->table('tbl_mhs')->where('id_mhs', $data['id_mhs'])
            ->update($data);
    }

    public function hapus($data)
    {
        $this->db->table('tbl_krs')->where('id_krs', $data['id_krs'])
            ->delete($data);
    }

    public function MakulDitawarkan($id_ta = false, $id_prodi = false)
    {
        $query = $this->db->query("SELECT 
                                    tbl_jadwal.*,tbl_ta.ta,tbl_matkul.*,tbl_prodi.*,tbl_kelas.*,tbl_ruangan.*,tbl_gedung.*,tbl_dosen.*
                                FROM tbl_jadwal
                                LEFT JOIN tbl_ta  ON tbl_ta.id_ta=tbl_jadwal.id_ta 
                                LEFT JOIN tbl_matkul  ON tbl_matkul.id_matkul=tbl_jadwal.id_matkul 
                                LEFT JOIN tbl_prodi  ON tbl_prodi.id_prodi=tbl_jadwal.id_prodi 
                                LEFT JOIN tbl_kelas  ON tbl_kelas.id_kelas=tbl_jadwal.id_kelas 
                                LEFT JOIN tbl_ruangan  ON tbl_ruangan.id_ruangan=tbl_jadwal.id_ruangan 
                                LEFT JOIN tbl_gedung  ON tbl_gedung.id_gedung=tbl_ruangan.id_gedung 
                                LEFT JOIN tbl_dosen  ON tbl_dosen.id_dosen=tbl_jadwal.id_dosen 
                                WHERE  tbl_matkul.id_prodi =$id_prodi")
            ->getResultArray();
        return $query;
    }
    public function MakulDitawarkan1($id_ta, $id_prodi)
    {
        return $this->db->table('tbl_jadwal')
            ->join('tbl_matkul', 'tbl_matkul.id_matkul=tbl_jadwal.id_matkul')
            ->join('tbl_prodi', 'tbl_prodi.id_prodi=tbl_jadwal.id_prodi')
            ->join('tbl_kelas', 'tbl_kelas.id_kelas=tbl_jadwal.id_kelas')
            ->join('tbl_ruangan', 'tbl_ruangan.id_ruangan=tbl_jadwal.id_ruangan')
            ->join('tbl_gedung', 'tbl_gedung.id_gedung=tbl_ruangan.id_gedung')
            ->join('tbl_dosen', 'tbl_dosen.id_dosen=tbl_jadwal.id_dosen')
            ->where('tbl_jadwal.id_ta', $id_ta)
            ->where('tbl_matkul.id_prodi', $id_prodi)
            ->where('tbl_krs.id_krs IS NULL')
            ->get()->getResultArray();
    }

    public function TambahMatkul($data)
    {
        $this->db->table('tbl_krs')->insert($data);
    }

    public function DataKrs($id_mhs, $id_ta)
    {
        return   $this->db->table('tbl_krs')
            ->join('tbl_mhs', 'tbl_mhs.id_mhs=tbl_krs.id_mhs')
            ->join('tbl_jadwal', 'tbl_jadwal.id_jadwal=tbl_krs.id_jadwal')
            ->join('tbl_ta', 'tbl_ta.id_ta=tbl_krs.id_ta')
            ->join('tbl_prodi', 'tbl_prodi.id_prodi=tbl_mhs.id_prodi')
            ->join('tbl_matkul', 'tbl_matkul.id_matkul=tbl_jadwal.id_matkul')
            ->join('tbl_kelas', 'tbl_kelas.id_kelas=tbl_jadwal.id_kelas')
            ->join('tbl_dosen', 'tbl_dosen.id_dosen=tbl_jadwal.id_dosen')
            ->join('tbl_ruangan', 'tbl_ruangan.id_ruangan=tbl_jadwal.id_ruangan')
            ->join('tbl_gedung', 'tbl_gedung.id_gedung=tbl_ruangan.id_gedung')
            ->where('tbl_mhs.id_mhs', $id_mhs)
            ->where('tbl_krs.id_ta', $id_ta)
            ->get()->getResultArray();
    }
}
