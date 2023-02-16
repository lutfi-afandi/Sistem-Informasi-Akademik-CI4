<?= $this->include('template/head'); ?>
<?= $this->include('template/header'); ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <div class="content-header">
        <div class="container"></div>
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
                            if (session()->getFlashdata('pesan')) { ?>
                                <div class="alert alert-success" role="alert">
                                    <?= session()->getFlashdata('pesan'); ?>
                                </div>
                            <?php } ?>
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-sm table-striped" width="100%">
                                    <thead width="100%">
                                        <tr width="100%">
                                            <th width="10%" class="text-center">No</th>
                                            <th width="30%" class="text-nowrap">Nama Layanan</th>
                                            <th width="50%">Link</th>
                                            <th width="10%" class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1;
                                        foreach ($layanans as $key => $value) { ?>

                                            <tr>
                                                <td><?= $no++; ?></td>
                                                <td><?= $value['nama_layanan']; ?></td>
                                                <td class="text-xs font-italic"><a href="<?= $value['link']; ?>" target="_blank"><?= $value['link']; ?></a></td>
                                                <td class="text-center">
                                                    <button data-toggle="modal" data-target="#edit<?= $value['id_layanan']; ?>" class="btn btn-warning btn-sm btn-flat"><i class="fa fa-edit text-white"></i></button>
                                                    <button data-toggle="modal" data-target="#delete<?= $value['id_layanan']; ?>" class="btn btn-danger btn-sm btn-flat"><i class="fa fa-trash"></i></button>
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
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Tambah Layanan Akademik</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span></button>
                                </div>
                                <div class="modal-body">

                                    <?php echo form_open('ta/add_layanan'); ?>
                                    <div class="form-group">
                                        <label>Nama Layanan</label>
                                        <input type="text" name="nama_layanan" class="form-control" required placeholder="">
                                    </div>

                                    <div class="form-group">
                                        <label>Semester</label>
                                        <textarea name="link" id="" class="form-control" cols="30" rows="10"></textarea>
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

                    <!-- MODAL EDIT -->
                    <?php
                    foreach ($layanans as $key => $value) { ?>
                        <!-- Modal edit -->
                        <div class="modal fade" id="edit<?= $value['id_layanan']; ?>">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Edit Layanan Akademik</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span></button>
                                    </div>
                                    <div class="modal-body">

                                        <?php echo form_open('ta/edit_layanan/' . $value['id_layanan']); ?>
                                        <div class="form-group">
                                            <label>Nama Layanan</label>
                                            <input type="text" name="nama_layanan" class="form-control" required value="<?= $value['nama_layanan']; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Link</label>
                                            <textarea name="link" class="form-control" id="" cols="30" rows="10"><?= $value['link']; ?></textarea>
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
                    foreach ($layanans as $key => $value) { ?>
                        <!-- Modal hapus -->
                        <div class="modal fade" id="delete<?= $value['id_layanan']; ?>">
                            <div class="modal-dialog ">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Hapus Layanan</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span></button>
                                    </div>
                                    <div class="modal-body">
                                        Apakah anda ingin menghapus Layanan <b><?= $value['nama_layanan']; ?></b> ?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Close</button>
                                        <a href="<?= base_url('ta/delete_layanan/' . $value['id_layanan']); ?>" class="btn btn-success btn-flat">Hapus</a>
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