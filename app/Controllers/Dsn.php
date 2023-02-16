<?php

namespace App\Controllers;

use App\Models\ModelAdmin;
use App\Models\ModelDsn;
use App\Models\ModelTa;

class Dsn extends BaseController
{
	public function __construct()
	{
		helper('form');
		$this->ModelAdmin = new ModelAdmin();
		$this->ModelDsn = new ModelDsn();
		$this->ModelTa = new ModelTa();
	}
	public function index()
	{
		$data = [
			'title' => 'Dosen',
			'dosen'	=> $this->ModelDsn->DataDosen(),
			'ta'	=> $this->ModelTa->ta_aktif(),
			'isi'	=> 'v_dashboard_dsn'
		];
		// dd($this->ModelTa->ta_aktif());
		return view('v_dashboard_dsn', $data);
	}

	public function jadwal()
	{
		$ta = $this->ModelTa->ta_aktif();
		$data = [
			'title' => 'Jadwal Mengajar',
			'jadwal'		=> $this->ModelDsn->JadwalDsn($ta['id_ta']),
			'ta'	=> $ta,
			'isi'	=> 'dosen/v_jadwal'
		];
		// dd(session()->get('id_dosen'));
		return view('dosen/v_jadwal', $data);
	}

	public function AbsenKelas()
	{
		$ta = $this->ModelTa->ta_aktif();
		$data = [
			'title' => 'Absen Kelas',
			'jadwal'		=> $this->ModelDsn->JadwalDsn($ta['id_ta']),
			'ta'	=> $ta,
			'isi'	=> 'dosen/absenkelas/v_absenkelas',
			'tas'    => $this->ModelTa->allData(),
			'fil_ta'  => $this->ModelTa->ta_aktif(),
		];

		$data['id_ta'] = isset($_GET['id']) ? $_GET['id'] : '';
		if (isset($_GET['id'])) {
			 $id = $_GET['id'];
			 $data['fil_ta'] = $_GET['id'];
			 $data['jadwal'] = $this->ModelDsn->JadwalDsn($data['id_ta']);
		}

		
		// dd(session()->get('id_dosen'));
		return view('dosen/absenkelas/v_absenkelas', $data);
	}

	public function absensi($id_jadwal)
	{
		$data = [
			'title' => 'Absensi',
			'jadwal'		=> $this->ModelDsn->DetailJadwal($id_jadwal),
			'mhs'		=> $this->ModelDsn->mhs($id_jadwal),
			'isi'	=> 'dosen/absenkelas/v_absensi'
		];
		// dd($this->ModelDsn->DetailJadwal($id_jadwal));
		return view('dosen/absenkelas/v_absensi', $data);
	}

	public function SimpanAbsen($id_jadwal)
	{
		$mhs 	=  $this->ModelDsn->mhs($id_jadwal);
		foreach ($mhs as $key => $value) {
			// dd($mhs);
			$data = [
				'id_krs'		=> $this->request->getPost($value['id_krs'] . 'id_krs'),
				'p1'		=> $this->request->getPost($value['id_krs'] . 'p1'),
				'p2'		=> $this->request->getPost($value['id_krs'] . 'p2'),
				'p3'		=> $this->request->getPost($value['id_krs'] . 'p3'),
				'p4'		=> $this->request->getPost($value['id_krs'] . 'p4'),
				'p5'		=> $this->request->getPost($value['id_krs'] . 'p5'),
				'p6'		=> $this->request->getPost($value['id_krs'] . 'p6'),
				'p7'		=> $this->request->getPost($value['id_krs'] . 'p7'),
				'p8'		=> $this->request->getPost($value['id_krs'] . 'p8'),
				'p9'		=> $this->request->getPost($value['id_krs'] . 'p9'),
				'p10'		=> $this->request->getPost($value['id_krs'] . 'p10'),
				'p11'		=> $this->request->getPost($value['id_krs'] . 'p11'),
				'p12'		=> $this->request->getPost($value['id_krs'] . 'p12'),
				'p13'		=> $this->request->getPost($value['id_krs'] . 'p13'),
				'p14'		=> $this->request->getPost($value['id_krs'] . 'p14'),
				'p15'		=> $this->request->getPost($value['id_krs'] . 'p15'),
				'p16'		=> $this->request->getPost($value['id_krs'] . 'p16'),
				'p17'		=> $this->request->getPost($value['id_krs'] . 'p17'),
				'p18'		=> $this->request->getPost($value['id_krs'] . 'p18'),
				// 'nilai_absen'	=>  $this->request->getPost($value['id_krs'] . 'nilai_absen'),
			];

			$this->ModelDsn->SimpanAbsen($data);
		}
		session()->setFlashdata('pesan', 'Absen berhasil  Ditambahkan!');
		return redirect()->to(base_url('dsn/absensi/' . $id_jadwal));
	}

	public function print_absensi($id_jadwal)
	{
		$data = [
			'title' => 'Cetak Absensi',
			'jadwal'		=> $this->ModelDsn->DetailJadwal($id_jadwal),
			'mhs'		=> $this->ModelDsn->mhs($id_jadwal),
			'ta' => $this->ModelTa->ta_aktif(),
			// 'isi'	=> 'dosen/absenkelas/v_print_absensi'
		];
		// dd($this->ModelDsn->DetailJadwal($id_jadwal));
		return view('dosen/absenkelas/v_print_absensi', $data);
	}

	public function NilaiMahasiswa()
	{
		$ta = $this->ModelTa->ta_aktif();
		$data = [
			'title' => 'Nilai Mahasiswa',
			'jadwal'		=> $this->ModelDsn->JadwalDsn($ta['id_ta']),
			'ta'	=> $ta,
			'isi'	=> 'dosen/nilai/v_nilaimhs',
			'tas'    => $this->ModelTa->allData(),
			'fil_ta'  => $this->ModelTa->ta_aktif(),
		];

		$data['id_ta'] = isset($_GET['id']) ? $_GET['id'] : '';
		if (isset($_GET['id'])) {
			 $id = $_GET['id'];
			 $data['fil_ta'] = $_GET['id'];
			 $data['jadwal'] = $this->ModelDsn->JadwalDsn($data['id_ta']);
		}
		// dd(session()->get('id_dosen'));
		return view('dosen/nilai/v_nilaimhs', $data);
	}

	public function DataNilai($id_jadwal)
	{
		$jumlah = $this->db->table('tbl_krs')
		->join('tbl_mhs', 'tbl_krs.id_mhs = tbl_mhs.id_mhs')
		->where('id_jadwal', $id_jadwal)->countAllResults();
		$data = [
			'title' => 'Nilai',
			'jadwal'		=> $this->ModelDsn->DetailJadwal($id_jadwal),
			'mhs'		=> $this->ModelDsn->mhs($id_jadwal),
			'isi'	=> 'dosen/nilai/v_datanilai',
			'total_mhs'	=> $jumlah,
		];
		// dd($jumlah);
		return view('dosen/nilai/v_datanilai', $data);
	}

	public function SimpanNilai1($id_jadwal)
	{
		$mhs 	=  $this->ModelDsn->mhs($id_jadwal);
		foreach ($mhs as $key => $value) {
			// dd($mhs);
			$absen = $this->request->getPost($value['id_krs'] . 'absensi');
			$nilai_tugas = $this->request->getPost($value['id_krs'] . 'nilai_tugas');
			$nilai_uts = $this->request->getPost($value['id_krs'] . 'nilai_uts');
			$nilai_uas = $this->request->getPost($value['id_krs'] . 'nilai_uas');
			$na = ($absen * 15 / 100) + ($nilai_tugas * 15 / 100) + ($nilai_uts * 30 / 100) + ($nilai_uas * 40 / 100);
			if ($na >= 90) {
				$nh = 'A';
				$bobot = 4;
			} elseif ($na < 90 && $na >= 80) {
				$nh = 'B';
				$bobot = 3;
			} elseif ($na < 80 && $na >= 70) {
				$nh = 'C';
				$bobot = 2;
			} elseif ($na < 70 && $na >= 60) {
				$nh = 'D';
				$bobot = 1;
			} else {
				$nh = 'E';
				$bobot = 0;
			}
			$data = [
				'id_krs'		=> $this->request->getPost($value['id_krs'] . 'id_krs'),
				'nilai_tugas'		=> $this->request->getPost($value['id_krs'] . 'nilai_tugas'),
				'nilai_uts'		=> $this->request->getPost($value['id_krs'] . 'nilai_uts'),
				'nilai_uas'		=> $this->request->getPost($value['id_krs'] . 'nilai_uas'),
				'nilai_akhir'		=> number_format($na, 0),
				'nilai_huruf'		=> $nh,
				'bobot'	=> $bobot
			];

			$this->ModelDsn->SimpanNilai($data);
		}
		session()->setFlashdata('pesan', 'Data Nilai berhasil  Ditambahkan!');
		return redirect()->to(base_url('dsn/DataNilai/' . $id_jadwal));
	}

	public function SimpanNilai($id_jadwal)
	{
		$mhs 	=  $this->ModelDsn->mhs($id_jadwal);
		foreach ($mhs as $key => $value) {
			// dd($mhs);
			$absen = $this->request->getPost($value['id_krs'] . 'absensi');
			$nilai_akhir = $this->request->getPost($value['id_krs'] . 'nilai_akhir');
			$nilai_huruf = $this->request->getPost($value['id_krs'] . 'nilai_huruf');
			if ($nilai_huruf =='A') {
				$bobot = 4;
			} elseif ($nilai_huruf == 'B') {
				$bobot = 3;
			} elseif ($nilai_huruf == 'C') {
				$bobot = 2;
			} elseif ($nilai_huruf == 'D') {
				$bobot = 1;
			} else {
				$bobot = 0;
			}
			$data = [
				'id_krs'		=> $this->request->getPost($value['id_krs'] . 'id_krs'),
				'nilai_akhir'		=> number_format($nilai_akhir, 0),
				'nilai_huruf'		=> $nilai_huruf,
				'bobot'	=> $bobot,
			];

			// dd($data);

			$this->ModelDsn->SimpanNilai($data);
		}
		session()->setFlashdata('pesan', 'Data Nilai berhasil  Ditambahkan!');
		return redirect()->to(base_url('dsn/DataNilai/' . $id_jadwal));
	}

	public function print_nilai($id_jadwal)
	{
		$ta = $this->ModelTa->ta_aktif();
		$data = [
			'title' => 'Nilai',
			'jadwal'		=> $this->ModelDsn->DetailJadwal($id_jadwal),
			'ta'	=> $ta,
			'mhs'		=> $this->ModelDsn->mhs($id_jadwal),
			// 'isi'	=> 'dosen/nilai/v_datanilai'
		];
		// dd($this->ModelDsn->DetailJadwal($id_jadwal));
		return view('dosen/nilai/v_printnilai', $data);
	}
}
