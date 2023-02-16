<?= $this->include('template/head'); ?>
<?= $this->include('template/header'); ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container">
            <h4>Data Mata Kuliah Dari Prodi</h4>
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
                            <table class="table table-bordered table-sm table-striped">
                                <thead>
                                    <tr>
                                        <th width="50px" class="text-center">No</th>
                                        <th>Fakultas</th>
                                        <th>Kode Prodi</th>
                                        <th>Program Studi</th>
                                        <th>Jenjang</th>
                                        <th>Mata Kuliah</th>
                                        <th width="150px" class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $db = \Config\Database::connect();

                                    $no = 1;
                                    foreach ($prodi as $key => $value) { ?>
                                        <?php $jml = $db->table('tbl_matkul')->where('id_prodi', $value['id_prodi'])->countAllResults(); ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><b><?= $value['fakultas']; ?></b></td>
                                            <td><?= $value['kode_prodi']; ?></td>
                                            <td><?= $value['prodi']; ?></td>
                                            <td><?= $value['jenjang']; ?></td>
                                            <td class="text-center"><small class="badge badge-success"><?= $jml; ?></small></td>
                                            <td class="text-center">
                                                <a href="<?= base_url('matkul/detail/' . $value['id_prodi']); ?>" class="btn btn-warning btn-sm btn-flat"><i class="fa fa-plus"></i> Mata Kuliah</a>

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