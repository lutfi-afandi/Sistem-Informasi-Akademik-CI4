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
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th width="50px" class="text-center">No</th>
                                            <th>Nama User</th>
                                            <th>Username</th>
                                            <th>Password</th>
                                            <th>Foto</th>
                                            <th width="150px" class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1;
                                        foreach ($user as $key => $value) { ?>

                                            <tr>
                                                <td><?= $no++; ?></td>
                                                <td><?= $value['nama_user']; ?></td>
                                                <td><?= $value['username']; ?></td>
                                                <td><?= $value['password']; ?></td>
                                                <td class="text-center"><img class="img-circle" width="100px" height="100px" src="<?= base_url('foto/' . $value['foto']); ?>" alt=""></td>
                                                <td class="text-center">
                                                    <button data-toggle="modal" data-target="#edit<?= $value['id_user']; ?>" class="btn btn-warning btn-sm btn-flat"><i class="fa fa-pencil"></i></button>
                                                    <button data-toggle="modal" data-target="#delete<?= $value['id_user']; ?>" class="btn btn-danger btn-sm btn-flat"><i class="fa fa-trash"></i></button>
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
                        <div class="modal-dialog modal-sm">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title">Tambah <?= $title; ?></h4>
                                </div>
                                <div class="modal-body">

                                    <?php echo form_open_multipart('user/add'); ?>
                                    <div class="form-group">
                                        <label>Nama User</label>
                                        <input type="text" name="nama_user" class="form-control" placeholder="Masukan Nama user...">
                                    </div>
                                    <div class="form-group">
                                        <label>Username</label>
                                        <input type="text" name="username" class="form-control" placeholder="Masukan Nama user...">
                                    </div>
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="text" name="password" class="form-control" placeholder="Masukan Nama Password...">
                                    </div>
                                    <div class="form-group">
                                        <label>Foto</label>
                                        <input type="file" name="foto" class="form-control">
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

                    <?php
                    foreach ($user as $key => $value) { ?>
                        <!-- Modal edit -->
                        <div class="modal fade" id="edit<?= $value['id_user']; ?>">
                            <div class="modal-dialog modal-sm">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title">Edit <?= $title; ?></h4>
                                    </div>
                                    <div class="modal-body">

                                        <?php echo form_open_multipart('user/edit/' . $value['id_user']); ?>
                                        <div class="form-group">
                                            <label>Nama User</label>
                                            <input type="text" name="nama_user" class="form-control" required value="<?= $value['nama_user']; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Username</label>
                                            <input type="text" name="username" class="form-control" value="<?= $value['username']; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input type="text" name="password" class="form-control" value="<?= $value['password']; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Ganti Foto</label>
                                            <input type="file" name="foto" class="form-control" value="<?= $value['password']; ?>">
                                        </div>
                                        <div class="form-group">
                                            <img width="120px" height="120px" class="img-circle" src="<?= base_url('foto/' . $value['foto']); ?>" alt="">
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
                    foreach ($user as $key => $value) { ?>
                        <!-- Modal hapus -->
                        <div class="modal fade" id="delete<?= $value['id_user']; ?>">
                            <div class="modal-dialog ">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title">Hapus User</h4>
                                    </div>
                                    <div class="modal-body">
                                        Apakah anda ingin menghapus User <b><?= $value['nama_user']; ?></b> ?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Close</button>
                                        <a href="<?= base_url('user/delete/' . $value['id_user']); ?>" class="btn btn-success btn-flat">Hapus</a>
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

</div>

<?= $this->include('template/js'); ?>
<?= $this->include('template/footer'); ?>