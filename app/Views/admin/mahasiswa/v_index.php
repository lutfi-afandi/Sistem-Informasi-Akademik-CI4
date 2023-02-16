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
                    <div class="card  card-solid">
                        <div class="card-header bg-gradient-maroon">
                            <h3 class="card-title">Data <?= $title; ?></h3>
                            <div class="card-tools pull-right">
                                <a href="<?= base_url('mahasiswa/add'); ?>" class="btn btn-success"><i class="fa fa-plus"></i> add</a>
                                <a href="<?= base_url('mahasiswa/reset_bayar'); ?>" class="btn btn-info"><i class="fa fa-history"></i> Reset Pembayaran</a>
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
                                    <thead class="bg-gradient-fuchsia">
                                        <tr>
                                            <th width="5%" class="text-center">No</th>
                                            <th width="5%">Foto</th>
                                            <th width="10%">NIM</th>
                                            <th>Nama Mahasiswa</th>
                                            <th>Program Studi</th>
                                            <th width="10%">Password</th>
                                            <th width="10%">Lunas?</th>
                                            <th width="15%" class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1;
                                        foreach ($mhs as $key => $value) { ?>
                                            <tr>
                                                <th class="text-center font-weight-bold"><?= $no++; ?></th>
                                                <td class="text-center">
                                                    <?php if ($value['foto_mhs'] == 'kosong') { ?>
                                                        <img src="<?= base_url('/gambar/default.png'); ?>" width="50px" height="50px" class="img-circle" src="" alt="">
                                                    <?php  } else { ?>
                                                        <img src="<?= base_url('/foto_mhs/' . $value['foto_mhs']); ?>" width="50px" height="50px" class="img-circle" src="" alt="">
                                                    <?php } ?>
                                                </td>
                                                <td><?= $value['nim']; ?></td>
                                                <td><?= $value['nama_mhs']; ?></td>
                                                <td><?= $value['jenjang']; ?> - <?= $value['prodi']; ?></td>
                                                <td>
                                                    <?= $value['password']; ?> <a type="button" data-toggle="modal" data-target="#pass<?php echo $value['id_mhs'] ?>" class=""><i class="fa fa-key text-blue"></i></a>
                                                </td>
                                                <td class="text-center">
                                                    <?php if ($value['pembayaran'] == '1') { ?>
                                                        <button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#modal-keterangan<?= $value['id_mhs']; ?>"><i class="fa fa-check text-sm"></i> </button>
                                                    <?php  } else { ?>
                                                        <button type="button" class="btn btn-danger  btn-xs" data-toggle="modal" data-target="#modal-keterangan<?= $value['id_mhs']; ?>"><i class="fa fa-times text-sm"></i></button>
                                                    <?php } ?>
                                                </td>
                                                <td class="text-center">
                                                    <button data-toggle="modal" data-target="#foto<?php echo $value['id_mhs'] ?>" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-image"></i></button>
                                                    <a href=" <?php echo base_url('mahasiswa/edit/' . $value['id_mhs']); ?>" class="btn btn-warning btn-sm btn-flat"><i class="fa fa-edit text-white"></i></a>
                                                    <button data-toggle="modal" data-target="#delete<?php echo $value['id_mhs'] ?>" class="btn btn-danger btn-sm btn-flat"><i class="fa fa-trash"></i></button>
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
                foreach ($mhs as $key => $value) {
                ?>
                    <!-- Modal hapus -->
                    <div class="modal fade" id="delete<?php echo $value['id_mhs']; ?>">
                        <div class="modal-dialog ">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Hapus Mahasiswa</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span></button>
                                </div>
                                <div class="modal-body">
                                    Apakah anda ingin menghapus Mahasiswa <b> <?php echo $value['nama_mhs']; ?> - (<?php echo $value['nim']; ?>)</b> ?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Close</button>
                                    <a href="<?php echo base_url('mahasiswa/delete/' . $value['id_mhs']); ?>" class="btn btn-success btn-flat">Hapus</a>
                                </div>
                            </div>
                            <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                    </div>
                    <!-- /.modal -->
                <?php } ?>

                <?php
                foreach ($mhs as $key => $value) {
                ?>
                    <!-- Modal hapus -->
                    <div class="modal fade" id="foto<?php echo $value['id_mhs']; ?>">
                        <div class="modal-dialog ">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Foto Baru</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span></button>
                                </div>
                                <form action="<?= base_url('mahasiswa/foto_update/' . $value['id_mhs']); ?>" method="post" enctype="multipart/form-data">
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="">Foto Baru</label>
                                            <input type="file" name="foto_mhs" class="form-control" accept="image/*">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-success pull-left">Update</button>
                                    </div>
                                </form>
                            </div>
                            <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                    </div>
                    <!-- /.modal -->
                <?php } ?>

                <!-- pasword reset -->
                <?php
                foreach ($mhs as $key => $value) {
                ?>
                    <!-- Modal hapus -->
                    <div class="modal fade" id="pass<?php echo $value['id_mhs']; ?>">
                        <div class="modal-dialog ">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Password Baru</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span></button>
                                </div>
                                <form action="<?= base_url('mahasiswa/password_update/' . $value['id_mhs']); ?>" method="post">
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="">Foto Baru</label>
                                            <input type="text" name="password" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-success pull-left">Update Password</button>
                                    </div>
                                </form>
                            </div>
                            <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                    </div>
                    <!-- /.modal -->
                <?php } ?>

                <!-- Modal pembayaran -->
                <?php
                foreach ($mhs as $key => $value) { ?>
                    <div class="modal fade" tabindex="1" id="modal-keterangan<?= $value['id_mhs']; ?>">
                        <div class="modal-dialog modal-dialog-centered ">
                            <div class="modal-content ">
                                <div class="modal-header bg-gradient-blue">
                                    <h4 class="modal-title  text-center">Pembayaran <?= $value['nama_mhs']; ?></h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span></button>
                                </div>
                                <div class="modal-body">
                                    <form action="<?= base_url('mahasiswa/pembayaran/' . $value['id_mhs']); ?>" method="post">
                                        <div class="form-group">
                                            <select name="pembayaran" id="" class="form-control">
                                                <option value="1" <?= ($value['pembayaran'] == '1') ? 'selected' : ''; ?>>Lunas</option>
                                                <option value="0" <?= ($value['pembayaran'] == '0') ? 'selected' : ''; ?>>Belum Lunas</option>
                                            </select>
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-block">Submit</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php }
                ?>

            </div>
        </div>
    </div>

</div>

<?= $this->include('template/js'); ?>
<?= $this->include('template/footer'); ?>