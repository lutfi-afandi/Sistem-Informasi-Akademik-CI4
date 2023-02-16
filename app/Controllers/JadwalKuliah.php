<?php

namespace App\Controllers;

use App\Models\ModelDosen;
use App\Models\ModelJadwalKuliah;
use App\Models\ModelKelas;
use App\Models\ModelMatkul;
use App\Models\ModelProdi;
use App\Models\ModelRuangan;
use App\Models\ModelTa;

class JadwalKuliah extends BaseController
{
    public function __construct()
    {
        helper('form');
        $this->ModelJadwalKuliah = new ModelJadwalKuliah();
        $this->ModelProdi = new ModelProdi();
        $this->ModelTa = new ModelTa();
        $this->ModelMatkul = new ModelMatkul();
        $this->ModelDosen = new ModelDosen();
        $this->ModelKelas = new ModelKelas();
        $this->ModelRuangan = new ModelRuangan();
    }

    public function index()
    {

        $data = [
            'title' => 'Jadwal Kuliah',
            'ta_aktif'  => $this->ModelTa->ta_aktif(),
            'prodi'     => $this->ModelProdi->allData(),
            'isi'    => ''
        ];
        return view('admin/JadwalKuliah/v_index', $data);
    }

    public function detailjadwal($id_prodi)
    {
        $id_ta_aktif = $this->ModelTa->ta_aktif()['id_ta'];
        $data = [
            'title' => 'Jadwal Kuliah',
            'ta_aktif'  => $this->ModelTa->ta_aktif(),
            'fil_ta'  => $this->ModelTa->ta_aktif(),
            'prodi'     => $this->ModelProdi->detailData($id_prodi),
            'jadwal'    => $this->ModelJadwalKuliah->allData($id_prodi, $id_ta_aktif),
            'matkul'    => $this->ModelMatkul->allDataMatkul($id_prodi),
            'dosen'     => $this->ModelDosen->allData(),
            'ruangan'     => $this->ModelRuangan->allData(),
            'kelas'     => $this->ModelKelas->allDataKelas($id_prodi),
            'isi'    => 'admin/JadwalKuliah/v_detail',
            'ta'    => $this->ModelTa->allData(),
        ];

        $data['id_ta'] = isset($_GET['id']) ? $_GET['id'] : '';
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $data['fil_ta'] = $_GET['id'];
            $data['jadwal'] = $this->ModelJadwalKuliah->per_ta($id_prodi, $data['id_ta']);
        }

        // dd($data['ta_aktif']);
        return view('admin/JadwalKuliah/v_detail', $data);
    }

    public function add($id_prodi)
    {
        if ($this->validate([
            'id_matkul'  => [
                'label' => 'Mata kuliah',
                'rules'  =>  'required',
                'errors' => [
                    'required' => '{field} wajib diisi!'
                ]
            ],
            'id_dosen'  => [
                'label' => 'Dosen',
                'rules'  =>  'required',
                'errors' => [
                    'required' => '{field} wajib dipilih!'
                ]
            ],
            'id_kelas'  => [
                'label' => 'Kelas',
                'rules'  =>  'required',
                'errors' => [
                    'required' => '{field} wajib dipilih!'
                ]
            ],
            'hari'  => [
                'label' => 'Hari',
                'rules'  =>  'required',
                'errors' => [
                    'required' => '{field} wajib dipilih!'
                ]
            ],
            'waktu'  => [
                'label' => 'Waktu',
                'rules'  =>  'required',
                'errors' => [
                    'required' => '{field} wajib diisi!'
                ]
            ],
            'id_ruangan'  => [
                'label' => 'Ruangan',
                'rules'  =>  'required',
                'errors' => [
                    'required' => '{field} wajib dipilih!'
                ]
            ],
            'kuota'  => [
                'label' => 'Kuota',
                'rules'  =>  'required',
                'errors' => [
                    'required' => '{field} wajib diisi!'
                ]
            ],
        ])) {
            $ta = $this->ModelTa->ta_aktif();
            $data = [
                'id_prodi'   => $id_prodi,
                'id_ta'     => $ta['id_ta'],
                'id_kelas'   => $this->request->getPost('id_kelas'),
                'id_matkul'   => $this->request->getPost('id_matkul'),
                'id_dosen'   => $this->request->getPost('id_dosen'),
                'hari'   => $this->request->getPost('hari'),
                'waktu'   => $this->request->getPost('waktu'),
                'kuota'   => $this->request->getPost('kuota'),
                'id_ruangan'   => $this->request->getPost('id_ruangan'),
            ];

            // dd($data);
            $this->ModelJadwalKuliah->add($data);
            session()->setFlashdata('pesan', 'Data Berhasil ditambah!');
            return redirect()->to(base_url('JadwalKuliah/detailjadwal/' . $id_prodi));
        } else {
            // tidak valid
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('JadwalKuliah/detailjadwal/' . $id_prodi));
        }
    }

    public function delete($id_prodi, $id_jadwal)
    {
        $data = [
            'id_jadwal'   => $id_jadwal,
        ];
        // dd($data);

        $this->ModelJadwalKuliah->hapus($data);
        session()->setFlashdata('pesan', 'Data Berhasil Dihapus!');
        return redirect()->to(base_url('JadwalKuliah/detailjadwal/' . $id_prodi));
    }

    public function filter()
    {
    }
}
