<?= $this->include('template/head'); ?>
<?= $this->include('template/header'); ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container">

        </div>
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
                                <button type="button" data-target="#add" data-toggle="modal" class="btn btn-sm"><i class="fa fa-plus"></i> add</button>
                            </div>
                        </div>
                        <div class="card-body">

                            <?php
                            if (session()->getFlashdata('pesan')) { ?>
                                <div class="alert alert-success" role="alert">
                                    <?= session()->getFlashdata('pesan'); ?>
                                </div>
                            <?php } ?>
                            <table id="example1" class="table table-bordered table-sm table-striped">
                                <thead>
                                    <tr>
                                        <th width="50px" class="text-center">No</th>
                                        <th>Fakultas</th>
                                        <th width="150px" class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($fakultas as $key => $value) { ?>

                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><?= $value['fakultas']; ?></td>
                                            <td class="text-center">
                                                <button data-toggle="modal" data-target="#edit<?= $value['id_fakultas']; ?>" class="btn btn-warning btn-sm btn-flat"><i class="fa fa-edit text-white"></i></button>
                                                <button data-toggle="modal" data-target="#delete<?= $value['id_fakultas']; ?>" class="btn btn-danger btn-sm btn-flat"><i class="fa fa-trash"></i></button>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Modal Tambah -->
                    <div class="modal fade" id="add">
                        <div class="modal-dialog modal-sm">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Tambah Fakultas</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span></button>
                                </div>
                                <div class="modal-body">

                                    <?php echo form_open('fakultas/add'); ?>
                                    <div class="form-group">
                                        <label>Fakultas</label>
                                        <input type="text" name="fakultas" class="form-control" required placeholder="Masukan Nama fakultas...">
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
                    foreach ($fakultas as $key => $value) { ?>
                        <!-- Modal edit -->
                        <div class="modal fade" id="edit<?= $value['id_fakultas']; ?>">
                            <div class="modal-dialog modal-sm">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Edit Fakultas</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span></button>
                                    </div>
                                    <div class="modal-body">

                                        <?php echo form_open('fakultas/edit/' . $value['id_fakultas']); ?>
                                        <div class="form-group">
                                            <label>Fakultas</label>
                                            <input type="text" name="fakultas" class="form-control" required value="<?= $value['fakultas']; ?>">
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
                    <?php }
                    ?>

                    <?php
                    foreach ($fakultas as $key => $value) { ?>
                        <!-- Modal hapus -->
                        <div class="modal fade" id="delete<?= $value['id_fakultas']; ?>">
                            <div class="modal-dialog ">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Hapus Fakultas</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span></button>
                                    </div>
                                    <div class="modal-body">
                                        Apakah anda ingin menghapus Fakultas <b><?= $value['fakultas']; ?></b> ?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Close</button>
                                        <a href="<?= base_url('fakultas/delete/' . $value['id_fakultas']); ?>" class="btn btn-success btn-flat">Hapus</a>
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