<?php

namespace App\Controllers;

use App\Models\ModelTa;

class Ta extends BaseController
{
	public function __construct()
	{
		helper('form');
		$this->ModelTa = new ModelTa();
	}
	public function index()
	{
		$data = [
			'ta'	=> $this->ModelTa->allData(),
			'title' => 'Tahun Akademik',
			'isi'	=> 'admin/v_ta'
		];
		return view('admin/v_ta', $data);
	}

	public function add()
	{
		$data = [
			'ta'      => $this->request->getPost('ta'),
			'semester'      => strtoupper($this->request->getPost('semester')),
		];
		// dd($data);

		$this->ModelTa->add($data);
		session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan!');
		return redirect()->to(base_url('ta'));
	}

	public function edit($id_ta)
	{
		$data = [
			'id_ta'   => $id_ta,
			'ta'      => $this->request->getPost('ta'),
			'semester'      => $this->request->getPost('semester'),
		];
		// dd($data);

		$this->ModelTa->edit($data);
		session()->setFlashdata('pesan', 'Data Berhasil Diubah!');
		return redirect()->to(base_url('ta'));
	}

	public function delete($id_ta)
	{
		$data = [
			'id_ta'   => $id_ta,
		];
		// dd($data);

		$this->ModelTa->hapus($data);
		session()->setFlashdata('pesan', 'Data Berhasil Dihapus!');
		return redirect()->to(base_url('ta'));
	}

	// setting tahun akademik

	public function setting()
	{
		$data = [
			'ta'	=> $this->ModelTa->allData(),
			'title' => 'Tahun Akademik',
			'isi'	=> 'admin/v_set_ta'
		];
		return view('admin/v_set_ta', $data);
	}

	public function set_status_ta($id_ta)
	{
		// reset dulu status yang lain
		$this->ModelTa->reset_status_ta();
		// baru katifkan yang dipilih
		$data = [
			'id_ta'	=> $id_ta,
			'status'	=> 1
		];
		$this->ModelTa->edit($data);
		session()->setFlashdata('pesan', 'Satus Tahun Akademik Berhasil diubah!');
		return redirect()->to(base_url('ta/setting'));
	}


	public function layanan()
	{

		$data = [
			'layanans'	=> $this->db->query("SELECT * FROM tbl_layanan")->getResultArray(),
			'title' => 'Layanan Akademik',
			'isi'	=> 'admin/v_ta'
		];
		return view('admin/v_layanan', $data);
	}

	public function add_layanan()
	{
		$data = [

			'nama_layanan'      => $this->request->getPost('nama_layanan'),
			'link'      => $this->request->getPost('link'),
		];
		// dd($data);

		$this->db->table('tbl_layanan')->insert($data);
		session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan!');
		return redirect()->to(base_url('ta/layanan'));
	}

	public function edit_layanan($id_layanan)
	{
		$data = [
			'id_layanan'   => $id_layanan,
			'nama_layanan'      => $this->request->getPost('nama_layanan'),
			'link'      => $this->request->getPost('link'),
		];
		// dd($data);

		$this->db->table('tbl_layanan')->where('id_layanan', $data['id_layanan'])->update($data);
		session()->setFlashdata('pesan', 'Data Berhasil Diubah!');
		return redirect()->to(base_url('ta/layanan'));
	}

	public function delete_layanan($id_layanan)
	{
		$data = [
			'id_layanan'   => $id_layanan,
		];
		// dd($data);

		$this->db->table('tbl_layanan')->where('id_layanan', $data['id_layanan'])->delete($data);
		session()->setFlashdata('pesan', 'Data Berhasil Dihapus!');
		return redirect()->to(base_url('ta/layanan'));
	}
}
