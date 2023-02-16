<?= $this->include('template/head'); ?>
<?= $this->include('template/header'); ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"> Dashboard Dosen</small></h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                        <li class="breadcrumb-item active"><?= $dosen['nama_dosen']; ?></li>
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
                <div class="col-md-4">

                    <div class="card card-success">
                        <div class="card-body">
                            <div class="text-center mt-2">
                                <img class="img img-thumbnail m-auto" src="<?= base_url('foto_dsn/' .  $dosen['foto_dsn']) ?>" alt="User profile picture">
                            </div>

                            <h4 class=" text-center"><b><?= $dosen['nidn']; ?></b></h4>
                            <h3 class="profile-username text-center"><?= $dosen['nama_dosen']; ?></h3>
                        </div>

                        <a target="_blank" href="http://absensi.akfarcefada.ac.id/dosen/dashboard" class="btn btn-primary btn-block btn-flat mt-2"><i class="fa fa-list"></i> LINK PRESENSI DOSEN</a>
                    </div>
                </div>

                <div class="col-md-8">
                    <div class="card card-success">
                        <div class="card-header ">
                            <h3 class="card-title">Biodata Mahasiswa</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table class="table table-striped table-sm">
                                <tr>
                                    <th>Tahun Akademik</th>
                                    <td>:</td>
                                    <td><?= $ta['ta']; ?> - <?= $ta['semester']; ?></td>
                                </tr>
                                <tr>
                                    <th>Kode Dosen</th>
                                    <td>:</td>
                                    <td><?= $dosen['kode_dosen']; ?></td>
                                </tr>
                                <tr>
                                    <th>NIDN</th>
                                    <td>:</td>
                                    <td><?= $dosen['nidn']; ?></td>
                                </tr>
                                <tr>
                                    <th>Nomor Telepon</th>
                                    <td>:</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th>E-Mail</th>
                                    <td>:</td>
                                    <td></td>
                                </tr>
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