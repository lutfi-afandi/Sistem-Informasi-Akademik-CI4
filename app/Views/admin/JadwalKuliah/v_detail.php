<?= $this->include('template/head'); ?>
<?= $this->include('template/header'); ?>
<?php
$db = \Config\Database::connect();
$ta = $db->query("SELECT * FROM tbl_ta ORDER BY ta ASC")->getResultArray();
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container">
            <h1>
                <a href="<?= base_url('jadwalkuliah'); ?>"><?= $title; ?></a>
                <small><?= $prodi['prodi']; ?></small>
            </h1>
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container">

            <div class="row">
                <div class="col-sm-12">
                    <div class="card card-success card-solid">

                        <div class="card-body">
                            <table class="table table-sm">
                                <tr>
                                    <th width="150px">Program Studi</th>
                                    <td width="30px">:</td>
                                    <td><?= $prodi['prodi']; ?></td>
                                </tr>
                                <tr>
                                    <th>Jenjang</th>
                                    <td>:</td>
                                    <td><?= $prodi['jenjang']; ?></td>
                                </tr>
                                <tr>
                                    <th>Fakultas</th>
                                    <td>:</td>
                                    <td><?= $prodi['fakultas']; ?></td>
                                </tr>
                                <tr>
                                    <th>Tahun Akademik</th>
                                    <td>:</td>

                                    <td class="text-primary font-weight-bold"><?= $ta_aktif['ta']; ?> - <?= $ta_aktif['semester']; ?></td>

                                </tr>


                            </table>
                        </div>
                    </div>
                </div>

                <!-- filter Tahun akademik -->
                <div class="col-md-12">
                    <div class="card">
                                    
                        <div class="card-body">
                            <center>
                                <p class="mb-0">Filter Tahun Akademik</p class="">
                            </center>
                            <hr clas="mt-0" style="margin-top:0;">
                            <select id="select-ta" class="js-example-basic-single form-control">
                                <option value>Pilih Tahun Akademik </option>
                                <?php foreach ($ta as $key => $data) { ?>
                                <option value="<?= $data['id_ta']; ?>" <?= ($data['id_ta'] == $fil_ta) ? 'selected' : ''; ?>><?= $data['ta']; ?> - <?= $data['semester']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="col-sm-12">
                    <div class="card card-success card-solid">
                        <div class="card-header with-border">
                            <h3 class="card-title"> <?= $title; ?></h3>
                            <div class="card-tools pull-right">
                                <button type="button" data-target="#add" data-toggle="modal" class="btn btn-success btn-sm"><i class="fa fa-plus"></i> add</button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="">
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
                                <div class="alert alert-success" role="alert">
                                    <?= session()->getFlashdata('pesan'); ?>
                                </div>
                                <?php } ?>
                            </div>
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-sm table-striped" width="100%">
                                    <thead>
                                        <tr>
                                            <th width="5%" class="text-center">#</th>
                                            <th width="5%" class="text-center">TA</th>
                                            <th class="">Kode Matkul</th>
                                            <th width="5%" class="text-center">SKS</th>
                                            <th class="text-center">Kelas</th>
                                            <th class="text-center">Dosen</th>
                                            <th class="text-center">Hari</th>
                                            <th class="text-center">Ruangan</th>
                                            <th width="5%" class="text-center">Kuota</th>
                                            <th width="5%" class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1;
                                        foreach ($jadwal as $key => $value) { ?>
                                        <tr>
                                            <td class="text-center"><?= $no++; ?></td>
                                            <td class="text-center"><small ><?= $value['ta']; ?> <span class="badge badge-<?=  ($value['semester'] == 'Ganjil') ? 'success' : 'primary' ; ?>"><?= $value['semester']; ?></span> </small></td>
                                            <td class="text-center"><?= $value['kode_matkul']; ?> <small class="text-success"><?= $value['matkul']; ?></small></td>
                                            <td class="text-center"><?= $value['sks']; ?></td>
                                            <td class="text-center"><small><?= $value['nama_kelas']; ?> - <?= $value['tahun_angkatan']; ?></small></td>
                                            <td><?= $value['nama_dosen']; ?></td>
                                            <td class="text-center"><?= $value['hari']; ?></td>
                                            <td class="text-center"><?= $value['ruangan']; ?></td>
                                            <td class="text-center"><?= $value['kuota']; ?></td>
                                            <td class="text-center">
                                                <button data-toggle="modal" data-target="#delete<?= $value['id_jadwal']; ?>" class="btn btn-danger btn-sm btn-flat"><i class="fa fa-trash"></i></button>
                                            </td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal Tambah -->
            <div class="modal fade" id="add">
                <div class="modal-dialog ">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Tambah <?= $title; ?></h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                        </div>
                        <div class="modal-body">
                            <?php echo form_open('JadwalKuliah/add/' . $prodi['id_prodi']); ?>
                            <div class="form-group">
                                <label>TA</label>
                                <input type="text" disabled value="<?= $ta_aktif['semester']; ?> - <?= $ta_aktif['ta']; ?>" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Mata Kuliah</label>
                                <select name="id_matkul" class="form-control select2bs4" style="width: 100%;" id="" required>
                                    <option value="">--SEMESTER | KODE | SKS--</option>
                                    <?php foreach ($matkul as $key => $mat) { ?>
                                    <option value="<?= $mat['id_matkul']; ?>">
                                        <?= $mat['smt']; ?> | <?= $mat['matkul']; ?> (<?= $mat['kode_matkul']; ?>) | <?= $mat['sks']; ?> SKS
                                    </option>

                                    <?php } ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Dosen</label>
                                <select name="id_dosen" class="form-control" id="" required>
                                    <option value="">--Pilih Dosen Pengampu--</option>
                                    <?php foreach ($dosen as $key => $dos) { ?>
                                    <option value="<?= $dos['id_dosen']; ?>"><?= $dos['nama_dosen']; ?> </option>
                                    <?php } ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Kelas</label>
                                <select name="id_kelas" class="form-control" id="" required>
                                    <option value="">--Pilih Kelas--</option>
                                    <?php foreach ($kelas as $key => $kel) { ?>
                                    <option value="<?= $kel['id_kelas']; ?>"><?= $kel['nama_kelas']; ?> - <?= $kel['tahun_angkatan']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Hari</label>
                                        <select name="hari" class="form-control" id="" required>
                                            <option value="">--Pilih Hari--</option>
                                            <option value="Senin">Senin</option>
                                            <option value="Selasa">Selasa</option>
                                            <option value="Rabu">Rabu</option>
                                            <option value="Kamis">Kamis</option>
                                            <option value="Jumat">Jumat</option>
                                            <option value="Sabtu">Sabtu</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Waktu</label>
                                        <input type="text" name="waktu" class="form-control" id="" placeholder="ex: 09:00-11:00" required>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Ruang Kelas</label>
                                        <select name="id_ruangan" class="form-control" id="" required>
                                            <option value="">--Pilih Ruang--</option>
                                            <?php foreach ($ruangan as $key => $ruang) { ?>
                                            <option value="<?= $ruang['id_ruangan']; ?>"><?= $ruang['ruangan']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Kuota</label>
                                        <input type="number" name="kuota" class="form-control" id="" placeholder="" required>
                                    </div>
                                </div>
                            </div>


                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success btn-flat">Simpan</button>
                        </div>
                        <?= form_close(); ?>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            <!-- /.modal -->

            <?php
            foreach ($jadwal as $key => $value) { ?>
            <!-- Modal hapus -->
            <div class="modal fade" id="delete<?= $value['id_jadwal']; ?>">
                <div class="modal-dialog ">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Hapus Gedung</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                        </div>
                        <div class="modal-body">
                            Apakah anda ingin menghapus Jadwal ?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Close</button>
                            <a href="<?= base_url('JadwalKuliah/delete/' . $prodi['id_prodi'] . '/' . $value['id_jadwal']); ?>" class="btn btn-success btn-flat">Hapus</a>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            <!-- /.modal -->
            <?php }
            ?>
        </div>
    </div>
</div>

<?= $this->include('template/js'); ?>

<script>
    $(document).on('change', '#select-ta', function () {

        var dokumen = $(this).val();
        window.location.href = "?id=" + dokumen;
    });
</script>
<?= $this->include('template/footer'); ?>