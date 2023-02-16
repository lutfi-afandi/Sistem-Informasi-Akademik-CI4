<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelJadwalKuliah extends Model
{
    public function allData($id_prodi, $id_ta)
    {
        return $this->db->table('tbl_jadwal')
            ->join('tbl_matkul', 'tbl_jadwal.id_matkul = tbl_matkul.id_matkul')
            ->join('tbl_ta', 'tbl_jadwal.id_ta = tbl_ta.id_ta')
            ->join('tbl_kelas', 'tbl_jadwal.id_kelas = tbl_kelas.id_kelas')
            ->join('tbl_dosen', 'tbl_jadwal.id_dosen = tbl_dosen.id_dosen')
            ->join('tbl_ruangan', 'tbl_jadwal.id_ruangan = tbl_ruangan.id_ruangan')
            ->where('tbl_jadwal.id_prodi', $id_prodi)
            ->where('tbl_ta.id_ta', $id_ta)
            // ->orderBy('tbl_matkul.smt', 'ASC')
            ->orderBy('tbl_matkul.matkul', 'ASC')
            ->get()->getResultArray();
    }

    public function per_ta($id_prodi, $id_ta)
    {
        return $this->db->table('tbl_jadwal')
            ->join('tbl_matkul', 'tbl_jadwal.id_matkul = tbl_matkul.id_matkul')
            ->join('tbl_ta', 'tbl_jadwal.id_ta = tbl_ta.id_ta')
            ->join('tbl_kelas', 'tbl_jadwal.id_kelas = tbl_kelas.id_kelas')
            ->join('tbl_dosen', 'tbl_jadwal.id_dosen = tbl_dosen.id_dosen')
            ->join('tbl_ruangan', 'tbl_jadwal.id_ruangan = tbl_ruangan.id_ruangan')
            ->where('tbl_jadwal.id_prodi', $id_prodi)
            ->where('tbl_jadwal.id_ta', $id_ta)
            ->orderBy('tbl_matkul.matkul', 'ASC')
            ->get()->getResultArray();
    }

    public function add($data)
    {
        $this->db->table('tbl_jadwal')->insert($data);
    }

    public function hapus($data)
    {
        $this->db->table('tbl_jadwal')->where('id_jadwal', $data['id_jadwal'])
            ->delete($data);
    }
}
