<?php

namespace App\Controllers;

use App\Models\ModelMahasiswa;
use App\Models\ModelProdi;

class Mahasiswa extends BaseController
{
	public function __construct()
	{
		helper('form');
		$this->ModelMahasiswa = new ModelMahasiswa();
		$this->ModelProdi	= new ModelProdi();
	}
	public function index()
	{
		$data = [
			'title' => 'Mahasiswa',
			'mhs'	=> $this->ModelMahasiswa->allData(),
			'isi'	=> 'admin/mahasiswa/v_index'
		];
		return view('admin/mahasiswa/v_index', $data);
	}

	public function add()
	{
		$data = [
			'title' => 'Mahasiswa',
			'mhs'	=> $this->ModelMahasiswa->allData(),
			'prodi'	=> $this->ModelProdi->allData(),
			'isi'	=> 'admin/mahasiswa/v_add'
		];
		return view('admin/mahasiswa/v_add', $data);
	}

	public function insert()
	{
		$dir = './foto_mhs/';
		$foto = $this->request->getFile('foto_mhs');
		$data = [
			'nim'      => $this->request->getPost('nim'),
			'nama_mhs'      => $this->request->getPost('nama_mhs'),
			'id_prodi'      => $this->request->getPost('id_prodi'),
			'password'      => $this->request->getPost('password'),
		];
		if (!empty($foto->getName())) {
			$newname = "Foto-" . $data['nama_mhs'];
			$ext = $foto->getExtension();
			$foto->move($dir, $newname . '.' . $ext);
			$data['foto_mhs'] = $newname . '.' . $ext;
			// dd($da ta);
		} else {
			$data['foto_mhs'] = 'kosong';
		}
		if ($this->validate([
			'nama_mhs'  => [
				'label' => 'Nama Mahasiswa',
				'rules'  =>  'required',
				'errors' => [
					'required' => '{field} wajib dipilih!'
				]
			],
			'nim'  => [
				'label' => 'NIM',
				'rules'  =>  'required|is_unique[tbl_mhs.nim]',
				'errors' => [
					'required' => '{field} wajib diisi!',
					'is_unique'	=> '{field} sudah ada'
				]
			],
			'password'  => [
				// 'label' => 'Mahasiswaname',
				'rules'  =>  'required',
				'errors' => [
					'required' => '{field} wajib dipilih!'
				]
			],
		])) {
			$this->ModelMahasiswa->add($data);
			session()->setFlashdata('pesan', 'Data Berhasil ditambah!');
			return redirect()->to(base_url('mahasiswa'));
		} else {
			// tidak valid
			session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
			return redirect()->to(base_url('mahasiswa/add'));
		}
	}

	public function foto_update($id_mhs)
	{
		$mahasiswa = $this->ModelMahasiswa->detailData($id_mhs);
		$data['nama_mhs']	= $mahasiswa['nama_mhs'];
		$data['id_mhs']	= $id_mhs;
		$dir = './foto_mhs/';
		$foto = $this->request->getFile('foto_mhs');
		// dd($foto);

		if ($this->validate([

			'foto_mhs'  => [
				// 'label' => 'Mahasiswaname',
				'rules'  =>  'max_size[foto_mhs,5000]|mime_in[foto_mhs,image/png,image/jpg,image/jpeg,image/gif,image/ico]',
				'errors' => [
					'max_size'  => 'File tidak boleh lebih dari 2MB',
					'mime_in'   => 'Pastikan format jpg/png'
				]
			],
		])) {
			$newname = "Foto - " . $data['nama_mhs'];
			$ext = $foto->getExtension();
			$foto->move($dir, $newname . '.' . $ext);
			$data['foto_mhs'] = $newname . '.' . $ext;
			// dd($data);
			$this->ModelMahasiswa->edit($data);
			session()->setFlashdata('pesan', 'Foto Berhasil diubah!');
			return redirect()->to(base_url('mahasiswa'));
		} else {
			// tidak valid
			session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
			return redirect()->to(base_url('mahasiswa'));
		}
	}

	public function password_update($id_mhs)
	{
		$data['password']	= $this->request->getPost('password');
		$data['id_mhs']	= $id_mhs;
		$this->ModelMahasiswa->edit($data);
		session()->setFlashdata('pesan', 'Password Berhasil diubah!');
		return redirect()->to(base_url('mahasiswa'));
	}
	public function pembayaran($id_mhs)
	{
		$data['pembayaran']	= $this->request->getPost('pembayaran');
		$data['id_mhs']	= $id_mhs;
		$this->ModelMahasiswa->edit($data);
		session()->setFlashdata('pesan', 'Pembayaran Berhasil diubah!');
		return redirect()->to(base_url('mahasiswa'));
	}

	public function edit($id_mhs)
	{
		$data = [
			'title' => 'Mahasiswa',
			'mhs'	=> $this->ModelMahasiswa->detailData($id_mhs),
			'prodi'	=> $this->ModelProdi->allData(),
			'isi'	=> 'admin/mahasiswa/v_edit'
		];
		return view('admin/mahasiswa/v_edit', $data);
	}

	public function update($id_mhs)
	{
		if ($this->validate([
			'nama_mhs'  => [
				'label' => 'Nama Mahasiswa',
				'rules'  =>  'required',
				'errors' => [
					'required' => '{field} wajib diisi!'
				]
			],
			'id_prodi'  => [
				// 'label' => 'Mahasiswaname',
				'rules'  =>  'required',
				'errors' => [
					'required' => '{field} wajib dipilih!'
				]
			],
		])) {
			// valid
			$data = [
				'id_mhs'       => $id_mhs,
				'nim'      => $this->request->getPost('nim'),
				'nama_mhs'      => $this->request->getPost('nama_mhs'),
				'id_prodi'      => $this->request->getPost('id_prodi'),
			];
			$this->ModelMahasiswa->edit($data);
			session()->setFlashdata('pesan', 'Data Berhasil diubah!');
			return redirect()->to(base_url('mahasiswa'));
		} else {
			// tidak valid
			session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
			return redirect()->to(base_url('mahasiswa/edit/' . $id_mhs));
		}
	}

	public function delete($id_mhs)
	{
		$mhs = $this->ModelMahasiswa->detailData($id_mhs);
		if ($mhs['foto_mhs'] != "") {

			$data = [
				'id_mhs'   => $id_mhs,
			];
			// dd($data);

		}

		$this->ModelMahasiswa->hapus($data);
		session()->setFlashdata('pesan', 'Data Berhasil Dihapus!');
		return redirect()->to(base_url('mahasiswa'));
	}

	public function reset_bayar()
	{
		$this->db->query('UPDATE tbl_mhs SET pembayaran = 0 ');

		session()->setFlashdata('pesan', 'Data Pembayaran di reset!');
		return redirect()->to(base_url('mahasiswa'));
	}
}
