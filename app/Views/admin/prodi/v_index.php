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
                                <button data-toggle="modal" data-target="#add" class="btn btn-success text-white"><i class="fa fa-plus text-white"></i> add</button>
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
                            <table id="example1" class="table table-bordered table-sm table-striped">
                                <thead>
                                    <tr>
                                        <th width="50px" class="text-center">No</th>
                                        <th>Fakultas</th>
                                        <th>Kode Prodi</th>
                                        <th>Program Studi</th>
                                        <th class="text-center">Jenjang</th>
                                        <th class="text-center">KA Prodi</th>
                                        <th width="150px" class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($prodi as $key => $value) { ?>

                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><b><?= $value['fakultas']; ?></b></td>
                                            <td><?= $value['kode_prodi']; ?></td>
                                            <td><?= $value['prodi']; ?></td>
                                            <td><?= $value['jenjang']; ?></td>
                                            <td><?= $value['ka_prodi']; ?></td>
                                            <td class="text-center">
                                                <button data-toggle="modal" data-target="#edit<?= $value['id_prodi']; ?>" class="btn btn-warning btn-sm btn-flat"><i class="fa fa-edit text-white"></i> </button>

                                                <a href="<?= base_url('prodi/delete/' . $value['id_prodi']); ?>" class=" btn btn-danger btn-sm btn-flat" onclick="return confirm('Apakah Anda ingin menghapus prodi Ini?')"><i class="fa fa-trash"></i></a>
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
    </div>

    <!-- Modal Tambah -->
    <div class="modal fade" id="add">
        <div class="modal-dialog ">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Tambah Prodi</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                </div>

                <form action="<?= base_url('prodi/insert'); ?>" method="post">
                    <div class="modal-body">

                        <div class="form-group">
                            <label>Fakultas</label>
                            <select name="fakultas" id="" class="form-control" required>
                                <option value="">--Pilih Fakultas--</option>
                                <?php foreach ($fakultas as $key => $value) { ?>
                                    <option value="<?= $value['id_fakultas']; ?>"><?= $value['fakultas']; ?></option>
                                <?php } ?>

                            </select>
                        </div>

                        <div class="form-group">
                            <label>Kode Prodi</label>
                            <input type="text" name="kode_prodi" class="form-control" placeholder="Kode Prodi">
                        </div>

                        <div class="form-group">
                            <label>Program Studi</label>
                            <input type="text" name="prodi" class="form-control" placeholder="Program Studi">
                        </div>

                        <div class="form-group">
                            <label>Jenjang</label>
                            <select name="jenjang" id="" class="form-control">
                                <option value="">-Pilih Jenjang-</option>
                                <option value="D3">D3</option>
                                <option value="D4">D4</option>
                                <option value="S1">S1</option>
                                <option value="S2">S2</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>KA Prodi</label>
                            <select name="ka_prodi" id="" class="form-control">
                                <option value="">-Pilih KA Prodi-</option>
                                <?php foreach ($dosen as $key => $value) { ?>
                                    <option value="<?= $value['nama_dosen']; ?>"><?= $value['nama_dosen']; ?></option>
                                <?php }; ?>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success btn-flat">Simpan</button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->

    <?php foreach ($prodi as $key => $row) { ?>
        <div class="modal fade" id="edit<?= $row['id_prodi']; ?>">
            <div class="modal-dialog ">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Edit Prodi</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                    </div>

                    <form action="<?= base_url('prodi/update/' . $row['id_prodi']); ?>" method="post">
                        <div class="modal-body">
                            <div class="form-group">
                                <label>Fakultas</label>
                                <select name="fakultas" id="" class="form-control" required>
                                    <?php foreach ($fakultas as $key => $value) { ?>
                                        <option value="<?php echo $value['id_fakultas'] ?>" <?php echo $retVal = ($value['id_fakultas'] == $row['id_fakultas']) ? "selected" : ""; ?>><?= $value['fakultas']; ?></option>
                                    <?php } ?>

                                </select>
                            </div>

                            <div class="form-group">
                                <label>Kode Prodi</label>
                                <input type="text" name="kode_prodi" class="form-control" readonly value="<?= $row['kode_prodi']; ?>">
                            </div>

                            <div class="form-group">
                                <label>Program Studi</label>
                                <input type="text" name="prodi" class="form-control" required value="<?= $row['prodi']; ?>">
                            </div>

                            <div class="form-group">
                                <label>Jenjang</label>
                                <select name="jenjang" id="" class="form-control">
                                    <option value="<?= $row['jenjang']; ?>"><?= $row['jenjang']; ?></option>
                                    <option value="D3">D3</option>
                                    <option value="D4">D4</option>
                                    <option value="S1">S1</option>
                                    <option value="S2">S2</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>KA Prodi</label>
                                <select name="ka_prodi" id="" class="form-control">
                                    <option value="">-Pilih KA Prodi-</option>
                                    <?php foreach ($dosen as $key => $value) { ?>
                                        <option value="<?= $value['nama_dosen']; ?>" <?php echo $retVal = ($value['nama_dosen'] == $row['ka_prodi']) ? "selected" : "";; ?>>
                                            <?= $value['nama_dosen']; ?>
                                        </option>
                                    <?php } ?>
                                </select>
                            </div>


                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success btn-flat">Simpan</button>
                        </div>
                    </form>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
    <?php } ?>




</div>

<?= $this->include('template/js'); ?>
<?= $this->include('template/footer'); ?>