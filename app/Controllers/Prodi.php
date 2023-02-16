<?php

namespace App\Controllers;

use App\Models\ModelDosen;
use App\Models\ModelProdi;
use App\Models\ModelFakultas;

class Prodi extends BaseController
{

    public function __construct()
    {
        helper('form');
        $this->ModelProdi = new ModelProdi();
        $this->ModelFakultas = new ModelFakultas();
        $this->ModelDosen = new ModelDosen();
    }

    public function index()
    {
        $data = [
            'title' => 'Program Studi',
            'prodi' => $this->ModelProdi->allData(),
            'dosen' => $this->ModelDosen->allData(),
            'fakultas' => $this->ModelFakultas->allData(),
            'isi'    => 'admin/prodi/v_index'
        ];
        return view('admin/prodi/v_index', $data);
    }

    // public function add()
    // {
    //     $data = [
    //         'title' => 'Tambah Prodi',
    //         'prodi' => $this->ModelProdi->allData(),
    //         'dosen' => $this->ModelDosen->allData(),
    //         'fakultas' => $this->ModelFakultas->allData(),
    //         'isi'    => 'admin/prodi/v_add'
    //     ];
    //     return view('layout/v_wrapper', $data);
    // }

    public function insert()
    {
        if ($this->validate([
            'prodi'  => [
                // 'label' => 'Username',
                'rules'  =>  'required',
                'errors' => [
                    'required' => '{field} wajib diisi!'
                ]
            ],
            'jenjang'  => [
                // 'label' => 'Username',
                'rules'  =>  'required',
                'errors' => [
                    'required' => '{field} wajib dipilih!'
                ]
            ],
            'kode_prodi'  => [
                // 'label' => 'Username',
                'rules'  =>  'required|is_unique[tbl_prodi.kode_prodi]',
                'errors' => [
                    'required' => '{field} wajib dipilih!',
                    'is_unique' => 'Kode sudah ada'
                ]
            ],
        ])) {
            // valid
            $data = [
                'id_fakultas'   => $this->request->getPost('fakultas'),
                'prodi'      => $this->request->getPost('prodi'),
                'jenjang'      => $this->request->getPost('jenjang'),
                'kode_prodi'      => $this->request->getPost('kode_prodi'),
                'ka_prodi'      => $this->request->getPost('ka_prodi'),
            ];
            // dd($data);

            $this->ModelProdi->add($data);
            session()->setFlashdata('pesan', 'Data Berhasil ditambah!');
            return redirect()->to(base_url('prodi'));
        } else {
            // tidak valid
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('prodi'));
        }
    }

    public function edit($id_prodi)
    {
        $data = [
            'title'   => 'Edit Prodi',
            'prodi' => $this->ModelProdi->detailData($id_prodi),
            'fakultas' => $this->ModelFakultas->allData(),
            'dosen' => $this->ModelDosen->allData(),
            'isi'           => 'admin/prodi/v_edit'
        ];
        // dd($data);
        return view('layout/v_wrapper', $data);
    }

    public function update($id_prodi)
    {
        if ($this->validate([
            'prodi'  => [
                // 'label' => 'Username',
                'rules'  =>  'required',
                'errors' => [
                    'required' => '{field} wajib diisi!'
                ]
            ],
            'jenjang'  => [
                // 'label' => 'Username',
                'rules'  =>  'required',
                'errors' => [
                    'required' => '{field} wajib dipilih!'
                ]
            ],
            'ka_prodi'  => [
                'label' => 'KA Prodi',
                'rules'  =>  'required',
                'errors' => [
                    'required' => '{field} wajib dipilih!'
                ]
            ],
            'kode_prodi'  => [
                // 'label' => 'Username',
                'rules'  =>  'required',
                'errors' => [
                    'required' => '{field} wajib dipilih!',
                ]
            ],
        ])) {
            // valid
            $data = [
                'id_prodi'    => $id_prodi,
                'id_fakultas'   => $this->request->getPost('fakultas'),
                'prodi'      => $this->request->getPost('prodi'),
                'ka_prodi'      => $this->request->getPost('ka_prodi'),
                'jenjang'      => $this->request->getPost('jenjang'),
                'kode_prodi'      => $this->request->getPost('kode_prodi'),
            ];
            // dd($data);

            $this->ModelProdi->edit($data);
            session()->setFlashdata('pesan', 'Data Berhasil diubah!');
            return redirect()->to(base_url('prodi'));
        } else {
            // tidak valid
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('prodi/edit/' . $id_prodi));
        }
    }

    public function delete($id_prodi)
    {
        $data = [
            'id_prodi'   => $id_prodi,
        ];
        // dd($data);

        $this->ModelProdi->hapus($data);
        session()->setFlashdata('pesan', 'Data Berhasil Dihapus!');
        return redirect()->to(base_url('prodi'));
    }
}
