<?= $this->include('template/head'); ?>
<?= $this->include('template/header'); ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"> <?= $title; ?></h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container">

            <div class="row">
                <div class="col-sm-4">

                    <!-- Profile Image -->
                    <div class="card card-success">
                        <div class="card-body">
                            <div class="text-center mt-2">
                                <?php if ($mhs['foto_mhs'] == null) { ?>
                                    <img class=" m-auto" src="<?= base_url('gambar/default.png')  ?>" width="200px" alt="User profile picture">
                                    <center><a href="<?= base_url('mhs/profil_mhs'); ?>" class="btn  btn-default btn-xs btn-flat"> ubah profil</a></center>
                                <?php   } else { ?>
                                    <img class=" m-auto" src="<?= base_url('foto_mhs/' . $mhs['foto_mhs']); ?>" width="200px" alt="User profile picture">
                                <?php } ?>
                            </div>

                            <h4 class=" text-center"><b><?= $mhs['nim']; ?></b></h4>
                            <h3 class="profile-username text-center"><?= $mhs['nama_mhs']; ?></h3>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>

                <div class="col-sm-8">
                    <div class="card card-success">
                        <div class="card-header ">
                            <h3 class="card-title">Biodata Mahasiswa</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table class="table table-responsive">
                                <tbody>
                                    <tr>
                                        <th>Fakultas</th>
                                        <td>:</td>
                                        <td><?= $mhs['fakultas']; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Dosen PA</th>
                                        <td>:</td>
                                        <td><?= $mhs['nama_dosen']; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Kelas</th>
                                        <td>:</td>
                                        <td><?= $mhs['nama_kelas']; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Tahun Angkatan</th>
                                        <td>:</td>
                                        <td><?= $mhs['tahun_angkatan']; ?></td>
                                    </tr>
                                </tbody>

                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>

        </div>
    </div>
</div>
<?= $this->include('template/js'); ?>
<?= $this->include('template/footer'); ?>