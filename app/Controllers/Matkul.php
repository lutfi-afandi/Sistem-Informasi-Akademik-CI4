<?php

namespace App\Controllers;

use App\Models\ModelMatkul;
use App\Models\ModelProdi;

class Matkul extends BaseController
{
    public function __construct()
    {
        $this->ModelMatkul = new ModelMatkul();
        $this->ModelProdi = new ModelProdi();
        helper('form');
    }
    public function index()
    {
        $data = [
            'title' => 'Mata Kuliah',
            'matkul' => $this->ModelMatkul->allData(),
            'prodi' => $this->ModelProdi->allData(),
            'isi'    => 'admin/matkul/v_matkul'
        ];
        return view('admin/matkul/v_matkul', $data);
    }

    public function detail($id_prodi)
    {
        $data = [
            'title' => 'Mata Kuliah',
            'matkul' => $this->ModelMatkul->allDataMatkul($id_prodi),
            'prodi' => $this->ModelProdi->detailData($id_prodi),
            'isi'    => 'admin/matkul/v_detail'
        ];
        // dd($this->ModelProdi->detailData($id_prodi));
        return view('admin/matkul/v_detail', $data);
    }

    public function add($id_prodi)
    {
        if ($this->validate([
            'matkul'  => [
                // 'label' => 'Username',
                'rules'  =>  'required',
                'errors' => [
                    'required' => '{field} wajib diisi!'
                ]
            ],
            'sks'  => [
                // 'label' => 'Username',
                'rules'  =>  'required',
                'errors' => [
                    'required' => '{field} wajib dipilih!'
                ]
            ],
            'smt'  => [
                // 'label' => 'Username',
                'rules'  =>  'required',
                'errors' => [
                    'required' => '{field} wajib dipilih!'
                ]
            ],
            'kategori'  => [
                // 'label' => 'Username',
                'rules'  =>  'required',
                'errors' => [
                    'required' => '{field} wajib dipilih!'
                ]
            ],
            'kode_matkul'  => [
                // 'label' => 'Username',
                'rules'  =>  'required|is_unique[tbl_matkul.kode_matkul]',
                'errors' => [
                    'required' => '{field} wajib dipilih!',
                    'is_unique' => 'Kode sudah ada'
                ]
            ],
        ])) {
            // valid
            $semester = $this->request->getPost('smt');
            if ($semester == 1 || $semester == 3 || $semester == 5 || $semester == 7) {
                $smt = 'Ganjil';
            } else {
                $smt = 'Genap';
            }
            $data = [
                'kode_matkul'   => $this->request->getPost('kode_matkul'),
                'matkul'      => $this->request->getPost('matkul'),
                'sks'      => $this->request->getPost('sks'),
                'smt'      => $this->request->getPost('smt'),
                'kategori'      => $this->request->getPost('kategori'),
                'id_prodi'      => $id_prodi,
                'semester'      => $smt
            ];
            // dd($data);

            $this->ModelMatkul->add($data);
            session()->setFlashdata('pesan', 'Data Berhasil ditambah!');
            return redirect()->to(base_url('matkul/detail/' . $id_prodi));
        } else {
            // tidak valid
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('matkul/detail/' . $id_prodi));
        }
    }

    public function delete($id_prodi, $id_matkul)
    {
        $data = [
            'id_matkul'   => $id_matkul,
        ];
        // dd($data);

        $this->ModelMatkul->hapus($data);
        session()->setFlashdata('pesan', 'Data Berhasil Dihapus!');
        return redirect()->to(base_url('matkul/detail/' . $id_prodi));
    }

    public function import_matkul($id_prodi)
    {
        $file_excel = $this->request->getFile('fileexcel');
        $ext = $file_excel->getClientExtension();
        if ($ext == 'xls') {
            $render = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
        } else {
            $render = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
        }
        $spreadsheet = $render->load($file_excel);

        $data = $spreadsheet->getActiveSheet()->toArray();
        foreach ($data as $x => $row) {
            if ($x == 0) {
                continue;
            }

            $kode_matkul = $row[0];
            $matkul = $row[1];
            $sks = $row[2];
            $kategori = $row[3];
            $smt = $row[4];
            $semester = $row[5];

            $db = \Config\Database::connect();

            $cekkode_matkul = $db->table('tbl_matkul')->getWhere(['kode_matkul' => $kode_matkul])->getResult();

            if (count($cekkode_matkul) > 0) {
                session()->setFlashdata('pesan', '<b >Data Gagal di Import Kode Matkul ada yang sama</b>');
            } else {

                $simpandata = [
                    'kode_matkul' => $kode_matkul,
                    'matkul' => $matkul,
                    'sks' => $sks,
                    'kategori' => $kategori,
                    'smt' => $smt,
                    'semester' => $semester,
                    'id_prodi' => $id_prodi,
                ];

                $db->table('tbl_matkul')->insert($simpandata);
                session()->setFlashdata('pesan', 'Berhasil import excel');
            }
        }

        return redirect()->to(base_url('matkul/detail/' . $id_prodi));
    }
}
