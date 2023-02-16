<?= $this->include('template/head'); ?>
<?= $this->include('template/header'); ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"> <?= $title;  ?> : <b><?= session()->get('nama_dosen'); ?></b><br></h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Semester : <?= $ta['semester']; ?> - <?= $ta['ta']; ?></a></li>
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
                <div class="col-sm-12">
                   <div class="card">
                    <div class="card-body">

                        <div class="table-responsive">

                            <table class="table table-striped table-bordered table-sm">
                                <tr class="bg-gradient-success">
                                    <th>No</th>
                                    <th>Program Studi</th>
                                    <th>Hari</th>
                                    <th>Mata Kuliah</th>
                                    <th>SKS</th>
                                    <th>Kelas</th>
                                    <th>Ruangan</th>
                                </tr>
                                <?php $no = 1;
                                foreach ($jadwal as $key => $value) { ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= $value['prodi']; ?></td>
                                        <td><?= $value['hari']; ?> - <?= $value['waktu']; ?></td>
                                        <td><?= $value['matkul']; ?></td>
                                        <td><?= $value['sks']; ?></td>
                                        <td><?= $value['nama_kelas']; ?> - <?= $value['tahun_angkatan']; ?></td>
                                        <td><?= $value['ruangan']; ?></td>
                                    </tr>
                                <?php } ?>
                            </table>
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