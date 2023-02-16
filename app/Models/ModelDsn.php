<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelDsn extends Model
{
    public function JadwalDsn($id_ta = false)
    {
        if ($id_ta) {
            return $this->db->table('tbl_jadwal')
                ->join('tbl_matkul', 'tbl_jadwal.id_matkul = tbl_matkul.id_matkul')
                ->join('tbl_ta', 'tbl_jadwal.id_ta = tbl_ta.id_ta')
                ->join('tbl_kelas', 'tbl_jadwal.id_kelas = tbl_kelas.id_kelas')
                ->join('tbl_prodi', 'tbl_kelas.id_prodi = tbl_prodi.id_prodi')
                ->join('tbl_dosen', 'tbl_jadwal.id_dosen = tbl_dosen.id_dosen')
                ->join('tbl_ruangan', 'tbl_jadwal.id_ruangan = tbl_ruangan.id_ruangan')
                ->where('tbl_jadwal.id_dosen', session()->get('id_dosen'))
                ->where('tbl_jadwal.id_ta', $id_ta)
        ->orderBy('tbl_matkul.kode_matkul','ASC')
                ->get()->getResultArray();
        } else {
            return $this->db->table('tbl_jadwal')
                ->join('tbl_matkul', 'tbl_jadwal.id_matkul = tbl_matkul.id_matkul')
                ->join('tbl_ta', 'tbl_jadwal.id_ta = tbl_ta.id_ta')
                ->join('tbl_kelas', 'tbl_jadwal.id_kelas = tbl_kelas.id_kelas')
                ->join('tbl_prodi', 'tbl_kelas.id_prodi = tbl_prodi.id_prodi')
                ->join('tbl_dosen', 'tbl_jadwal.id_dosen = tbl_dosen.id_dosen')
                ->join('tbl_ruangan', 'tbl_jadwal.id_ruangan = tbl_ruangan.id_ruangan')
                ->where('tbl_jadwal.id_dosen', session()->get('id_dosen'))
        ->orderBy('tbl_matkul.kode_matkul','ASC')
                ->get()->getResultArray();
        }
    }

    public function DetailJadwal($id_jadwal)
    {
        return $this->db->table('tbl_jadwal')
            ->join('tbl_matkul', 'tbl_jadwal.id_matkul = tbl_matkul.id_matkul')
            ->join('tbl_ta', 'tbl_jadwal.id_ta = tbl_ta.id_ta')
            ->join('tbl_kelas', 'tbl_jadwal.id_kelas = tbl_kelas.id_kelas')
            ->join('tbl_prodi', 'tbl_kelas.id_prodi = tbl_prodi.id_prodi')
            ->join('tbl_fakultas', 'tbl_prodi.id_fakultas = tbl_fakultas.id_fakultas')
            ->join('tbl_dosen', 'tbl_jadwal.id_dosen = tbl_dosen.id_dosen')
            ->join('tbl_ruangan', 'tbl_jadwal.id_ruangan = tbl_ruangan.id_ruangan')
            ->where('tbl_jadwal.id_jadwal', $id_jadwal)
            ->get()->getRowArray();
    }

    public function mhs($id_jadwal)
    {
        return $this->db->table('tbl_krs')
            ->join('tbl_mhs', 'tbl_krs.id_mhs = tbl_mhs.id_mhs')
            ->where('id_jadwal', $id_jadwal)
        ->orderBy('tbl_mhs.nim','ASC')
            ->get()->getResultArray();
    }

    public function SimpanAbsen($data)
    {
        $this->db->table('tbl_krs')
            ->where('id_krs ', $data['id_krs'])
            ->update($data);
    }

    public function SimpanNilai($data)
    {
        $this->db->table('tbl_krs')
            ->where('id_krs ', $data['id_krs'])
            ->update($data);
    }

    public function DataDosen()
    {
        return $this->db->table('tbl_dosen')
            ->where('id_dosen', session()->get('id_dosen'))

            ->get()->getRowArray();
    }
}
