<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelMatkul extends Model
{
    public function allData()
    {
        return $this->db->table('tbl_matkul')
            ->orderBy('id_matkul', 'DESC')
            ->get()->getResultArray();
    }
    public function allDataMatkul($id_prodi)
    {
        return $this->db->table('tbl_matkul')
            ->where('id_prodi', $id_prodi)
            ->orderBy('smt', 'ASC')
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
        $this->db->table('tbl_matkul')->insert($data);
    }

    public function edit($data)
    {
        $this->db->table('tbl_matkul')->where('id_matkul', $data['id_matkul'])
            ->update($data);
    }

    public function hapus($data)
    {
        $this->db->table('tbl_matkul')->where('id_matkul', $data['id_matkul'])
            ->delete($data);
    }
}
