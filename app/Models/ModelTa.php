<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelTa extends Model
{
    public function allData()
    {
        return $this->db->table('tbl_ta')
            ->orderBy('ta', 'DESC')
            ->get()->getResultArray();
    }

    public function add($data)
    {
        $this->db->table('tbl_ta')->insert($data);
    }

    public function edit($data)
    {
        $this->db->table('tbl_ta')->where('id_ta', $data['id_ta'])
            ->update($data);
    }

    public function hapus($data)
    {
        $this->db->table('tbl_ta')->where('id_ta', $data['id_ta'])
            ->delete($data);
    }

    public function reset_status_ta()
    {
        $this->db->table('tbl_ta')
            ->update(['status' => 0]);
    }


    public function ta_aktif()
    {
        return $this->db->table('tbl_ta')
            ->where('status', 1)
            ->get()
            ->getRowArray();
    }
    public function getTa($id_ta)
    {
        return $this->db->table('tbl_ta')
            ->where('id_ta', $id_ta)
            ->get()
            ->getRowArray();
    }
}