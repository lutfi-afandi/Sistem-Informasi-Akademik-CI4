<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelKelas extends Model
{
    public function allData()
    {
        return $this->db->table('tbl_kelas')
            ->join('tbl_prodi', 'tbl_kelas.id_prodi = tbl_prodi.id_prodi')
            ->join('tbl_dosen', 'tbl_kelas.id_dosen = tbl_dosen.id_dosen')
            ->orderBy('id_kelas', 'DESC')
            ->get()->getResultArray();
    }

    public function allDataKelas($id_prodi)
    {
        return $this->db->table('tbl_kelas')
            ->where('id_prodi', $id_prodi)
            ->get()->getResultArray();
    }

    public function detailKelas($id_kelas)
    {
        return $this->db->table('tbl_kelas')
            ->join('tbl_prodi', 'tbl_kelas.id_prodi = tbl_prodi.id_prodi')
            ->join('tbl_dosen', 'tbl_kelas.id_dosen = tbl_dosen.id_dosen')
            ->where('id_kelas', $id_kelas)
            ->orderBy('id_kelas', 'DESC')
            ->get()->getRowArray();
    }

    public function add($data)
    {
        $this->db->table('tbl_kelas')->insert($data);
    }

    public function edit($data)
    {
        $this->db->table('tbl_kelas')->where('id_kelas', $data['id_kelas'])
            ->update($data);
    }

    public function hapus($data)
    {
        $this->db->table('tbl_kelas')->where('id_kelas', $data['id_kelas'])
            ->delete($data);
    }

    public function mahasiswa($id_kelas)
    {
        return $this->db->table('tbl_mhs')
            ->join('tbl_prodi', 'tbl_prodi.id_prodi=tbl_mhs.id_prodi')
            ->where('id_kelas', $id_kelas)
            ->orderBy('id_mhs', 'DESC')
            ->get()->getResultArray();
    }

    public function jml_mhs($id_kelas)
    {
        return $this->db->table('tbl_mhs')
            ->where('id_kelas', $id_kelas)
            ->countAllResults();
    }

    // menampilkaan mahasiswa yang belum berkelas
    public function mhs_tidakAdaKelas()
    {
        return $this->db->table('tbl_mhs')
            ->join('tbl_prodi', 'tbl_mhs.id_prodi = tbl_prodi.id_prodi', 'left')
            ->where('tbl_mhs.id_kelas', null)
            ->where('tbl_mhs.pembayaran', '1')
            ->orderBy('id_mhs', 'DESC')
            ->get()->getResultArray();
    }

    public function update_mhs($data)
    {
        $this->db->table('tbl_mhs')->set('id_kelas', $data['id_kelas'])
            ->where('id_mhs', $data['id_mhs'])
            ->update($data);
    }
}
