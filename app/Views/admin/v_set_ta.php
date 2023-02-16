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
                            </div>
                        </div>
                        <div class="card-body">

                            <?php
                            if (session()->getFlashdata('pesan')) { ?>
                                <div class="alert alert-success" role="alert">
                                    <?= session()->getFlashdata('pesan'); ?>
                                </div>
                            <?php } ?>
                            <table id="example1" class="table table-bordered table-striped table-sm">
                                <thead>
                                    <tr>
                                        <th width="50px" class="text-center">No</th>
                                        <th>Tahun Akademik</th>
                                        <th>Semester</th>
                                        <th class="text-center">Status</th>
                                        <th width="150px" class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($ta as $key => $value) { ?>

                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><?= $value['ta']; ?></td>
                                            <td><?= $value['semester']; ?></td>
                                            <td class="text-center">
                                                <?php if ($value['status'] == 0) {
                                                    echo '<p class="badge text-center bg-red">Non-Aktif</p>';
                                                } else {
                                                    echo  '<p class="badge text-center bg-green">Aktif</p>';
                                                } ?>
                                            </td>
                                            <td class="text-center">
                                                <?php if ($value['status'] == 0) { ?>
                                                    <a href="<?= base_url('ta/set_status_ta/' . $value['id_ta']); ?>" class="btn btn-success btn-sm"><i class="fa fa-check"></i> aktifkan</a>
                                                <?php } ?>

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
                                    <h4 class="modal-title">Tambah Ta</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span></button>
                                </div>
                                <div class="modal-body">

                                    <?php echo form_open('ta/add'); ?>
                                    <div class="form-group">
                                        <label>Tahun Akademik</label>
                                        <input type="text" name="ta" class="form-control" required placeholder="ex: 2020/2021...">
                                    </div>

                                    <div class="form-group">
                                        <label>Semester</label>
                                        <select name="semester" class="form-control" id="">
                                            <option value="">--Pilih Semester--</option>
                                            <option value="Ganjil">Ganjil</option>
                                            <option value="Genap">Genap</option>
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

                    <?php
                    foreach ($ta as $key => $value) { ?>
                        <!-- Modal edit -->
                        <div class="modal fade" id="edit<?= $value['id_ta']; ?>">
                            <div class="modal-dialog modal-sm">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title">Edit Ta</h4>
                                    </div>
                                    <div class="modal-body">

                                        <?php echo form_open('ta/edit/' . $value['id_ta']); ?>
                                        <div class="form-group">
                                            <label>Tahun Akademik</label>
                                            <input type="text" name="ta" class="form-control" required value="<?= $value['ta']; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Semester</label>
                                            <select name="semester" class="form-control" id="">
                                                <option value="">--Pilih Semester--</option>
                                                <option value="Ganjil" <?php echo $retVal = ($value['semester'] == "Ganjil") ? "selected" : ""; ?>>Ganjil</option>
                                                <option value="Genap" <?php echo $retVal = ($value['semester'] == "Genap") ? "selected" : ""; ?>>Genap</option>
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
                    foreach ($ta as $key => $value) { ?>
                        <!-- Modal hapus -->
                        <div class="modal fade" id="delete<?= $value['id_ta']; ?>">
                            <div class="modal-dialog ">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title">Hapus Ta</h4>
                                    </div>
                                    <div class="modal-body">
                                        Apakah anda ingin menghapus Ta <b><?= $value['ta']; ?></b> ?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Close</button>
                                        <a href="<?= base_url('ta/delete/' . $value['id_ta']); ?>" class="btn btn-success btn-flat">Hapus</a>
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