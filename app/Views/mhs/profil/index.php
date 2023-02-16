<?= $this->include('template/head'); ?>
<?= $this->include('template/header'); ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container">
            <div class="info-box">
                <span class="info-box-icon bg-info"><i class="fa fa-id-card"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">
                        <h3><?= $title;  ?></h3>
                    </span>

                </div>
                <!-- /.info-box-content -->
            </div>
        </div>
    </div>

    <!-- Main content -->
    <div class="content">
        <div class="container">

            <div class="row">

                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header bg-gradient-navy">
                            <h3 class="card-title">Foto Mahasiswa</h3>
                            <div class="card-tools">
                                <a type="button" data-toggle="modal" data-target="#gambar<?= $mhs['id_mhs']; ?>">
                                    <i class="fa fa-pen"></i>
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="ror">

                                <?php
                                $errors = session()->getFlashdata('errors');
                                if (!empty($errors)) { ?>
                                    <div class="alert alert-danger" role="alert">
                                        <ul>
                                            <?php foreach ($errors as $key => $value) { ?>
                                                <li><?= esc($value); ?></li>
                                            <?php } ?>
                                        </ul>
                                    </div>
                                <?php } ?>

                                <?php
                                if (session()->getFlashdata('pesan')) { ?>
                                    <div class="alert alert-warning" role="alert">
                                        <?= session()->getFlashdata('pesan'); ?>
                                    </div>
                                <?php } ?>

                            </div>
                            <div class="text-center mt-2">
                                <?php if ($mhs['foto_mhs'] == '') { ?>
                                    <img class=" m-auto" src="<?= base_url('gambar/default.png') ?>" width="200px" alt="User profile picture">
                                <?php  } else { ?>
                                    <img class=" m-auto" src="<?= base_url('foto_mhs/' . $mhs['foto_mhs']) ?>" width="200px" alt="User profile picture">
                                <?php } ?>
                            </div>


                        </div>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="card">
                        <form action="<?= base_url('mhs/ubah_profil/' . $mhs['id_mhs']); ?>" method="post">
                            <div class="card-body">
                                <!-- Data diri -->
                                <center>DATA CALON MAHASISWA BARU</center>
                                </b>
                                <div class="card-navy card-outline mb-2"></div>

                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">NIM <text class="text-danger">*</text></label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" placeholder="<?= $mhs['nim']; ?>" name="nim" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Nama Lengkap <text class="text-danger">*</text></label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" placeholder="<?= $mhs['nama_mhs']; ?>" name="nama_siswa" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">NIK <text class="text-danger">*</text></label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" placeholder="Nomor Induk Penduduk" name="nik" required="" autocomplete="off" value="<?= $mhs['nik'] ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-3 col-form-label">Jenis Kelamin <text class="text-danger">*</text>
                                    </label>
                                    <div class="col-sm-9">
                                        <select id="Jenis Kelamin" class="form-control " style="width: 100%;" name="jenis_kelamin" required="">
                                            <option <?= ($mhs['jenis_kelamin'] == 'Laki-Laki') ? 'selected' : ''; ?>>Laki-laki</option>
                                            <option <?= ($mhs['jenis_kelamin'] == 'Perempuan') ? 'selected' : ''; ?>>Perempuan</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Tempat Lahir <text class="text-danger">*</text></label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" placeholder="Tempat Lahir" name="tempat_lahir" required="" autocomplete="off" value="<?= $mhs['tempat_lahir']; ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Tanggal Lahir <text class="text-danger">*</text></label>
                                    <div class="input-group col-sm-9">

                                        <input type="date" class="form-control" placeholder="Tanggal Lahir" name="tanggal_lahir" required="" autocomplete="off" value="<?= $mhs['tanggal_lahir']; ?>">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-3 col-form-label">Agama <text class="text-danger">*</text>
                                    </label>
                                    <div class="col-sm-9">
                                        <select id="Agama" class="form-control " style="width: 100%; " name="agama" required="">
                                            <option <?= ($mhs['agama'] == 'Islam') ? 'selected' : ''; ?>>Islam</option>
                                            <option <?= ($mhs['agama'] == 'Kristen') ? 'selected' : ''; ?>>Kristen</option>
                                            <option <?= ($mhs['agama'] == 'Hindu') ? 'selected' : ''; ?>>Hindu</option>
                                            <option <?= ($mhs['agama'] == 'Budha') ? 'selected' : ''; ?>>Budha</option>
                                            <option <?= ($mhs['agama'] == 'Protestan') ? 'selected' : ''; ?>>Protestan</option>
                                            <option <?= ($mhs['agama'] == 'Katolik') ? 'selected' : ''; ?>>Katolik</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-3 col-form-label">Status <text class="text-danger">*</text>
                                    </label>
                                    <div class="col-sm-9">
                                        <select id="Status Nikah" class="form-control " style="width: 100%; " name="status_nikah" required="">
                                            <option <?= ($mhs['status_nikah'] == 'Belum Menikah') ? 'selected' : ''; ?>>Belum Menikah</option>
                                            <option <?= ($mhs['status_nikah'] == 'Sudah Menikah') ? 'selected' : ''; ?>>Sudah Menikah</option>
                                            <option <?= ($mhs['status_nikah'] == 'Sudah Pernah Menikah') ? 'selected' : ''; ?>>Sudah Pernah Menikah</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Alamat Jalan <text class="text-danger">*</text></label>
                                    <div class="col-sm-9">
                                        <textarea type="text" class="form-control" placeholder="alamat" name="alamat" required=""><?= $mhs['alamat']; ?></textarea>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">RT </label>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control" placeholder="RT" name="rt" autocomplete="off" value="<?= $mhs['rt']; ?>">
                                    </div>
                                    <label class="col-sm-1 col-form-label">RW </label>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control" placeholder="RW" name="rw" autocomplete="off" value="<?= $mhs['rw']; ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Nama Dusun </label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" placeholder="Nama Dusun" name="dusun" autocomplete="off" value="<?= $mhs['dusun']; ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Nama Kelurahan / Desa </label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" placeholder="Nama Kelurahan / Desa" name="kelurahan" autocomplete="off" value="<?= $mhs['kelurahan']; ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Kabupaten </label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" placeholder="Kabupaten" name="kabupaten" autocomplete="off" value="<?= $mhs['kabupaten']; ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Kode POS </label>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control" placeholder="Kode POS" name="kode_pos" autocomplete="off" value="<?= $mhs['kode_pos']; ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-3 col-form-label">Tempat Tinggal <text class="text-danger">*</text>
                                    </label>
                                    <div class="col-sm-9">
                                        <select id="Tempat Tinggal" class="form-control " style="width: 100%; " name="tempat_tinggal" required="">
                                            <option <?= ($mhs['tempat_tinggal'] == 'Asrama') ? 'selected' : ''; ?>>Asrama</option>
                                            <option <?= ($mhs['tempat_tinggal'] == 'Rumah Sendiri') ? 'selected' : ''; ?>>Rumah Sendiri</option>
                                            <option <?= ($mhs['tempat_tinggal'] == 'Kos') ? 'selected' : ''; ?>>Kos</option>
                                            <option <?= ($mhs['tempat_tinggal'] == 'Panti Asuhan') ? 'selected' : ''; ?>>Panti Asuhan</option>
                                            <option <?= ($mhs['tempat_tinggal'] == 'Wali') ? 'selected' : ''; ?>>Wali</option>
                                            <option <?= ($mhs['tempat_tinggal'] == 'Lainnya') ? 'selected' : ''; ?>>Lainnya</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-3 col-form-label">Transportasi <text class="text-danger">*</text>
                                    </label>
                                    <div class="col-sm-9">
                                        <select id="Transportasi" class="form-control " style="width: 100%; " name="transportasi" required="">
                                            <option <?= ($mhs['transportasi'] == 'Jalan Kaki') ? 'selected' : ''; ?>>Jalan Kaki</option>
                                            <option <?= ($mhs['transportasi'] == 'Abodemen') ? 'selected' : ''; ?>>Abodemen</option>
                                            <option <?= ($mhs['transportasi'] == 'Kendaraan Pribadi') ? 'selected' : ''; ?>>Kendaraan Pribadi</option>
                                            <option <?= ($mhs['transportasi'] == 'Kendaraan Umum') ? 'selected' : ''; ?>>Kendaraan Umum</option>
                                            <option <?= ($mhs['transportasi'] == 'Gojek/Grab/Maxim') ? 'selected' : ''; ?>>Gojek/Grab/Maxim</option>
                                            <option <?= ($mhs['transportasi'] == 'Lainnya') ? 'selected' : ''; ?>>Lainnya</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Nomor HP / WA <text class="text-danger">*</text></label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" placeholder="Nomor HP" name="no_hp" required="" autocomplete="off" value="<?= $mhs['no_hp']; ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">E-mail Pribadi <text class="text-danger">*</text></label>
                                    <div class="col-sm-9">
                                        <input type="email" class="form-control" placeholder="E-mail Pribadi" name="email" required="" autocomplete="off" value="<?= $mhs['email']; ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-3 col-form-label">Kewarganegaraan <text class="text-danger">*</text>
                                    </label>
                                    <div class="col-sm-9">
                                        <select id="Kewarganegaraan" class="form-control " style="width: 100%; " name="kewarganegaraan" required="">
                                            <option <?= ($mhs['kewarganegaraan'] == 'Warga Negara Indonesia (WNI)') ? 'selected' : ''; ?>>Warga Negara Indonesia (WNI)</option>
                                            <option <?= ($mhs['kewarganegaraan'] == 'Warga Negara Asing (WNA)') ? 'selected' : ''; ?>>Warga Negara Asing (WNA)</option>
                                        </select>
                                    </div>
                                </div>
                                <!-- DATA PERIODIK -->
                                <b>
                                    <center>DATA PERIODIK</center>
                                </b>
                                <div class="card-navy card-outline mb-2"></div>
                                <div class="form-group row">
                                    <label class="col-sm-5 col-form-label">Tinggi Badan (Cm) <text class="text-danger">*</text></label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" placeholder="Tinggi Badan (Cm)" name="tinggi_badan" required="" autocomplete="off" value="<?= $mhs['tinggi_badan']; ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-5 col-form-label">Berat Badan (Kg) <text class="text-danger">*</text></label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" placeholder="Berat Badan (Kg)" name="berat_badan" required="" autocomplete="off" value="<?= $mhs['berat_badan']; ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-5 col-form-label">Jarak Tempat Tinggal ke Kampus (Km) <text class="text-danger">*</text></label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" placeholder="Jarak Tempat Tinggal ke Kampus (Km)" name="jarak_ke_sekolah" required="" autocomplete="off" value="<?= $mhs['jarak_ke_sekolah']; ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-5 col-form-label">Waktu Tempuh ke Kampus (Menit) <text class="text-danger">*</text></label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" placeholder="Waktu Tempuh ke Sekolah (Menit)" name="waktu_tempuh_ke_sekolah" required="" autocomplete="off" value="<?= $mhs['waktu_tempuh_ke_sekolah']; ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-5 col-form-label">Jumlah Saudara Kandung
                                        <text class="text-danger">*</text></label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" placeholder=" Jumlah Saudara Kandung" name="jumlah_saudara" required="" autocomplete="off" value="<?= $mhs['jumlah_saudara']; ?>">
                                    </div>
                                </div>

                                <!-- DATA AYAH KANDUNG -->
                                <b>
                                    <center>DATA AYAH KANDUNG</center>
                                </b>
                                <div class="card-navy card-outline mb-2"></div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Nama Ayah Kandung
                                        <text class="text-danger">*</text></label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" placeholder="Nama Ayah Kandung" name="nama_ayah" required="" autocomplete="off" value="<?= $mhs['nama_ayah']; ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Nomor Telepon / WA
                                        <text class="text-danger">*</text></label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" placeholder="Nomor Telepon atau WhatsApp" name="telp_ayah" required="" autocomplete="off" value="<?= $mhs['telp_ayah']; ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Tahun Lahir
                                        <text class="text-danger">*</text></label>
                                    <div class="col-sm-9">
                                        <input type="number" class="form-control" placeholder="Tahun Lahir" name="tahun_lahir_ayah" required="" autocomplete="off" value="<?= $mhs['tahun_lahir_ayah']; ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-3 col-form-label">Pendidikan <text class="text-danger">*</text>
                                    </label>
                                    <div class="col-sm-9">
                                        <select class="form-control " style="width: 100%; " name="pendidikan_ayah" required="">
                                            <option <?= ($mhs['pendidikan_ayah'] == 'D1') ? 'selected' : ''; ?>>D1</option>
                                            <option <?= ($mhs['pendidikan_ayah'] == 'D2') ? 'selected' : ''; ?>>D2</option>
                                            <option <?= ($mhs['pendidikan_ayah'] == 'D3') ? 'selected' : ''; ?>>D3</option>
                                            <option <?= ($mhs['pendidikan_ayah'] == 'D4/S1') ? 'selected' : ''; ?>>D4/S1</option>
                                            <option <?= ($mhs['pendidikan_ayah'] == 'S2') ? 'selected' : ''; ?>>S2</option>
                                            <option <?= ($mhs['pendidikan_ayah'] == 'S3') ? 'selected' : ''; ?>>S3</option>
                                            <option <?= ($mhs['pendidikan_ayah'] == 'SD Sederajat') ? 'selected' : ''; ?>>SD Sederajat</option>
                                            <option <?= ($mhs['pendidikan_ayah'] == 'SMP Sederajat') ? 'selected' : ''; ?>>SMP Sederajat</option>
                                            <option <?= ($mhs['pendidikan_ayah'] == 'SMA Sederajat') ? 'selected' : ''; ?>>SMA Sederajat</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-3 col-form-label">Pekerjaan <text class="text-danger">*</text>
                                    </label>
                                    <div class="col-sm-9">
                                        <select class="form-control " style="width: 100%; " name="pekerjaan_ayah" required="">
                                            <option <?= ($mhs['pekerjaan_ayah'] == 'Buruh') ? 'selected' : ''; ?>>Buruh</option>
                                            <option <?= ($mhs['pekerjaan_ayah'] == 'Karyawan Swasta') ? 'selected' : ''; ?>>Karyawan Swasta</option>
                                            <option <?= ($mhs['pekerjaan_ayah'] == 'Nelayan') ? 'selected' : ''; ?>>Nelayan</option>
                                            <option <?= ($mhs['pekerjaan_ayah'] == 'Pedagang Besar') ? 'selected' : ''; ?>>Pedagang Besar</option>
                                            <option <?= ($mhs['pekerjaan_ayah'] == 'Pedagang Kecil') ? 'selected' : ''; ?>>Pedagan Kecil</option>
                                            <option <?= ($mhs['pekerjaan_ayah'] == 'Pensiunan') ? 'selected' : ''; ?>>Pensiunan</option>
                                            <option <?= ($mhs['pekerjaan_ayah'] == 'Petani') ? 'selected' : ''; ?>>Petani</option>
                                            <option <?= ($mhs['pekerjaan_ayah'] == 'Peternak') ? 'selected' : ''; ?>>Peternak</option>
                                            <option <?= ($mhs['pekerjaan_ayah'] == 'PNS/POLRI/TNI') ? 'selected' : ''; ?>>PNS/POLRI/TNI</option>
                                            <option <?= ($mhs['pekerjaan_ayah'] == 'Wiraswasta') ? 'selected' : ''; ?>>Wiraswasta</option>
                                            <option <?= ($mhs['pekerjaan_ayah'] == 'Wirausaha') ? 'selected' : ''; ?>>Wirausaha</option>
                                            <option <?= ($mhs['pekerjaan_ayah'] == 'Lainnya') ? 'selected' : ''; ?>>Lainnya</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-3 col-form-label">Penghasilan <text class="text-danger">*</text>
                                    </label>
                                    <div class="col-sm-9">
                                        <select class="form-control " style="width: 100%; " name="penghasilan_ayah" required="">
                                            <option <?= ($mhs['penghasilan_ayah'] == '1 Juta - 1.999.999 Juta') ? 'selected' : ''; ?>>1 Juta - 1.999.999 Juta</option>
                                            <option <?= ($mhs['penghasilan_ayah'] == '2 Juta - 4.999.999') ? 'selected' : ''; ?>>2 Juta - 4.999.999</option>
                                            <option <?= ($mhs['penghasilan_ayah'] == '5 Juta - 20 Juta') ? 'selected' : ''; ?>>5 Juta - 20 Juta</option>
                                            <option <?= ($mhs['penghasilan_ayah'] == '500.000 Ribu - 999.999500.000 Ribu - 999.999') ? 'selected' : ''; ?>>500.000 Ribu - 999.999</option>
                                            <option <?= ($mhs['penghasilan_ayah'] == 'Kurang Dari 500.000') ? 'selected' : ''; ?>>Kurang Dari 500.000</option>
                                            <option <?= ($mhs['penghasilan_ayah'] == 'Lebih Dari 10 Juta') ? 'selected' : ''; ?>>Lebih Dari 10 Juta</option>
                                        </select>
                                    </div>
                                </div>

                                <!-- DATA IBU KANDUNG -->
                                <b>
                                    <center>DATA IBU KANDUNG</center>
                                </b>
                                <div class="card-navy card-outline mb-2"></div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Nama Ibu Kandung
                                        <text class="text-danger">*</text></label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" placeholder="Nama Ibu Kandung" name="nama_ibu" required="" autocomplete="off" value="<?= $mhs['nama_ibu']; ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Nomor Telepon / WA
                                        <text class="text-danger">*</text></label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" placeholder="Nomor Telepon atau WhatsApp" name="telp_ibu" required="" autocomplete="off" value="<?= $mhs['telp_ibu']; ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Tahun Lahir
                                        <text class="text-danger">*</text></label>
                                    <div class="col-sm-9">
                                        <input type="number" class="form-control" placeholder="Tahun Lahir" name="tahun_lahir_ibu" required="" autocomplete="off" value="<?= $mhs['tahun_lahir_ibu']; ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-3 col-form-label">Pendidikan <text class="text-danger">*</text>
                                    </label>
                                    <div class="col-sm-9">
                                        <select class="form-control " style="width: 100%; " name="pendidikan_ibu" required="">
                                            <option <?= ($mhs['pendidikan_ibu'] == 'D1') ? 'selected' : ''; ?>>D1</option>
                                            <option <?= ($mhs['pendidikan_ibu'] == 'D2') ? 'selected' : ''; ?>>D2</option>
                                            <option <?= ($mhs['pendidikan_ibu'] == 'D3') ? 'selected' : ''; ?>>D3</option>
                                            <option <?= ($mhs['pendidikan_ibu'] == 'D4/S1') ? 'selected' : ''; ?>>D4/S1</option>
                                            <option <?= ($mhs['pendidikan_ibu'] == 'S2') ? 'selected' : ''; ?>>S2</option>
                                            <option <?= ($mhs['pendidikan_ibu'] == 'S3') ? 'selected' : ''; ?>>S3</option>
                                            <option <?= ($mhs['pendidikan_ibu'] == 'SD Sederajat') ? 'selected' : ''; ?>>SD Sederajat</option>
                                            <option <?= ($mhs['pendidikan_ibu'] == 'SMP Sederajat') ? 'selected' : ''; ?>>SMP Sederajat</option>
                                            <option <?= ($mhs['pendidikan_ibu'] == 'SMA Sederajat') ? 'selected' : ''; ?>>SMA Sederajat</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-3 col-form-label">Pekerjaan <text class="text-danger">*</text>
                                    </label>
                                    <div class="col-sm-9">
                                        <select class="form-control " style="width: 100%; " name="pekerjaan_ibu" required="">
                                            <option <?= ($mhs['pekerjaan_ibu'] == 'Buruh') ? 'selected' : ''; ?>>Buruh</option>
                                            <option <?= ($mhs['pekerjaan_ibu'] == 'Karyawan Swasta') ? 'selected' : ''; ?>>Karyawan Swasta</option>
                                            <option <?= ($mhs['pekerjaan_ibu'] == 'Nelayan') ? 'selected' : ''; ?>>Nelayan</option>
                                            <option <?= ($mhs['pekerjaan_ibu'] == 'Pedagang Besar') ? 'selected' : ''; ?>>Pedagang Besar</option>
                                            <option <?= ($mhs['pekerjaan_ibu'] == 'Pedagang Kecil') ? 'selected' : ''; ?>>Pedagan Kecil</option>
                                            <option <?= ($mhs['pekerjaan_ibu'] == 'Pensiunan') ? 'selected' : ''; ?>>Pensiunan</option>
                                            <option <?= ($mhs['pekerjaan_ibu'] == 'Petani') ? 'selected' : ''; ?>>Petani</option>
                                            <option <?= ($mhs['pekerjaan_ibu'] == 'Peternak') ? 'selected' : ''; ?>>Peternak</option>
                                            <option <?= ($mhs['pekerjaan_ibu'] == 'PNS/POLRI/TNI') ? 'selected' : ''; ?>>PNS/POLRI/TNI</option>
                                            <option <?= ($mhs['pekerjaan_ibu'] == 'Wiraswasta') ? 'selected' : ''; ?>>Wiraswasta</option>
                                            <option <?= ($mhs['pekerjaan_ibu'] == 'Wirausaha') ? 'selected' : ''; ?>>Wirausaha</option>
                                            <option <?= ($mhs['pekerjaan_ibu'] == 'Lainnya') ? 'selected' : ''; ?>>Lainnya</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-3 col-form-label">Penghasilan <text class="text-danger">*</text>
                                    </label>
                                    <div class="col-sm-9">
                                        <select class="form-control " style="width: 100%; " name="penghasilan_ibu" required="">
                                            <option <?= ($mhs['penghasilan_ibu'] == '1 Juta - 1.999.999 Juta') ? 'selected' : ''; ?>>1 Juta - 1.999.999 Juta</option>
                                            <option <?= ($mhs['penghasilan_ibu'] == '2 Juta - 4.999.999') ? 'selected' : ''; ?>>2 Juta - 4.999.999</option>
                                            <option <?= ($mhs['penghasilan_ibu'] == '5 Juta - 20 Juta') ? 'selected' : ''; ?>>5 Juta - 20 Juta</option>
                                            <option <?= ($mhs['penghasilan_ibu'] == '500.000 Ribu - 999.999500.000 Ribu - 999.999') ? 'selected' : ''; ?>>500.000 Ribu - 999.999</option>
                                            <option <?= ($mhs['penghasilan_ibu'] == 'Kurang Dari 500.000') ? 'selected' : ''; ?>>Kurang Dari 500.000</option>
                                            <option <?= ($mhs['penghasilan_ibu'] == 'Lebih Dari 10 Juta') ? 'selected' : ''; ?>>Lebih Dari 10 Juta</option>
                                        </select>
                                    </div>
                                </div>

                                <!-- DATA Wali  -->
                                <b>
                                    <center>DATA WALI</center>
                                </b>
                                <div class="card-navy card-outline mb-2"></div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Nama Wali</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" placeholder=" Nama Wali Kandung" name="nama_wali" autocomplete="off" value="<?= $mhs['nama_wali']; ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Nomor Telepon / WA
                                        <text class="text-danger">*</text></label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" placeholder="Nomor Telepon atau WhatsApp" name="telp_wali" required="" value="<?= $mhs['telp_wali']; ?>" autocomplete="off">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Tahun Lahir</label>
                                    <div class="col-sm-9">
                                        <input type="number" class="form-control" placeholder=" Tahun Lahir" name="tahun_lahir_wali" autocomplete="off" value="<?= $mhs['tahun_lahir_wali']; ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-3 col-form-label">Pendidikan
                                    </label>
                                    <div class="col-sm-9">
                                        <select class="form-control " style="width: 100%; " name="pendidikan_wali">
                                            <option <?= ($mhs['pendidikan_wali'] == 'D1') ? 'selected' : ''; ?>>D1</option>
                                            <option <?= ($mhs['pendidikan_wali'] == 'D2') ? 'selected' : ''; ?>>D2</option>
                                            <option <?= ($mhs['pendidikan_wali'] == 'D3') ? 'selected' : ''; ?>>D3</option>
                                            <option <?= ($mhs['pendidikan_wali'] == 'D4/S1') ? 'selected' : ''; ?>>D4/S1</option>
                                            <option <?= ($mhs['pendidikan_wali'] == 'S2') ? 'selected' : ''; ?>>S2</option>
                                            <option <?= ($mhs['pendidikan_wali'] == 'S3') ? 'selected' : ''; ?>>S3</option>
                                            <option <?= ($mhs['pendidikan_wali'] == 'SD Sederajat') ? 'selected' : ''; ?>>SD Sederajat</option>
                                            <option <?= ($mhs['pendidikan_wali'] == 'SMP Sederajat') ? 'selected' : ''; ?>>SMP Sederajat</option>
                                            <option <?= ($mhs['pendidikan_wali'] == 'SMA Sederajat') ? 'selected' : ''; ?>>SMA Sederajat</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-3 col-form-label">Pekerjaan
                                    </label>
                                    <div class="col-sm-9">
                                        <select class="form-control " style="width: 100%; " name="pekerjaan_wali">
                                            <option <?= ($mhs['pekerjaan_wali'] == 'Buruh') ? 'selected' : ''; ?>>Buruh</option>
                                            <option <?= ($mhs['pekerjaan_wali'] == 'Karyawan Swasta') ? 'selected' : ''; ?>>Karyawan Swasta</option>
                                            <option <?= ($mhs['pekerjaan_wali'] == 'Nelayan') ? 'selected' : ''; ?>>Nelayan</option>
                                            <option <?= ($mhs['pekerjaan_wali'] == 'Pedagang Besar') ? 'selected' : ''; ?>>Pedagang Besar</option>
                                            <option <?= ($mhs['pekerjaan_wali'] == 'Pedagang Kecil') ? 'selected' : ''; ?>>Pedagan Kecil</option>
                                            <option <?= ($mhs['pekerjaan_wali'] == 'Pensiunan') ? 'selected' : ''; ?>>Pensiunan</option>
                                            <option <?= ($mhs['pekerjaan_wali'] == 'Petani') ? 'selected' : ''; ?>>Petani</option>
                                            <option <?= ($mhs['pekerjaan_wali'] == 'Peternak') ? 'selected' : ''; ?>>Peternak</option>
                                            <option <?= ($mhs['pekerjaan_wali'] == 'PNS/POLRI/TNI') ? 'selected' : ''; ?>>PNS/POLRI/TNI</option>
                                            <option <?= ($mhs['pekerjaan_wali'] == 'Wiraswasta') ? 'selected' : ''; ?>>Wiraswasta</option>
                                            <option <?= ($mhs['pekerjaan_wali'] == 'Wirausaha') ? 'selected' : ''; ?>>Wirausaha</option>
                                            <option <?= ($mhs['pekerjaan_wali'] == 'Lainnya') ? 'selected' : ''; ?>>Lainnya</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-3 col-form-label">Penghasilan
                                    </label>
                                    <div class="col-sm-9">
                                        <select class="form-control " style="width: 100%; " name="penghasilan_wali">
                                            <option <?= ($mhs['penghasilan_wali'] == '1 Juta - 1.999.999 Juta') ? 'selected' : ''; ?>>1 Juta - 1.999.999 Juta</option>
                                            <option <?= ($mhs['penghasilan_wali'] == '2 Juta - 4.999.999') ? 'selected' : ''; ?>>2 Juta - 4.999.999</option>
                                            <option <?= ($mhs['penghasilan_wali'] == '5 Juta - 20 Juta') ? 'selected' : ''; ?>>5 Juta - 20 Juta</option>
                                            <option <?= ($mhs['penghasilan_wali'] == '500.000 Ribu - 999.999500.000 Ribu - 999.999') ? 'selected' : ''; ?>>500.000 Ribu - 999.999</option>
                                            <option <?= ($mhs['penghasilan_wali'] == 'Kurang Dari 500.000') ? 'selected' : ''; ?>>Kurang Dari 500.000</option>
                                            <option <?= ($mhs['penghasilan_wali'] == 'Lebih Dari 10 Juta') ? 'selected' : ''; ?>>Lebih Dari 10 Juta</option>
                                        </select>
                                    </div>
                                </div>

                                <!-- DATA PERIODIK -->
                                <b>
                                    <center>ASAL SEKOLAH SMA/SMK SEDERAJAT</center>
                                </b>
                                <div class="card-navy card-outline mb-2"></div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Asal Sekolah <text class="text-danger">*</text></label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" placeholder="Asal Sekolah" name="asal_sekolah" required="" autocomplete="off" value="<?= $mhs['asal_sekolah']; ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Tahun Lulus<text class="text-danger">*</text></label>
                                    <div class="col-sm-9">
                                        <input type="number" class="form-control" onkeypress="return hanyaAngka(event)" placeholder="2010" name="tahun_lulus" required="" autocomplete="off" value="<?= $mhs['tahun_lulus']; ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Sumber Informasi Akfar Cefada<text class="text-danger">*</text></label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" placeholder="Sumber informasi Akfar Cefada" name="sumber_info" required="" autocomplete="off" value="<?= $mhs['sumber_info']; ?>">
                                    </div>
                                </div>


                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan Perubahan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>




        <!-- Modal ubah foto -->
        <div class="modal fade" id="gambar<?= $mhs['id_mhs']; ?>">
            <div class="modal-dialog ">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Upload Foto Mahasiswa</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <form action="<?= base_url('mhs/ubah_foto/' . $mhs['id_mhs']); ?>" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="">Foto Formal <small class="text-danger">*maksimal 1mb</small></label>
                                <input type="file" name="foto_mhs" id="foto_mhs" class="form-control" accept="image/*">
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success btn-flat">Simpan</button>
                        </form>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->

        <!-- Modal hapus -->
        <div class="modal fade" id="delete">
            <div class="modal-dialog ">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Hapus Mata Kuliah</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        Apakah anda ingin menghapus Matakuliah <b></b> ?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Close</button>
                        <a href="" class="btn btn-success btn-flat">Hapus</a>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->


    </div>


</div>

<?= $this->include('template/js'); ?>
<?= $this->include('template/footer'); ?>