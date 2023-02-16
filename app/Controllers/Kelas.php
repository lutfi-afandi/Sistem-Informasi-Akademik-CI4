<?php

namespace App\Controllers;

use App\Models\ModelDosen;
use App\Models\ModelKelas;
use App\Models\ModelProdi;

class Kelas extends BaseController
{
	public function __construct()
	{
		helper('form');
		$this->ModelKelas = new ModelKelas();
		$this->ModelProdi = new ModelProdi();
		$this->ModelDosen = new ModelDosen();
	}
	public function index()
	{
		$data = [
			'title' => 'Kelas',
			'kelas'	=> $this->ModelKelas->allData(),
			'prodi'	=> $this->ModelProdi->allData(),
			'dosen'	=> $this->ModelDosen->allData(),
			'isi'	=> ''
		];
		return view('admin/kelas/v_kelas', $data);
	}

	public function add()
	{
		if ($this->validate([
			'nama_kelas'  => [
				'label' => 'Nama Kelas',
				'rules'  =>  'required|is_unique[tbl_kelas.nama_kelas]',
				'errors' => [
					'required' => '{field} wajib diisi!',
					'is_unique'	=> '{filed} sudah ada'
				]
			],
			'id_prodi'  => [
				'label' => 'Program Studi',
				'rules'  =>  'required',
				'errors' => [
					'required' => '{field} wajib Dipilih!'
				]
			],
			'id_dosen'  => [
				'label' => 'Dosen',
				'rules'  =>  'required',
				'errors' => [
					'required' => '{field} wajib Dipilih!'
				]
			],
			'tahun_angkatan'  => [
				'label' => 'Tahun Angkatan',
				'rules'  =>  'required',
				'errors' => [
					'required' => '{field} wajib Dipilih!'
				]
			],
		])) {
			// valid
			$data = [
				'nama_kelas'   => $this->request->getPost('nama_kelas'),
				'id_prodi'      => $this->request->getPost('id_prodi'),
				'id_dosen'      => $this->request->getPost('id_dosen'),
				'tahun_angkatan'      => $this->request->getPost('tahun_angkatan'),
			];
			// dd($data);

			$this->ModelKelas->add($data);
			session()->setFlashdata('pesan', 'Data Berhasil ditambah!');
			return redirect()->to(base_url('kelas'));
		} else {
			// tidak valid
			session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
			return redirect()->to(base_url('kelas'));
		}
	}


	public function delete($id_kelas)
	{
		$data = [
			'id_kelas'   => $id_kelas,
		];
		// dd($data);

		$this->ModelKelas->hapus($data);
		session()->setFlashdata('pesan', 'Data Berhasil Dihapus!');
		return redirect()->to(base_url('kelas'));
	}

	public function rincian_kelas($id_kelas)
	{
		$kelas = $this->ModelKelas->detailKelas($id_kelas);
		$data = [
			'judul' => 'Rombongan Kelas : ' . '<label class="text-green">' . $kelas['nama_kelas'] . '</label>',
			'title' => 'Rombongan Kelas : ' . $kelas['nama_kelas'],
			'kelas'	=> $kelas,
			'mhs'	=> $this->ModelKelas->mahasiswa($id_kelas),
			'tanpa_kelas'	=> $this->ModelKelas->mhs_tidakAdaKelas(),
			'jml'	=> $this->ModelKelas->jml_mhs($id_kelas),
			'prodi'	=> $this->ModelProdi->allData(),
			'dosen'	=> $this->ModelDosen->allData(),
			'isi'	=> ''
		];
		// dd($this->ModelKelas->mhs_tidakAdaKelas());
		return view('admin/kelas/v_rincian_kelas', $data);
	}

	public function add_anggota_kelas($id_kelas, $id_mhs)
	{
		$data = [
			'id_kelas'   => $id_kelas,
			'id_mhs'   => $id_mhs,
		];
		// dd($data);

		$this->ModelKelas->update_mhs($data);
		session()->setFlashdata('pesan', 'Mahasiswa Berhasil ditambahkan Ke kelas!');
		return redirect()->to(base_url('kelas/rincian_kelas/' . $id_kelas));
	}
	public function remove_anggota_kelas($id_kelas, $id_mhs)
	{
		$data = [
			'id_kelas'   => null,
			'id_mhs'   => $id_mhs,
		];
		// dd($data);

		$this->ModelKelas->update_mhs($data);
		session()->setFlashdata('pesan', 'Mahasiswa Berhasil dihapus dari kelas!');
		return redirect()->to(base_url('kelas/rincian_kelas/' . $id_kelas));
	}
}
