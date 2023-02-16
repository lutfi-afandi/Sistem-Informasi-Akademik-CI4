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
                <div class="col-sm-8">
                    <div class="card card-success card-solid">
                        <div class="card-header with-border">
                            <h3 class="card-title"> <?= $title; ?></h3>
                            <div class="card-tools pull-right">
                                <a href="<?= base_url('dosen'); ?>" class="btn btn-danger"><i class="fa fa-arrow-left"></i> back</a>
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
                                <div class="alert alert-warning" role="alert">
                                    <?= session()->getFlashdata('pesan'); ?>
                                </div>
                            <?php } ?>


                            <?= form_open_multipart('dosen/update/' . $dosen['id_dosen']); ?>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Kode Dosen</label>
                                        <input type="text" name="kode_dosen" class="form-control" value="<?= $dosen['kode_dosen']; ?>">
                                    </div>

                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>NIDN</label>
                                        <input type="text" name="nidn" class="form-control" value="<?= $dosen['nidn']; ?>">
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Nama Dosen</label>
                                        <input type="text" name="nama_dosen" class="form-control" value="<?= $dosen['nama_dosen']; ?>">
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Jenis Kelamin</label>
                                        <select name="jk_dosen" class="form-control" required>
                                            <option value="">-Pilih-</option>
                                            <option value="Laki-Laki" <?= ($dosen['jk_dosen'] == "Laki-Laki") ? "selected" : ""; ?>>Laki-Laki</option>
                                            <option value="Perempuan" <?= ($dosen['jk_dosen'] == "Perempuan") ? "selected" : ""; ?>>Perempuan</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Nomor Telepon</label>
                                        <input type="number" name="no_telp" class="form-control" value="<?= $dosen['no_telp']; ?>">
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Alamat</label>
                                        <textarea name="alamat_dosen" cols="10" rows="3" class="form-control"> <?= $dosen['alamat_dosen']; ?></textarea>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <img width="100px" height="100px" class="img-fluid " src="<?= base_url('foto_dosen/' . $dosen['foto_dsn']); ?>" alt="">
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Foto Dosen</label>
                                        <input type="file" id="preview_gambar" name="foto_dsn" class="form-control">
                                    </div>
                                </div>
                            </div>


                            <div class="modal-footer">
                                <button type="submit" class="btn btn-success btn-flat">Simpan</button>
                            </div>

                            <?php echo form_close(); ?>

                        </div>
                    </div>
                </div>

                </div>
    </div>

</div>

<?= $this->include('template/js'); ?>
<?= $this->include('template/footer'); ?>