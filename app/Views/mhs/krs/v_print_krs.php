<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Kartu Rencana Studi</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="<?= base_url(); ?>/template/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url(); ?>/template/bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="<?= base_url(); ?>/template/bower_components/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url(); ?>/template/dist/css/AdminLTE.min.css">

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body onload="window.print();">
    <div class="wrapper">
        <!-- Main content -->
        <section class="invoice">
            <!-- title row -->
            <div class="row">
                <div class="col-xs-12">
                    <h2 class="page-header">
                        <i class="fa fa-file-archive-o"></i> Kartu Rencana Studi
                        <small class="pull-right">Tanggal :<?= date('d M y'); ?></small>
                    </h2>
                </div>
                <!-- /.col -->
            </div>
            <!-- info row -->
            <div class="row invoice-info">

                <div class="col-sm-12">
                    <table class="table-striped table-responsive">
                        <tr>
                            <th class="ml-4" width="50px" rowspan="7"><img src="<?= base_url('foto_mhs/' . $mhs['foto_mhs']); ?> " class="img img-fluid ml-4" width="200px" alt=""></th>
                            <th width="150px">Tahun Akademik</th>
                            <th width="20px">:</th>
                            <th>Tahun Akademik : <?= $ta_aktif['ta'] . " - " . $ta_aktif['semester'] ?></th>
                            <th rowspan="7"></th>
                        </tr>
                        <tr>
                            <td>NIM</td>
                            <td>:</td>
                            <td><?= $mhs['nim']; ?></td>
                        </tr>
                        <tr>
                            <td>Nama</td>
                            <td>:</td>
                            <td><?= $mhs['nama_mhs']; ?></td>
                        </tr>
                        <tr>
                            <td>Fakultas</td>
                            <td>:</td>
                            <td><?= $mhs['fakultas']; ?></td>
                        </tr>
                        <tr>
                            <td>Program Studi</td>
                            <td>:</td>
                            <td><?= $mhs['prodi']; ?></td>
                        </tr>
                        <tr>
                            <td>Kelas</td>
                            <td>:</td>
                            <td><?= $mhs['nama_kelas']; ?>- <?= $mhs['tahun_angkatan']; ?></td>
                        </tr>
                        // <tr>
                        //     <td>Dosen PA</td>
                        //     <td>:</td>
                        //     <td></td>
                        // </tr>
                    </table>

                </div>
            </div>
            <!-- /.row -->

            <!-- Table row -->
            <div class="row">
                <div class="col-xs-12 table-responsive">
                    <table class="table table-striped table-responsive table-bordered" id="example2">
                        <tr class="label-success">
                            <th class="text-center">#</th>
                            <th class="text-center">Kode</th>
                            <th>Mata Kuliah</th>
                            <th class="text-center">SKS</th>
                            <th class="text-center">Kelas</th>
                            <th>Ruangan</th>
                            <th>Dosen</th>
                            <th>Waktu</th>
                        </tr>
                        <?php $no = 1;
                        $sks = 0;
                        foreach ($krs as $key => $value) {
                            $sks = $sks + $value['sks'];; ?>

                            <tr>
                                <td class="text-center"><?= $no++; ?></td>
                                <td class="text-center"><?= $value['kode_matkul']; ?></td>
                                <td><?= $value['matkul']; ?></td>
                                <td class="text-center"><?= $value['sks']; ?></td>
                                <td class="text-center"><?= $value['nama_kelas']; ?> - <?= $value['tahun_angkatan']; ?></td>
                                <td><?= $value['ruangan']; ?> - <?= $value['gedung']; ?></td>
                                <td><?= $value['nama_dosen']; ?></td>
                                <td><?= $value['hari']; ?> - <?= $value['waktu']; ?></td>

                            </tr>
                        <?php } ?>
                    </table>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->

            <div class="row">
                <!-- accepted payments column -->
                <div class="col-xs-4">
                    <h4><b>Jumlah SKS : <?= $sks; ?></b></h4>

                </div>

                <!-- /.col -->
                <div class="col-xs-4">
                    Mahasiswa
                    <br>
                    <br>
                    <br><br>
					<?= $mhs['nama_mhs']; ?>
                </div>
                <!-- /.col -->
                <div class="col-xs-4">
                    Bandar Lampung, <?= date('d M Y'); ?>
                    <br>
                    <br>
                    <br><br>
                       <strong>..............................</strong>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
    <!-- ./wrapper -->
</body>

</html>