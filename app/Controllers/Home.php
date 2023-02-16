<?php

namespace App\Controllers;

class Home extends BaseController
{
	public function index()
	{
		$ta_aktif = $this->db->query('SELECT ta FROM tbl_ta WHERE status =1')->getRowArray();
		// dd($ta_aktif['ta']);
		$data = [
			'title'	=> 'SIAKAD AKFAR CEFADA',
			'ta' => $ta_aktif['ta']
		];
		return view('v_home', $data);
	}
}
