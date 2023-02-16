<?php

namespace App\Controllers;

use App\Models\ModelAdmin;

class Admin extends BaseController
{
	public function __construct()
	{
		$this->ModelAdmin = new ModelAdmin();
	}
	public function index()
	{
		$data = [
			'title' => 'Admin',
			'jml_gedung'		=> $this->ModelAdmin->jml_gedung(),
			'jml_ruangan'		=> $this->ModelAdmin->jml_ruangan(),
			'jml_fakultas'		=> $this->ModelAdmin->jml_fakultas(),
			'jml_prodi'		=> $this->ModelAdmin->jml_prodi(),
			'jml_dosen'		=> $this->ModelAdmin->jml_dosen(),
			'jml_mhs'		=> $this->ModelAdmin->jml_mhs(),
			'jml_matkul'		=> $this->ModelAdmin->jml_matkul(),
			'jml_user'		=> $this->ModelAdmin->jml_user(),
			'isi'	=> 'v_admin'
		];
		return view('v_admin', $data);
	}
}
