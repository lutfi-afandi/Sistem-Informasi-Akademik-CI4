<?= $this->include('template/head'); ?>
<?= $this->include('template/header'); ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container">
            <h1>
                <?= $title; ?> Tahun Akademik : <?= $ta_aktif['ta']; ?>-<?= $ta_aktif['semester']; ?>
            </h1>
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container">


            <div class="row">
                <div class="col-sm-12">
                    <div class="card card-success card-solid">

                        <div class="card-body">

                            <?php
                            if (session()->getFlashdata('pesan')) { ?>
                                <div class="alert alert-success" role="alert">
                                    <?= session()->getFlashdata('pesan'); ?>
                                </div>
                            <?php } ?>
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th width="50px" class="text-center">No</th>
                                        <th class="text-center">Fakultas</th>
                                        <th class="text-center">Kode Prodi</th>
                                        <th class="text-center">Program Studi</th>
                                        <th class="text-center">Jenjang</th>
                                        <th class="text-center">Jadwal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($prodi as $key => $value) { ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><?= $value['fakultas']; ?></td>
                                            <td><?= $value['kode_prodi']; ?></td>
                                            <td><?= $value['prodi']; ?></td>
                                            <td><?= $value['jenjang']; ?></td>
                                            <td class="text-center">
                                                <a href="<?= base_url('JadwalKuliah/detailjadwal/' . $value['id_prodi']); ?>" class="btn btn-success btn-flat btn-sm"><i class="fa fa-calendar"></i></a>
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
</div>
<?= $this->include('template/js'); ?>
<?= $this->include('template/footer'); ?>