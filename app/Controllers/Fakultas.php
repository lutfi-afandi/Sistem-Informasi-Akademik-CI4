<?php

namespace App\Controllers;

use App\Models\ModelFakultas;

class Fakultas extends BaseController
{
    public function __construct()
    {
        $this->ModelFakultas = new ModelFakultas();
        helper('form');
    }
    public function index()
    {
        $data = [
            'title' => 'Fakultas',
            'fakultas' => $this->ModelFakultas->allData(),
            'isi'    => 'admin/v_fakultas'
        ];
        return view('admin/v_fakultas', $data);
    }

    public function add()
    {
        $data = [
            'fakultas'      => $this->request->getPost('fakultas'),
        ];
        // dd($data);

        $this->ModelFakultas->add($data);
        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan!');
        return redirect()->to(base_url('fakultas'));
    }

    public function edit($id_fakultas)
    {
        $data = [
            'id_fakultas'   => $id_fakultas,
            'fakultas'      => $this->request->getPost('fakultas'),
        ];
        // dd($data);

        $this->ModelFakultas->edit($data);
        session()->setFlashdata('pesan', 'Data Berhasil Diubah!');
        return redirect()->to(base_url('fakultas'));
    }

    public function delete($id_fakultas)
    {
        $data = [
            'id_fakultas'   => $id_fakultas,
        ];
        // dd($data);

        $this->ModelFakultas->hapus($data);
        session()->setFlashdata('pesan', 'Data Berhasil Dihapus!');
        return redirect()->to(base_url('fakultas'));
    }
}
