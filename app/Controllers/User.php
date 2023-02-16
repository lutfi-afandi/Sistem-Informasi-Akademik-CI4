<?php

namespace App\Controllers;

use App\Models\ModelUser;

class User extends BaseController
{
    public function __construct()
    {
        $this->ModelUser = new ModelUser();
        helper('form');
    }
    public function index()
    {
        $data = [
            'title' => 'User',
            'user' => $this->ModelUser->allData(),
            'isi'    => 'admin/v_user'
        ];
        return view('admin/v_user', $data);
    }

    public function add()
    {
        if ($this->validate([
            'nama_user'  => [
                'label' => 'Nama User',
                'rules'  =>  'required',
                'errors' => [
                    'required' => '{field} wajib dipilih!'
                ]
            ],
            'username'  => [
                // 'label' => 'Username',
                'rules'  =>  'required',
                'errors' => [
                    'required' => '{field} wajib dipilih!'
                ]
            ],
            'password'  => [
                // 'label' => 'Username',
                'rules'  =>  'required',
                'errors' => [
                    'required' => '{field} wajib dipilih!'
                ]
            ],
            'foto'  => [
                // 'label' => 'Username',
                'rules'  =>  'uploaded[foto]|max_size[foto,2048]|mime_in[foto,image/png,image/jpg,image/jpeg,image/gif,image/ico]',
                'errors' => [
                    'uploaded' => '{field} wajib dipilih!',
                    'max_size'  => 'File tidak boleh lebih dari 2MB',
                    'mime_in'   => 'Pastikan format jpg/png'
                ]
            ],
        ])) {
            // valid
            $foto = $this->request->getFile('foto');
            $nama_file = $foto->getRandomName();
            $data = [
                'username'      => $this->request->getPost('username'),
                'nama_user'      => $this->request->getPost('nama_user'),
                'password'      => $this->request->getPost('password'),
                'foto'      => $nama_file,
            ];
            $foto->move('foto', $nama_file);

            // dd($data);

            $this->ModelUser->add($data);
            session()->setFlashdata('pesan', 'Data Berhasil ditambah!');
            return redirect()->to(base_url('user'));
        } else {
            // tidak valid
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('user'));
        }
    }

    public function edit($id_user)
    {
        if ($this->validate([
            'nama_user'  => [
                'label' => 'Nama User',
                'rules'  =>  'required',
                'errors' => [
                    'required' => '{field} wajib dipilih!'
                ]
            ],
            'username'  => [
                // 'label' => 'Username',
                'rules'  =>  'required',
                'errors' => [
                    'required' => '{field} wajib dipilih!'
                ]
            ],
            'password'  => [
                // 'label' => 'Username',
                'rules'  =>  'required',
                'errors' => [
                    'required' => '{field} wajib dipilih!'
                ]
            ],
            'foto'  => [
                // 'label' => 'Username',
                'rules'  =>  'max_size[foto,2048]|mime_in[foto,image/png,image/jpg,image/jpeg,image/gif,image/ico]',
                'errors' => [
                    'max_size'  => 'File tidak boleh lebih dari 2MB',
                    'mime_in'   => 'Pastikan format jpg/png'
                ]
            ],
        ])) {
            // valid
            $foto = $this->request->getFile('foto');
            if ($foto->getError() == 4) {
                $data = [
                    'id_user'       => $id_user,
                    'username'      => $this->request->getPost('username'),
                    'nama_user'      => $this->request->getPost('nama_user'),
                    'password'      => $this->request->getPost('password'),
                ];
                $this->ModelUser->edit($data);
            } else {
                // hapus foto lama
                $user = $this->ModelUser->detailData($id_user);
                if ($user['foto'] != "") {
                    unlink('foto/' . $user['foto']);
                }
                $nama_file = $foto->getRandomName();
                $data = [
                    'id_user'       => $id_user,
                    'username'      => $this->request->getPost('username'),
                    'nama_user'      => $this->request->getPost('nama_user'),
                    'password'      => $this->request->getPost('password'),
                    'foto'      => $nama_file,
                ];
                $foto->move('foto', $nama_file);

                // dd($data);

                $this->ModelUser->edit($data);
            }
            session()->setFlashdata('pesan', 'Data Berhasil diubah!');
            return redirect()->to(base_url('user'));
        } else {
            // tidak valid
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('user'));
        }
    }

    public function delete($id_user)
    {
        $user = $this->ModelUser->detailData($id_user);
        if ($user['foto'] != "") {
            unlink('foto/' . $user['foto']);
        }
        $data = [
            'id_user'   => $id_user,
        ];
        // dd($data);

        $this->ModelUser->hapus($data);
        session()->setFlashdata('pesan', 'Data Berhasil Dihapus!');
        return redirect()->to(base_url('user'));
    }
}
