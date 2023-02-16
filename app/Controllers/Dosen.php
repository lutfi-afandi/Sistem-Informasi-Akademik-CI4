<?php

namespace App\Controllers;

use App\Models\ModelDosen;

class Dosen extends BaseController
{
	public function __construct()
	{
		helper('form');
		$this->ModelDosen = new ModelDosen();
	}
	public function index()
	{
		$data = [
			'title' => 'Dosen',
			'dosen'	=> $this->ModelDosen->allData(),
			'isi'	=> 'admin/dosen/v_index'
		];
		return view('admin/dosen/v_index', $data);
	}

	public function add()
	{
		$data = [
			'title' => 'Dosen',
			'dosen'	=> $this->ModelDosen->allData(),
			'isi'	=> 'admin/dosen/v_add'
		];
		return view('admin/dosen/v_add', $data);
	}

	public function insert()
	{
		if ($this->validate([
			'nama_dosen'  => [
				'label' => 'Nama Dosen',
				'rules'  =>  'required',
				'errors' => [
					'required' => '{field} wajib dipilih!'
				]
			],
			'kode_dosen'  => [
				// 'label' => 'Dosenname',
				'rules'  =>  'required',
				'errors' => [
					'required' => '{field} wajib dipilih!'
				]
			],
			'nidn'  => [
				'label' => 'NIDN',
				'rules'  =>  'required',
				'errors' => [
					'required' => '{field} wajib dipilih!'
				]
			],
			'password'  => [
				// 'label' => 'Dosenname',
				'rules'  =>  'required',
				'errors' => [
					'required' => '{field} wajib dipilih!'
				]
			],
			'foto_dsn'  => [
				// 'label' => 'Dosenname',
				'rules'  =>  'uploaded[foto_dsn]|max_size[foto_dsn,2048]|mime_in[foto_dsn,image/png,image/jpg,image/jpeg,image/gif,image/ico]',
				'errors' => [
					'uploaded' => '{field} wajib dipilih!',
					'max_size'  => 'File tidak boleh lebih dari 2MB',
					'mime_in'   => 'Pastikan format jpg/png'
				]
			],
		])) {
			// valid
			$foto = $this->request->getFile('foto_dsn');
			$nama_file = $foto->getRandomName();
			$data = [
				'kode_dosen'      => $this->request->getPost('kode_dosen'),
				'nama_dosen'      => $this->request->getPost('nama_dosen'),
				'alamat_dosen'      => $this->request->getPost('alamat_dosen'),
				'jk_dosen'      => $this->request->getPost('jk_dosen'),
				'no_telp'      => $this->request->getPost('no_telp'),
				'nidn'      => $this->request->getPost('nidn'),
				'password'      => $this->request->getPost('password'),
				'foto_dsn'      => $nama_file,
			];
			$foto->move('foto_dosen', $nama_file);

			// dd($data);

			$this->ModelDosen->add($data);
			session()->setFlashdata('pesan', 'Data Berhasil ditambah!');
			return redirect()->to(base_url('dosen'));
		} else {
			// tidak valid
			session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
			return redirect()->to(base_url('dosen/add'));
		}
	}

	public function edit($id_dosen)
	{
		$data = [
			'title' => 'Dosen',
			'dosen'	=> $this->ModelDosen->detailDosen($id_dosen),
			'isi'	=> 'admin/dosen/v_edit'
		];
		return view('admin/dosen/v_edit', $data);
	}

	public function update($id_dosen)
	{
		if ($this->validate([
			'nama_dosen'  => [
				'label' => 'Nama Dosen',
				'rules'  =>  'required',
				'errors' => [
					'required' => '{field} wajib dipilih!'
				]
			],
			'foto_dsn'  => [
				// 'label' => 'Dosenname',
				'rules'  =>  'max_size[foto_dsn,2048]|mime_in[foto_dsn,image/png,image/jpg,image/jpeg,image/gif,image/ico]',
				'errors' => [
					'max_size'  => 'File tidak boleh lebih dari 2MB',
					'mime_in'   => 'Pastikan format jpg/png'
				]
			],
		])) {
			// valid
			$foto = $this->request->getFile('foto_dsn');
			if ($foto->getError() == 4) {
				$data = [
					'id_dosen'	=> $id_dosen,
					'kode_dosen'      => $this->request->getPost('kode_dosen'),
					'nama_dosen'      => $this->request->getPost('nama_dosen'),
					'alamat_dosen'      => $this->request->getPost('alamat_dosen'),
					'jk_dosen'      => $this->request->getPost('jk_dosen'),
					'no_telp'      => $this->request->getPost('no_telp'),
					'nidn'      => $this->request->getPost('nidn'),
				];
				$this->ModelDosen->edit($data);
			} else {
				// hapus foto lama
				$dosen = $this->ModelDosen->detailDosen($id_dosen);
				if ($dosen['foto_dsn'] != "") {
					unlink('foto_dosen/' . $dosen['foto_dsn']);
				}
				$nama_file = $foto->getRandomName();
				$data = [
					'id_dosen'       => $id_dosen,
					'kode_dosen'      => $this->request->getPost('kode_dosen'),
					'nama_dosen'      => $this->request->getPost('nama_dosen'),
					'alamat_dosen'      => $this->request->getPost('alamat_dosen'),
					'jk_dosen'      => $this->request->getPost('jk_dosen'),
					'no_telp'      => $this->request->getPost('no_telp'),
					'nidn'      => $this->request->getPost('nidn'),
					'foto_dsn'      => $nama_file,
				];
				$foto->move('foto_dosen', $nama_file);

				// dd($data);

				$this->ModelDosen->edit($data);
			}
			session()->setFlashdata('pesan', 'Data Berhasil diubah!');
			return redirect()->to(base_url('dosen'));
		} else {
			// tidak valid
			session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
			return redirect()->to(base_url('dosen'));
		}
	}

	public function ubah_password($id_dosen)
	{
		$data = [
			'id_dosen'       => $id_dosen,
			'password'      => $this->request->getPost('passbar'),
		];


		// dd($data);

		$this->ModelDosen->edit($data);

		session()->setFlashdata('pesan', 'Data Berhasil diubah!');
		return redirect()->to(base_url('dosen'));
	}
	public function delete($id_dosen)
	{
		$dosen = $this->ModelDosen->detailDosen($id_dosen);
		if ($dosen['foto_dsn'] != "") {
			unlink('foto_dosen/' . $dosen['foto_dsn']);
			$data = [
				'id_dosen'   => $id_dosen,
			];
			// dd($data);

		}

		$this->ModelDosen->hapus($data);
		session()->setFlashdata('pesan', 'Data Berhasil Dihapus!');
		return redirect()->to(base_url('dosen'));
	}
}
