<?php

namespace App\Controllers;

use App\Models\ModelAdmin;
use App\Models\ModelKrs;
use App\Models\ModelTa;
use App\Models\ModelMahasiswa;

class Mhs extends BaseController
{
	public function __construct()
	{
		$this->ModelAdmin = new ModelAdmin();
		$this->ModelMahasiswa = new ModelMahasiswa();
		$this->ModelKrs = new ModelKrs();
		$this->ModelTa = new ModelTa();
		$this->layanan = \Config\Database::connect()->query("SELECT * FROM tbl_layanan")->getResultArray();
	}
	public function index()
	{
		$mhs	= $this->ModelKrs->DetailMhs();
		// dd($this->layanan);
		$data = [
			'title' => 'Dashboard Mahasiswa',
			'mhs'	=> $mhs,
			'isi'	=> 'v_dashboard_mhs',
		];

		// dd($mhs);
		// dd($this->ModelKrs->DetailMhs());
		return view('v_dashboard_mhs', $data);
	}

	public function absensi()
	{
		$mhs	= $this->ModelKrs->DetailMhs();
		// dd($mhs);
		$ta = $this->ModelTa->ta_aktif();
		$data = [
			'title' => 'Absensi',
			'ta_aktif'		=> $this->ModelTa->ta_aktif(),
			'mhs'		=> $this->ModelKrs->DataMahasiswa(),
			'krs'		=> $this->ModelKrs->DataKrs($mhs['id_mhs'], $ta['id_ta']),
			'isi'	=> 'mhs/v_absensi'
		];
		// dd($data['mhs']);
		return view('mhs/v_absensi', $data);
	}

	public function Khs()
	{
		$mhs	= $this->ModelKrs->DetailMhs();
		$ta = $this->ModelTa->ta_aktif();
		$data = [
			'title' => 'Kartu Hasil Studi',
			'ta_aktif'		=> $this->ModelTa->ta_aktif(),
			'mhs'		=> $this->ModelKrs->DetailMhs(),
			'krs'		=> $this->ModelKrs->DataKrs($mhs['id_mhs'], $ta['id_ta']),
			'MakulDitawarkan'		=> $this->ModelKrs->MakulDitawarkan($ta['id_ta'], $mhs['id_prodi']),
			'isi'	=> 'mhs/v_khs',
			'tas'    => $this->ModelTa->allData(),
			'fil_ta'  => $ta['id_ta'],
		];
		// dd($data);
		$data['id_ta'] = isset($_GET['id']) ? $_GET['id'] : '';
		if (isset($_GET['id'])) {
			$id = $_GET['id'];
			$data['fil_ta'] = $_GET['id'];
			$data['krs'] = $this->ModelKrs->DataKrs($mhs['id_mhs'], $data['id_ta']);
			// $data['krs'] = $this->ModelJadwalKuliah->per_ta($id_prodi, $data['id_ta']);
		}
		return view('mhs/v_khs', $data);
	}

	public function print_khs($id_ta_aktif = false)
	{
		$mhs	= $this->ModelKrs->DetailMhs();
		$ta = $this->ModelTa->ta_aktif();
		$data = [
			'title'		=> 'Kartu Hasil Studi',
			'ta_aktif'		=> $this->ModelTa->ta_aktif(),
			'mhs'		=> $this->ModelKrs->DetailMhs(),
			'krs'		=> $this->ModelKrs->DataKrs($mhs['id_mhs'], $ta['id_ta']),
		];

		if ($id_ta_aktif) {
			// $id = $_GET['id'];
			$data['ta_aktif'] = $this->ModelTa->getTa($id_ta_aktif);
			$data['krs'] = $this->ModelKrs->DataKrs($mhs['id_mhs'], $id_ta_aktif);
			// $data['krs'] = $this->ModelJadwalKuliah->per_ta($id_prodi, $data['id_ta']);
		}

		return view('mhs/print_khs', $data);
	}

	public function profil_mhs()
	{
		$mhs	= $this->ModelKrs->DetailMhs();
		// dd($mhs);
		$data = [
			'title' => 'Profil Mahasiswa',
			'mhs'	=> $mhs,
			'isi'	=> 'v_dashboard_mhs'
		];

		// dd(session()->get('username'));
		// dd($this->ModelKrs->DetailMhs());
		return view('mhs/profil/index', $data);
	}

	public function layanan($id = "")
	{
		$data['layananni'] = $this->db->query("SELECT * FROM tbl_layanan WHERE id_layanan = '$id'")->getRowArray();
		$data['title'] = $data['layananni']['nama_layanan'];
		// dd($data['layananni']);
		return view('mhs/layanan/index', $data);
	}

	public function ubah_foto($id_mhs)
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
				'rules'  =>  'uploaded[foto_mhs]|max_size[foto_mhs,50000]|mime_in[foto_mhs,image/png,image/jpg,image/jpeg,image/gif,image/ico]',
				'errors' => [
					'uploaded'  => 'Pilih Foto terlebih dulu',
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
			return redirect()->to(base_url('mhs/profil_mhs'));
		} else {
			// tidak valid
			session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
			return redirect()->to(base_url('mhs/profil_mhs'));
		}
	}

	public function ubah_profil($id_mhs)
	{
		$input = $this->request;
		$mahasiswa = $this->ModelMahasiswa->detailData($id_mhs);

		$in['jenis_kelamin'] = $input->getPost("jenis_kelamin");
		$in['nik'] = $input->getPost("nik");
		$in['tempat_lahir'] = $input->getPost("tempat_lahir");
		$in['tanggal_lahir'] = $input->getPost("tanggal_lahir");
		$in['agama'] = $input->getPost("agama");
		$in['status_nikah'] = $input->getPost("status_nikah");
		$in['alamat'] = $input->getPost("alamat");
		$in['rt'] = $input->getPost("rt");
		$in['rw'] = $input->getPost("rw");
		$in['dusun'] = $input->getPost("dusun");
		$in['kelurahan'] = $input->getPost("kelurahan");
		$in['kabupaten'] = $input->getPost("kabupaten");
		$in['kode_pos'] = $input->getPost("kode_pos");
		$in['tempat_tinggal'] = $input->getPost("tempat_tinggal");
		$in['transportasi'] = $input->getPost("transportasi");
		$in['no_hp'] = $input->getPost("no_hp");
		$in['email'] = $input->getPost("email");
		$in['kewarganegaraan'] = $input->getPost("kewarganegaraan");

		$in['tinggi_badan'] = $input->getPost("tinggi_badan");
		$in['berat_badan'] = $input->getPost("berat_badan");
		$in['jarak_ke_sekolah'] = $input->getPost("jarak_ke_sekolah");
		$in['waktu_tempuh_ke_sekolah'] = $input->getPost("waktu_tempuh_ke_sekolah");
		$in['jumlah_saudara'] = $input->getPost("jumlah_saudara");

		$in['nama_ayah'] = $input->getPost("nama_ayah");
		$in['telp_ayah'] = $input->getPost("telp_ayah");
		$in['tahun_lahir_ayah'] = $input->getPost("tahun_lahir_ayah");
		$in['pendidikan_ayah'] = $input->getPost("pendidikan_ayah");
		$in['pekerjaan_ayah'] = $input->getPost("pekerjaan_ayah");
		$in['penghasilan_ayah'] = $input->getPost("penghasilan_ayah");

		$in['nama_ibu'] = $input->getPost("nama_ibu");
		$in['telp_ibu'] = $input->getPost("telp_ibu");
		$in['tahun_lahir_ibu'] = $input->getPost("tahun_lahir_ibu");
		$in['pendidikan_ibu'] = $input->getPost("pendidikan_ibu");
		$in['pekerjaan_ibu'] = $input->getPost("pekerjaan_ibu");
		$in['penghasilan_ibu'] = $input->getPost("penghasilan_ibu");

		$in['nama_wali'] = $input->getPost("nama_wali");
		$in['telp_wali'] = $input->getPost("telp_wali");
		$in['tahun_lahir_wali'] = $input->getPost("tahun_lahir_wali");
		$in['pendidikan_wali'] = $input->getPost("pendidikan_wali");
		$in['pekerjaan_wali'] = $input->getPost("pekerjaan_wali");
		$in['penghasilan_wali'] = $input->getPost("penghasilan_wali");

		$in['asal_sekolah'] = $input->getPost("asal_sekolah");
		$in['sumber_info'] = $input->getPost("sumber_info");
		$in['tahun_lulus'] = $input->getPost("tahun_lulus");
		$in['id_mhs']	= $id_mhs;
		// dd($in);

		$this->ModelMahasiswa->edit($in);
		session()->setFlashdata('pesan', 'Profil Berhasil diubah!');
		return redirect()->to(base_url('mhs/profil_mhs'));
	}

	function kesediaan_pkl()
	{
		// $berkas = new BerkasModel();
		// $data = $berkas->find($id);
		force_download('./surat_siap_pkl.docx', NULL);
	}
}
