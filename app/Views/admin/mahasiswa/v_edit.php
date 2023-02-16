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
                                <a href="<?= base_url('mahasiswa'); ?>" class="btn btn-warning"><i class="fa fa-mail-reply"></i> back</a>
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


                            <?= form_open_multipart('mahasiswa/update/' . $mhs['id_mhs']); ?>
                            <div class="form-group">

                                <div class="form-group">
                                    <label>NIM</label>
                                    <input type="text" name="nim" class="form-control" value="<?= $mhs['nim']; ?>" readonly>
                                </div>


                                <div class="form-group">
                                    <label>Nama Mahasiswa</label>
                                    <input type="text" name="nama_mhs" class="form-control" value="<?= $mhs['nama_mhs']; ?>">
                                </div>

                                <div class="form-group">
                                    <label>Program Studi</label>
                                    <select class="form-control" name="id_prodi" id="">
                                        <?php foreach ($prodi as $key => $value) { ?>
                                            <option value="<?= $value['id_prodi']; ?>" <?php echo $retVal = ($mhs['id_prodi'] == $value['id_prodi']) ? "selected" : ""; ?>><?= $value['jenjang']; ?> - <?= $value['prodi']; ?></option>
                                        <?php } ?>
                                    </select>
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
    </div>
</div>
<?= $this->include('template/js'); ?>
<?= $this->include('template/footer'); ?>