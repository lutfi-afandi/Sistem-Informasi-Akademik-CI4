<?= $this->include('template/head'); ?>
<?= $this->include('template/header'); ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container">

        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card card-success card-solid">
                        <div class="card-header with-border">
                            <h3 class="card-title">Data <?= $title; ?></h3>
                            <div class="card-tools pull-right">
                                <button type="button" data-target="#add" data-toggle="modal" class="btn btn-success"><i class="fa fa-plus"></i> add</button>
                            </div>
                        </div>
                        <div class="card-body">

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
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped table-sm" width="100%">
                                    <thead>
                                        <tr>
                                            <th width="5%" class="text-center">No</th>
                                            <th>Nama Kelas</th>
                                            <th>Program Studi</th>
                                            <th>Dosen PA</th>
                                            <th width="10%" class="text-center">Tahun Angkatan</th>
                                            <th width="10%" class="text-center">Jumlah</th>
                                            <th width="10%" class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $db = \Config\Database::connect();

                                        $no = 1;
                                        foreach ($kelas as $key => $value) { ?>
                                            <?php $jml = $db->table('tbl_mhs')->where('id_kelas', $value['id_kelas'])->countAllResults(); ?>
                                            <tr>
                                                <td class="text-center"><?= $no++; ?></td>
                                                <td class=""><b><?= $value['nama_kelas']; ?> - <?= $value['tahun_angkatan']; ?></b></td>
                                                <td><?= $value['prodi']; ?> - <?= $value['jenjang']; ?></td>
                                                <td><?= $value['nama_dosen']; ?></td>
                                                <td class="text-center"><?= $value['tahun_angkatan']; ?></td>
                                                <td class="text-center">
                                                    <a href="<?= base_url('kelas/rincian_kelas/' . $value['id_kelas']); ?>" class="btn btn-app bg-primary">
                                                        <i class="fas "><?= $jml; ?></i> Mahasiswa
                                                    </a>
                                                </td>
                                                <td class=" text-center">
                                                    <button data-toggle="modal" data-target="#edit<?= $value['id_kelas']; ?>" class="btn btn-warning btn-sm btn-flat"><i class="fa fa-edit text-white"></i></button>
                                                    <button data-toggle="modal" data-target="#delete<?= $value['id_kelas']; ?>" class="btn btn-danger btn-sm btn-flat"><i class="fa fa-trash"></i></button>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
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

                                    <?php echo form_open_multipart('kelas/add'); ?>
                                    <div class="form-group">
                                        <label>Nama Kelas</label>
                                        <input type="text" name="nama_kelas" class="form-control" placeholder="Masukan Nama kelas...">
                                    </div>

                                    <div class="form-group">
                                        <label for="">Program Studi</label>
                                        <select class="form-control" name="id_prodi" id="">
                                            <option value="">--Pilih Prodi--</option>
                                            <?php foreach ($prodi as $key => $value) { ?>
                                                <option value="<?= $value['id_prodi']; ?>"><?= $value['jenjang']; ?> - <?= $value['prodi']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Dosen PA</label>
                                        <select class="form-control" name="id_dosen">
                                            <option value="">--Pilih Dosen PA--</option>
                                            <?php foreach ($dosen as $key => $value) { ?>
                                                <option value="<?= $value['id_dosen']; ?>"><?= $value['nidn']; ?> - <?= $value['nama_dosen']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>Tahun Agkatan</label>
                                        <select name="tahun_angkatan" class="form-control">
                                            <option value="">--Pilih Tahun--</option>
                                            <?php for ($i = date('Y') + 1; $i >= date('Y') - 6; $i--) { ?>
                                                <option value="<?= $i; ?>"><?php echo $i; ?></option>
                                            <?php  } ?>
                                        </select>
                                    </div>


                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-success btn-flat">Simpan</button>
                                </div>
                                <?= form_close(); ?>
                            </div>
                            <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                    </div>
                    <!-- /.modal -->

                    <!-- Modal edit -->
                    <?php
                    foreach ($kelas as $key => $value) { ?>
                        <div class="modal fade" id="edit<?= $value['id_kelas']; ?>">
                            <div class="modal-dialog ">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Edit <?= $title; ?></h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span></button>
                                    </div>
                                    <div class="modal-body">

                                        <?php echo form_open_multipart('kelas/edit/' . $value['id_kelas']); ?>
                                        <div class="form-group">
                                            <label>Nama Kelas</label>
                                            <input type="text" name="nama_kelas" class="form-control" required value="<?= $value['nama_kelas']; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Program Studi</label>
                                            <select class="form-control" name="id_prodi" id="">
                                                <option value="">--Pilih Prodi--</option>
                                                <?php foreach ($prodi as $key => $pro) { ?>
                                                    <option value="<?= $value['id_prodi']; ?>" <?php echo $retVal = ($value['id_prodi'] == $pro['id_prodi']) ? "selected" : ""; ?>><?= $pro['jenjang']; ?> - <?= $pro['prodi']; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Dosen PA</label>
                                            <select class="form-control" name="id_dosen">
                                                <option value="">--Pilih Dosen PA--</option>
                                                <?php foreach ($dosen as $key => $dos) { ?>
                                                    <option value="<?= $value['id_dosen']; ?>" <?php echo $retVal = ($value['id_dosen'] == $dos['id_dosen']) ? "selected" : ""; ?>>
                                                        <?= $dos['nidn']; ?> - <?= $dos['nama_dosen']; ?>
                                                    </option>
                                                <?php } ?>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label>Tahun Agkatan</label>
                                            <select name="tahun_angkatan" class="form-control">
                                                <option value="">--Pilih Tahun--</option>
                                                <?php for ($i = date('Y'); $i >= date('Y') - 6; $i--) { ?>
                                                    <option value="<?= $i; ?>" <?php echo $retVal = ($value['tahun_angkatan'] == $i) ? "selected" : ""; ?>><?php echo $i; ?></option>
                                                <?php  } ?>
                                            </select>
                                        </div>

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-success btn-flat">Simpan</button>
                                    </div>
                                    <?= form_close(); ?>
                                </div>
                                <!-- /.modal-content -->
                            </div>
                            <!-- /.modal-dialog -->
                        </div>
                        <!-- /.modal -->
                    <?php }
                    ?>

                    <?php
                    foreach ($kelas as $key => $value) { ?>
                        <!-- Modal hapus -->
                        <div class="modal fade" id="delete<?= $value['id_kelas']; ?>">
                            <div class="modal-dialog ">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Hapus <?= $title; ?></h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span></button>
                                    </div>
                                    <div class="modal-body">
                                        Apakah anda ingin menghapus Kelas <b><?= $value['nama_kelas']; ?></b> ?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Close</button>
                                        <a href="<?= base_url('kelas/delete/' . $value['id_kelas']); ?>" class="btn btn-success btn-flat">Hapus</a>
                                    </div>
                                </div>
                                <!-- /.modal-content -->
                            </div>
                            <!-- /.modal-dialog -->
                        </div>
                        <!-- /.modal -->
                    <?php } ?>

                </div>
            </div>

        </div>
    </div>

</div>

<?= $this->include('template/js'); ?>
<?= $this->include('template/footer'); ?>