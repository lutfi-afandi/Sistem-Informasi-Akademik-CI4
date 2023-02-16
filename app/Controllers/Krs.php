<?php

namespace App\Controllers;

use App\Models\ModelAdmin;
use App\Models\ModelKrs;
use App\Models\ModelTa;

class Krs extends BaseController
{

	public function __construct()
	{
		$this->ModelAdmin = new ModelAdmin();
		$this->ModelTa = new ModelTa();
		$this->ModelKrs = new ModelKrs();
	}
	public function index()
	{
		$mhs	= $this->ModelKrs->DetailMhs();
		$ta = $this->ModelTa->ta_aktif();
		$data = [
			'title' => 'Kartu Rencana Studi',
			'ta_aktif'		=> $this->ModelTa->ta_aktif(),
			'mhs'		=> $mhs,
			'krs'		=> $this->ModelKrs->DataKrs($mhs['id_mhs'], $ta['id_ta']),
			'MakulDitawarkan'		=> $this->ModelKrs->MakulDitawarkan($ta['id_ta'], $mhs['id_prodi']),
			'ta'    => $this->ModelTa->allData(),
			'fil_ta'  => $ta['id_ta'],
			'isi'	=> 'mhs/krs/v_krs'
		];
		// $id_prodi = $data['mhs']['id_prodi'];
		// dd($data['mhs']['id_prodi']);
		// dd($data['krs']);

		$data['id_ta'] = isset($_GET['id']) ? $_GET['id'] : '';
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $data['fil_ta'] = $_GET['id'];
            $data['krs'] = $this->ModelKrs->DataKrs($mhs['id_mhs'], $data['id_ta']);
            // $data['krs'] = $this->ModelJadwalKuliah->per_ta($id_prodi, $data['id_ta']);
        }

		return view('mhs/krs/v_krs', $data);
	}

	public function tambahmatkul($id_jadwal, $ta_aktif =false)
	{

		$mhs 	= $this->ModelKrs->DetailMhs();
		$ta = $this->ModelTa->ta_aktif();
		$krs = $this->ModelKrs->DataKrs($mhs['id_mhs'], $ta['id_ta']);
		// dd(count($krs));
		for ($i = 0; $i < count($krs); $i++) {
			if ($id_jadwal != $krs[$i]['id_jadwal'] && $krs[$i]['id_mhs'] != $mhs['id_mhs']) {
				session()->setFlashdata('pesan', 'Matakuliah sudah ada sebelumnya !');
				return redirect()->to(base_url('krs'));
			}
		}

		if($ta_aktif){
			$ta = $ta_aktif;
			$param = '?id='.$ta_aktif;
		}else{
			$ta = $ta['id_ta'];
			$param = '';
		}
		$data 	= [
			'id_jadwal'		=> $id_jadwal,
			'id_ta'			=> $ta,
			'id_mhs'		=> $mhs['id_mhs']
		];

		$this->ModelKrs->TambahMatkul($data);
		session()->setFlashdata('pesan', 'Matakuliah Berhasil ditambahkan !');
		return redirect()->to(base_url('krs'.$param));
	}

	public function delete($id_krs, $ta_aktif =false)
	{if($ta_aktif){
		
		$param = '?id='.$ta_aktif;
	}else{
		$param = '';
	}
		$data = [
			'id_krs'   => $id_krs,
		];
		// dd($data);

		$this->ModelKrs->hapus($data);
		session()->setFlashdata('pesan', 'Data Berhasil Dihapus!');
		return redirect()->to(base_url('krs'.$param));
	}

	public function print($id_ta_aktif = false)
	{
		$mhs	= $this->ModelKrs->DetailMhs();
		$ta = $this->ModelTa->ta_aktif();
		$data = [
			'title'		=> 'Kartu Rencana Studi',
			'ta_aktif'		=> $this->ModelTa->ta_aktif(),
			'mhs'		=> $this->ModelKrs->DetailMhs(),
			'krs'		=> $this->ModelKrs->DataKrs($mhs['id_mhs'], $ta['id_ta']),
			'MakulDitawarkan'		=> $this->ModelKrs->MakulDitawarkan($ta['id_ta'], $mhs['id_prodi']),
		];

		
        if ($id_ta_aktif) {
            // $id = $_GET['id'];
            $data['ta_aktif'] = $this->ModelTa->getTa($id_ta_aktif);
            $data['krs'] = $this->ModelKrs->DataKrs($mhs['id_mhs'], $id_ta_aktif);
            // $data['krs'] = $this->ModelJadwalKuliah->per_ta($id_prodi, $data['id_ta']);
        }

		return view('mhs/krs/print_krs', $data);
	}
}