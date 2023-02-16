<?php

namespace App\Controllers;

use App\Models\ModelGedung;
use App\Models\ModelRuangan;

class Ruangan extends BaseController
{
    public function __construct()
    {
        $this->ModelRuangan = new ModelRuangan();
        $this->ModelGedung = new ModelGedung();
        helper('form');
    }
    public function index()
    {
        $data = [
            'title' => 'Ruangan',
            'ruangan' => $this->ModelRuangan->allData(),
            'gedung' => $this->ModelGedung->allData(),
            'isi'    => 'admin/ruangan/index'
        ];
        return view('admin/ruangan/index', $data);
    }

    public function add()
    {
        $data = [
            'title' => 'Tambah Ruangan',
            'ruangan' => $this->ModelRuangan->allData(),
            'gedung' => $this->ModelGedung->allData(),
            'isi'    => 'admin/ruangan/v_add'
        ];
        return view('layout/v_wrapper', $data);
    }


    public function insert()
    {
        $this->ModelRuangan = new ModelRuangan();

        $data = array(
            'id_gedung' => $this->request->getPost('id_gedung'),
            'ruangan' => $this->request->getPost('ruangan'),
        );
        $this->ModelRuangan->add($data);
        echo json_encode(array("status" => TRUE));
    }

    public function ajax_edit($id)
    {

        $this->ModelRuangan = new ModelRuangan();

        $data = $this->ModelRuangan->detailData($id);
        echo json_encode($data);
    }

    public function update()
    {
        $data = array(
            'id_ruangan'    => $this->request->getPost('id_ruangan'),
            'id_gedung' => $this->request->getPost('id_gedung'),
            'ruangan' => $this->request->getPost('ruangan'),
        );
        $this->ModelRuangan->edit($data);
        echo json_encode(array("status" => TRUE));
    }

    public function insert1()
    {
        if ($this->validate([
            'gedung'  => [
                // 'label' => 'Username',
                'rules'  =>  'required',
                'errors' => [
                    'required' => '{field} wajib dipilih!'
                ]
            ],
        ])) {
            // valid
            $data = [
                'id_gedung'   => $this->request->getPost('gedung'),
                'ruangan'      => $this->request->getPost('ruangan'),
            ];
            // dd($data);

            $this->ModelRuangan->add($data);
            session()->setFlashdata('pesan', 'Data Berhasil ditambah!');
            return redirect()->to(base_url('ruangan'));
        } else {
            // tidak valid
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('ruangan/add'));
        }
    }

    public function edit($id_ruangan)
    {
        $data = [
            'title'   => 'Edit Ruangan',
            'ruangan' => $this->ModelRuangan->detailData($id_ruangan),
            'gedung' => $this->ModelGedung->allData(),
            'isi'           => 'admin/ruangan/v_edit'
        ];
        // dd($data);
        return view('layout/v_wrapper', $data);
    }

    public function update1($id_ruangan)
    {
        if ($this->validate([
            'gedung'  => [
                // 'label' => 'Username',
                'rules'  =>  'required',
                'errors' => [
                    'required' => '{field} wajib dipilih!'
                ]
            ],
        ])) {
            // valid
            $data = [
                'id_ruangan'    => $id_ruangan,
                'id_gedung'   => $this->request->getPost('gedung'),
                'ruangan'      => $this->request->getPost('ruangan'),
            ];
            // dd($data);

            $this->ModelRuangan->edit($data);
            session()->setFlashdata('pesan', 'Data Berhasil ditambah!');
            return redirect()->to(base_url('ruangan'));
        } else {
            // tidak valid
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('ruangan/edit/' . $id_ruangan));
        }
    }

    public function delete($id_ruangan)
    {
        $data = [
            'id_ruangan'   => $id_ruangan,
        ];
        // dd($data);

        $this->ModelRuangan->hapus($data);
        session()->setFlashdata('pesan', 'Data Berhasil Dihapus!');
        echo json_encode(array("status" => TRUE));
    }
}
