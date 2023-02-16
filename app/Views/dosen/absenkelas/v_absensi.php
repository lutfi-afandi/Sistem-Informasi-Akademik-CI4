<?= $this->include('template/head'); ?>
<?= $this->include('template/header'); ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"> <?= $title;  ?> : <?= $jadwal['matkul']; ?> - <?= $jadwal['nama_kelas']; ?> </h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('dsn/absenkelas'); ?>"><i class="fa fa-calendar"></i> Absen Kelas</a></li>
                        <li class="breadcrumb-item active">Absensi</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container">

            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="table-responsive">
                            <table class="table  table-sm label-success">
                                <tr>
                                    <th>Program Studi</th>
                                    <td class="text-center" width="20px"> : </td>
                                    <td><?= $jadwal['prodi']; ?></td>
                                </tr>
                                <tr>
                                    <th>Fakultas</th>
                                    <td class="text-center" width="20px"> : </td>
                                    <td><?= $jadwal['fakultas']; ?></td>
                                </tr>
                                <tr>
                                    <th>Kode Matkul</th>
                                    <td class="text-center" width="20px"> : </td>
                                    <td><?= $jadwal['kode_matkul']; ?></td>
                                </tr>
                                <tr>
                                    <th>Mata Kuliah</th>
                                    <td class="text-center" width="20px"> : </td>
                                    <td><?= $jadwal['matkul']; ?></td>
                                </tr>
                                <tr>
                                    <th>Jadwal</th>
                                    <td class="text-center" width="20px"> : </td>
                                    <td><?= $jadwal['hari']; ?> - <?= $jadwal['waktu']; ?></td>
                                </tr>
                                <tr>
                                    <th>Dosen Pengampu</th>
                                    <td class="text-center" width="20px"> : </td>
                                    <td><?= $jadwal['nama_dosen']; ?></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12 mb-2">
                    <a target="_blank" href="<?= base_url('dsn/print_absensi/' . $jadwal['id_jadwal']); ?>" class="btn btn-sm btn-flat btn-primary"><i class="fa fa-print"></i> Cetak Absensi</a>
                </div>

            </div>

            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <?php
                            if (session()->getFlashdata('pesan')) { ?>
                                <div class="alert alert-success" role="alert">
                                    <?= session()->getFlashdata('pesan'); ?>
                                </div>
                            <?php } ?>
                            <?= form_open('dsn/SimpanAbsen/' . $jadwal['id_jadwal']); ?>
                            <div class="table-responsive">
                                <table class="table table-striped  table-bordered table-sm" id="example2" style="width: 100%;">
                                    <tr class="bg-gradient-success">
                                        <th rowspan="2" class="text-center" style="vertical-align: middle;">No</th>
                                        <th rowspan="2" class="text-center" style="vertical-align: middle;">NIM</th>
                                        <th rowspan="2" class="text-center" style="vertical-align: middle;">Mahasiswa</th>
                                        <th colspan="16" class="text-center">Pertemuan</th>
                                    </tr>
                                    <tr class="bg-gradient-success">
                                        <th class="text-center">1</th>
                                        <th class="text-center">2</th>
                                        <th class="text-center">3</th>
                                        <th class="text-center">4</th>
                                        <th class="text-center">5</th>
                                        <th class="text-center">6</th>
                                        <th class="text-center">7</th>
                                        <th class="text-center">8</th>
                                        <th class="text-center">9</th>
                                        <th class="text-center">10</th>
                                        <th class="text-center">11</th>
                                        <th class="text-center">12</th>
                                        <th class="text-center">13</th>
                                        <th class="text-center">14</th>
                                        <th class="text-center">15</th>
                                        <th class="text-center">16</th>
                                    </tr>
                                    <?php $no = 1;
                                    $sks = 0;
                                    foreach ($mhs as $key => $value) {
                                        $absensi = ($value['p1'] +
                                            $value['p2'] +
                                            $value['p3'] +
                                            $value['p4'] +
                                            $value['p5'] +
                                            $value['p6'] +
                                            $value['p7'] +
                                            $value['p8'] +
                                            $value['p9'] +
                                            $value['p10'] +
                                            $value['p11'] +
                                            $value['p12'] +
                                            $value['p13'] +
                                            $value['p14'] +
                                            $value['p15'] +
                                            $value['p16']) / 32 * 100;
                                        echo form_hidden($value['id_krs'] . 'nilai_absen', number_format($absensi, 0));
                                        echo form_hidden($value['id_krs'] . 'id_krs', $value['id_krs']); ?>

                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><?= $value['nim']; ?></td>
                                            <td><?= $value['nama_mhs']; ?></td>
                                            <td class="text-center text-xs">
                                                <select name="<?= $value['id_krs']; ?>p1" id="">
                                                    <option value="0" <?= ($value['p1'] == 0) ? "selected" : ""; ?>>A</option>
                                                    <option value="1" <?= ($value['p1'] == 1) ? "selected" : ""; ?>>I</option>
                                                    <option value="2" <?= ($value['p1'] == 2) ? "selected" : ""; ?>>H</option>
                                                </select>
                                            </td>
                                            <td class="text-center text-xs">
                                                <select name="<?= $value['id_krs']; ?>p2" id="">
                                                    <option value="0" <?= ($value['p2'] == 0) ? "selected" : ""; ?>>A</option>
                                                    <option value="1" <?= ($value['p2'] == 1) ? "selected" : ""; ?>>I</option>
                                                    <option value="2" <?= ($value['p2'] == 2) ? "selected" : ""; ?>>H</option>
                                                </select>
                                            </td>
                                            <td class="text-center text-xs">
                                                <select name="<?= $value['id_krs']; ?>p3" id="">
                                                    <option value="0" <?= ($value['p3'] == 0) ? "selected" : ""; ?>>A</option>
                                                    <option value="1" <?= ($value['p3'] == 1) ? "selected" : ""; ?>>I</option>
                                                    <option value="2" <?= ($value['p3'] == 2) ? "selected" : ""; ?>>H</option>
                                                </select>
                                            </td>
                                            <td class="text-center text-xs">
                                                <select name="<?= $value['id_krs']; ?>p4" id="">
                                                    <option value="0" <?= ($value['p4'] == 0) ? "selected" : ""; ?>>A</option>
                                                    <option value="1" <?= ($value['p4'] == 1) ? "selected" : ""; ?>>I</option>
                                                    <option value="2" <?= ($value['p4'] == 2) ? "selected" : ""; ?>>H</option>
                                                </select>
                                            </td>
                                            <td class="text-center text-xs">
                                                <select name="<?= $value['id_krs']; ?>p5" id="">
                                                    <option value="0" <?= ($value['p5'] == 0) ? "selected" : ""; ?>>A</option>
                                                    <option value="1" <?= ($value['p5'] == 1) ? "selected" : ""; ?>>I</option>
                                                    <option value="2" <?= ($value['p5'] == 2) ? "selected" : ""; ?>>H</option>
                                                </select>
                                            </td>
                                            <td class="text-center text-xs">
                                                <select name="<?= $value['id_krs']; ?>p6" id="">
                                                    <option value="0" <?= ($value['p6'] == 0) ? "selected" : ""; ?>>A</option>
                                                    <option value="1" <?= ($value['p6'] == 1) ? "selected" : ""; ?>>I</option>
                                                    <option value="2" <?= ($value['p6'] == 2) ? "selected" : ""; ?>>H</option>
                                                </select>
                                            </td>
                                            <td class="text-center text-xs">
                                                <select name="<?= $value['id_krs']; ?>p7" id="">
                                                    <option value="0" <?= ($value['p7'] == 0) ? "selected" : ""; ?>>A</option>
                                                    <option value="1" <?= ($value['p7'] == 1) ? "selected" : ""; ?>>I</option>
                                                    <option value="2" <?= ($value['p7'] == 2) ? "selected" : ""; ?>>H</option>
                                                </select>
                                            </td>
                                            <td class="text-center text-xs">
                                                <select name="<?= $value['id_krs']; ?>p8" id="">
                                                    <option value="0" <?= ($value['p8'] == 0) ? "selected" : ""; ?>>A</option>
                                                    <option value="1" <?= ($value['p8'] == 1) ? "selected" : ""; ?>>I</option>
                                                    <option value="2" <?= ($value['p8'] == 2) ? "selected" : ""; ?>>H</option>
                                                </select>
                                            </td>
                                            <td class="text-center text-xs">
                                                <select name="<?= $value['id_krs']; ?>p9" id="">
                                                    <option value="0" <?= ($value['p9'] == 0) ? "selected" : ""; ?>>A</option>
                                                    <option value="1" <?= ($value['p9'] == 1) ? "selected" : ""; ?>>I</option>
                                                    <option value="2" <?= ($value['p9'] == 2) ? "selected" : ""; ?>>H</option>
                                                </select>
                                            </td>
                                            <td class="text-center text-xs">
                                                <select name="<?= $value['id_krs']; ?>p10" id="">
                                                    <option value="0" <?= ($value['p10'] == 0) ? "selected" : ""; ?>>A</option>
                                                    <option value="1" <?= ($value['p10'] == 1) ? "selected" : ""; ?>>I</option>
                                                    <option value="2" <?= ($value['p10'] == 2) ? "selected" : ""; ?>>H</option>
                                                </select>
                                            </td>
                                            <td class="text-center text-xs">
                                                <select name="<?= $value['id_krs']; ?>p11" id="">
                                                    <option value="0" <?= ($value['p11'] == 0) ? "selected" : ""; ?>>A</option>
                                                    <option value="1" <?= ($value['p11'] == 1) ? "selected" : ""; ?>>I</option>
                                                    <option value="2" <?= ($value['p11'] == 2) ? "selected" : ""; ?>>H</option>
                                                </select>
                                            </td>
                                            <td class="text-center text-xs">
                                                <select name="<?= $value['id_krs']; ?>p12" id="">
                                                    <option value="0" <?= ($value['p12'] == 0) ? "selected" : ""; ?>>A</option>
                                                    <option value="1" <?= ($value['p12'] == 1) ? "selected" : ""; ?>>I</option>
                                                    <option value="2" <?= ($value['p12'] == 2) ? "selected" : ""; ?>>H</option>
                                                </select>
                                            </td>
                                            <td class="text-center text-xs">
                                                <select name="<?= $value['id_krs']; ?>p13" id="">
                                                    <option value="0" <?= ($value['p13'] == 0) ? "selected" : ""; ?>>A</option>
                                                    <option value="1" <?= ($value['p13'] == 1) ? "selected" : ""; ?>>I</option>
                                                    <option value="2" <?= ($value['p13'] == 2) ? "selected" : ""; ?>>H</option>
                                                </select>
                                            </td>
                                            <td class="text-center text-xs">
                                                <select name="<?= $value['id_krs']; ?>p14" id="">
                                                    <option value="0" <?= ($value['p14'] == 0) ? "selected" : ""; ?>>A</option>
                                                    <option value="1" <?= ($value['p14'] == 1) ? "selected" : ""; ?>>I</option>
                                                    <option value="2" <?= ($value['p14'] == 2) ? "selected" : ""; ?>>H</option>
                                                </select>
                                            </td>
                                            <td class="text-center text-xs">
                                                <select name="<?= $value['id_krs']; ?>p15" id="">
                                                    <option value="0" <?= ($value['p15'] == 0) ? "selected" : ""; ?>>A</option>
                                                    <option value="1" <?= ($value['p15'] == 1) ? "selected" : ""; ?>>I</option>
                                                    <option value="2" <?= ($value['p15'] == 2) ? "selected" : ""; ?>>H</option>
                                                </select>
                                            </td>
                                            <td class="text-center text-xs">
                                                <select name="<?= $value['id_krs']; ?>p16" id="">
                                                    <option value="0" <?= ($value['p16'] == 0) ? "selected" : ""; ?>>A</option>
                                                    <option value="1" <?= ($value['p16'] == 1) ? "selected" : ""; ?>>I</option>
                                                    <option value="2" <?= ($value['p16'] == 2) ? "selected" : ""; ?>>H</option>
                                                </select>
                                            </td>

                                        </tr>
                                    <?php } ?>
                                </table>
                            </div>

                            <button class="btn btn-success btn-flat"><i class="fa fa-save"></i> Simpan Absen</button>
                            <?= form_close(); ?>
                        </div>
                    </div>

                </div>
            </div>



        </div>
    </div>

    <?= $this->include('template/js'); ?>
    <?= $this->include('template/footer'); ?>