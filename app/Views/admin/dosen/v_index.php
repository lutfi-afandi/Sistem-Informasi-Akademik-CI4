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
                                <a href="<?= base_url('dosen/add'); ?>" class="btn btn-success"><i class="fa fa-plus"></i> add</a>
                            </div>
                        </div>
                        <div class="card-body">

                            <?php
                            if (session()->getFlashdata('pesan')) { ?>
                                <div class="alert alert-success" role="alert">
                                    <?= session()->getFlashdata('pesan'); ?>
                                </div>
                            <?php } ?>
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped table-responsive">
                                    <thead>
                                        <tr>
                                            <th width="30px" class="text-center">No</th>
                                            <th>Kode Dosen</th>
                                            <th>NIDN</th>
                                            <th>Nama Dosen</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Telepon</th>
                                            <th>Alamat</th>
                                            <th>Foto</th>
                                            <th>Password</th>
                                            <th width="150px" class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1;
                                        foreach ($dosen as $key => $value) { ?>

                                            <tr>
                                                <td width="30px" class="text-center"><?= $no++; ?></td>
                                                <td><?= $value['kode_dosen']; ?></td>
                                                <td><?= $value['nidn']; ?></td>
                                                <td><?= $value['nama_dosen']; ?></td>
                                                <td><?= $value['jk_dosen']; ?></td>
                                                <td><?= $value['no_telp']; ?></td>
                                                <td><?= $value['alamat_dosen']; ?></td>
                                                <td class="text-center">
                                                    <?php if ($value['foto_dsn'] == 'kosong') { ?>
                                                        <img src="<?= base_url('/gambar/default.png'); ?>" width="50px" height="50px" class="img-circle" src="" alt="">
                                                    <?php  } else { ?>
                                                        <img src="<?= base_url('/foto_dsn/' . $value['foto_dsn']); ?>" width="50px" height="50px" class="img-circle" src="" alt="">
                                                    <?php } ?>
                                                </td>
                                                <td>
                                                    <?= $value['password']; ?>
                                                    <a data-toggle="modal" data-target="#pass<?= $value['id_dosen']; ?>" class=""><i class="fa fa-edit"></i></a>
                                                </td>
                                                <td class="text-center">
                                                    <a href=" <?= base_url('dosen/edit/' . $value['id_dosen']); ?>" class="btn btn-warning btn-sm btn-flat"><i class="fa fa-pencil"></i></a>
                                                    <button data-toggle="modal" data-target="#delete<?= $value['id_dosen']; ?>" class="btn btn-danger btn-sm btn-flat"><i class="fa fa-trash"></i></button>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>


                <?php
                foreach ($dosen as $key => $value) { ?>
                    <!-- Modal hapus -->
                    <div class="modal fade" id="delete<?= $value['id_dosen']; ?>">
                        <div class="modal-dialog ">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title">Hapus Dosen</h4>
                                </div>
                                <div class="modal-body">
                                    Apakah anda ingin menghapus Dosen <b><?= $value['nama_dosen']; ?></b> ?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Close</button>
                                    <a href="<?= base_url('dosen/delete/' . $value['id_dosen']); ?>" class="btn btn-success btn-flat">Hapus</a>
                                </div>
                            </div>
                            <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                    </div>
                    <!-- /.modal -->
                <?php }
                ?>

                <!-- modal Ubah PPassword -->
                <?php
                foreach ($dosen as $key => $value) { ?>
                    <!-- Modal hapus -->
                    <div class="modal fade" id="pass<?= $value['id_dosen']; ?>">
                        <div class="modal-dialog ">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title">Hapus Dosen</h4>
                                </div>
                                <div class="modal-body">
                                    <form action="<?= base_url('dosen/ubah_password/' . $value['id_dosen']); ?>" method="post">
                                        <div class="form-group">
                                            <label for="">Password Baru</label>
                                            <input type="text" name="passbar" id="" class="form-control">
                                        </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-success btn-flat">Submit</button>
                                    </form>
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

</div>

<?= $this->include('template/js'); ?>
<?= $this->include('template/footer'); ?>