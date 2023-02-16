<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelProdi extends Model
{
    public function allData()
    {
        return $this->db->table('tbl_prodi')
            ->join('tbl_fakultas', 'tbl_prodi.id_fakultas = tbl_fakultas.id_fakultas')
            ->orderBy('id_prodi', 'DESC')
            ->get()->getResultArray();
    }

    public function detailData($id_prodi)
    {
        return $this->db->table('tbl_prodi')
            ->join('tbl_fakultas', 'tbl_prodi.id_fakultas = tbl_fakultas.id_fakultas')
            ->where('id_prodi', $id_prodi)
            ->orderBy('id_prodi', 'DESC')
            ->get()->getRowArray();
    }

    public function add($data)
    {
        $this->db->table('tbl_prodi')->insert($data);
    }

    public function edit($data)
    {
        $this->db->table('tbl_prodi')->where('id_prodi', $data['id_prodi'])
            ->update($data);
    }

    public function hapus($data)
    {
        $this->db->table('tbl_prodi')->where('id_prodi', $data['id_prodi'])
            ->delete($data);
    }
}
