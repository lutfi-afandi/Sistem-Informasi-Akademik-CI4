<?php

namespace App\Controllers;

use App\Models\ModelAuth;

class Auth extends BaseController
{
    public function __construct()
    {
        helper('form');
        $this->ModelAuth = new ModelAuth();
    }
    public function index()
    {
        $data = [
            'title' => 'Login',
            'isi'    => 'v_login'
        ];
        return view('layout/v_wrapper', $data);
    }

    public function login_admin()
    {
        $data = [
            'title' => 'Login Admin',
        ];
        return view('login/login_admin', $data);
    }

    public function login_dsn()
    {
        $data = [
            'title' => 'Login Dosen',
        ];
        return view('login/login_dosen', $data);
    }

    public function login_mhs()
    {
        $data = [
            'title' => 'Login Mahasiswa',
        ];
        return view('login/login_mhs', $data);
    }

    public function cek_login()
    {

        if ($this->validate([
            'username'  => [
                // 'label' => 'Username',
                'rule'  =>  'required',
                'errors' => [
                    'required' => '{field} wajib diisi!'
                ]
            ],
            'password'  => [
                // 'label' => 'Password',
                'rule'  =>  'required',
                'errors' => [
                    'required' => '{field} wajib diisi!'
                ]
            ],
            'level'  => [
                // 'label' => 'Level',
                'rule'  =>  'required',
                'errors' => [
                    'required' => '{field} wajib dipilih!'
                ]
            ]
        ])) {
            // jika valid
            $level = $this->request->getPost('level');
            $username = $this->request->getPost('username');
            $password = $this->request->getPost('password');

            if ($level == 1) {
                $cek_user = $this->ModelAuth->login_user($username, $password);
                if ($cek_user) {
                    // jika data benar
                    session()->set('username', $cek_user['username']);
                    session()->set('nama_user', $cek_user['nama_user']);
                    session()->set('foto', $cek_user['foto']);
                    session()->set('level', $cek_user['level']);
                    return redirect()->to(base_url('admin'));
                } else {
                    session()->setFlashdata('pesan', 'Login Gagal!, Username atau Password salah!');
                    return redirect()->to(base_url('auth'));
                }
            } elseif ($level == 2) {
                $cek_mhs = $this->ModelAuth->login_mhs($username, $password);
                if ($cek_mhs) {
                    // jika data benar
                    session()->set('username', $cek_mhs['nim']);
                    session()->set('nama_user', $cek_mhs['nama_mhs']);
                    session()->set('foto', $cek_mhs['foto_mhs']);
                    session()->set('level', $level);
                    return redirect()->to(base_url('mhs'));
                } else {
                    session()->setFlashdata('pesan', 'Login Gagal!, Username atau Password salah!');
                    return redirect()->to(base_url('auth'));
                }
            } elseif ($level == 3) {
                $cek_dosen = $this->ModelAuth->login_dosen($username, $password);
                if ($cek_dosen) {
                    // jika data benar
                    session()->set('id_dosen', $cek_dosen['id_dosen']);
                    session()->set('username', $cek_dosen['nidn']);
                    session()->set('nama_user', $cek_dosen['nama_dosen']);
                    session()->set('foto', $cek_dosen['foto_dsn']);
                    session()->set('level', $level);
                    return redirect()->to(base_url('dsn'));
                } else {
                    session()->setFlashdata('pesan', 'Login Gagal!, Username atau Password salah!');
                    return redirect()->to(base_url('auth'));
                }
            }
        } else {
            // jika tidak valid
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('auth'));
        }
    }

    public function cek_mhs()
    {


        if ($this->validate([
            'username'  => [
                // 'label' => 'Username',
                'rule'  =>  'required',
                'errors' => [
                    'required' => '{field} wajib diisi!'
                ]
            ],
            'password'  => [
                // 'label' => 'Password',
                'rule'  =>  'required',
                'errors' => [
                    'required' => '{field} wajib diisi!'
                ]
            ],

        ])) {
            $nim = $this->request->getPost('username');
            $password = $this->request->getPost('password');
            $cek_user = $this->ModelAuth->login_mhs($nim, $password);
            // dd($cek_user);
            if ($cek_user) {
                // jika data benar
                session()->set('nim', $cek_user['nim']);
                session()->set('nama_mhs', $cek_user['nama_mhs']);
                session()->set('foto_mhs', $cek_user['foto_mhs']);
                session()->set('user', 'mhs');
                return redirect()->to(base_url('mhs'));
            } else {
                session()->setFlashdata('pesan', 'Login Gagal!, Username atau Password salah!');
                return redirect()->to(base_url('auth/login_mhs'));
            }
        } else {
            // jika tidak valid
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('auth/login_mhs'));
        }
    }

    public function cek_admin()
    {


        if ($this->validate([
            'username'  => [
                // 'label' => 'Username',
                'rule'  =>  'required',
                'errors' => [
                    'required' => '{field} wajib diisi!'
                ]
            ],
            'password'  => [
                // 'label' => 'Password',
                'rule'  =>  'required',
                'errors' => [
                    'required' => '{field} wajib diisi!'
                ]
            ],

        ])) {
            $username = $this->request->getPost('username');
            $password = $this->request->getPost('password');

            $cek_user = $this->ModelAuth->login_user($username, $password);
            if ($cek_user) {
                // jika data benar
                session()->set('username', $cek_user['username']);
                session()->set('nama_user', $cek_user['nama_user']);
                session()->set('foto', $cek_user['foto']);
                session()->set('user', 'admin');
                return redirect()->to(base_url('admin'));
            } else {
                session()->setFlashdata('pesan', 'Login Gagal!, Username atau Password salah!');
                return redirect()->to(base_url('auth/login_admin'));
            }
        } else {
            // jika tidak valid
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('auth/login_admin'));
        }
    }

    public function cek_dsn()
    {


        if ($this->validate([
            'username'  => [
                // 'label' => 'Username',
                'rule'  =>  'required',
                'errors' => [
                    'required' => '{field} wajib diisi!'
                ]
            ],
            'password'  => [
                // 'label' => 'Password',
                'rule'  =>  'required',
                'errors' => [
                    'required' => '{field} wajib diisi!'
                ]
            ],

        ])) {
            $nidn = $this->request->getPost('username');
            $password = $this->request->getPost('password');
            $cek_user = $this->ModelAuth->login_dsn($nidn, $password);
            // dd($cek_user);
            if ($cek_user) {
                // jika data benar
                session()->set('id_dosen', $cek_user['id_dosen']);
                session()->set('nidn', $cek_user['nidn']);
                session()->set('nama_dosen', $cek_user['nama_dosen']);
                session()->set('foto_dsn', $cek_user['foto_dsn']);
                session()->set('user', 'dsn');
                return redirect()->to(base_url('dsn'));
            } else {
                session()->setFlashdata('pesan', 'Login Gagal!, Username atau Password salah!');
                return redirect()->to(base_url('auth/login_dsn'));
            }
        } else {
            // jika tidak valid
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('auth/login_dsn'));
        }
    }

    public function logout($id = false)
    {
        session();
        session_destroy();
        session()->setFlashdata('sukses', 'Berhasil Logout!');
        if ($id == 'admin') {
            return redirect()->to(base_url('auth/login_admin'));
        } elseif ($id == 'mhs') {
            return redirect()->to(base_url('auth/login_mhs'));
        } elseif ($id == 'dosen') {
            return redirect()->to(base_url('auth/login_dosen'));
        }
    }
}
