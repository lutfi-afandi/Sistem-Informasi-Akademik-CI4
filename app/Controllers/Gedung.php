<?php

namespace App\Controllers;

use App\Models\ModelGedung;

class Gedung extends BaseController
{
    public function __construct()
    {
        $this->ModelGedung = new ModelGedung();
        helper('form');
    }
    public function index()
    {
        $data = [
            'title' => 'Gedung',
            'gedung' => $this->ModelGedung->allData(),
            'isi'    => 'admin/v_gedung'
        ];
        return view('admin/v_gedung', $data);
    }

    public function add()
    {
        $data = [
            'gedung'      => $this->request->getPost('gedung'),
        ];
        // dd($data);

        $this->ModelGedung->add($data);
        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan!');
        return redirect()->to(base_url('gedung'));
    }

    public function edit($id_gedung)
    {
        $data = [
            'id_gedung'   => $id_gedung,
            'gedung'      => $this->request->getPost('gedung'),
        ];
        // dd($data);

        $this->ModelGedung->edit($data);
        session()->setFlashdata('pesan', 'Data Berhasil Diubah!');
        return redirect()->to(base_url('gedung'));
    }

    public function delete($id_gedung)
    {
        $data = [
            'id_gedung'   => $id_gedung,
        ];
        // dd($data);

        $this->ModelGedung->hapus($data);
        session()->setFlashdata('pesan', 'Data Berhasil Dihapus!');
        return redirect()->to(base_url('gedung'));
    }
}
