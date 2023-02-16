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

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

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
                        <tr>
                            <td>Dosen PA</td>
                            <td>:</td>
                            <td><?= $mhs['nama_dosen']; ?></td>
                        </tr>
                    </table>

                </div>
                <div class="col-sm-12">
                    <br>
                </div>
                <div class="col-sm-12 ">
                    <?php
                    if (session()->getFlashdata('pesan')) { ?>
                        <div class="alert alert-success" role="alert">
                            <?= session()->getFlashdata('pesan'); ?>
                        </div>
                    <?php } ?>
                    <table class="table table-striped table-responsive table-bordered" id="example2">
                        <tr class="label-success">
                            <th>#</th>
                            <th>Kode</th>
                            <th>Mata Kuliah</th>
                            <th>SKS</th>
                            <th>SMT</th>
                            <th>Nilai</th>
                            <th>Bobot</th>
                        </tr>
                        <?php $no = 1;
                        $sks = 0;
                        $grand_total_bobot = 0;
                        foreach ($krs as $key => $value) {
                            $sks = $sks + $value['sks'];
                            $total_bobot = $value['sks'] * $value['bobot'];
                            $grand_total_bobot = $grand_total_bobot + $total_bobot;
                        ?>

                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $value['kode_matkul']; ?></td>
                                <td><?= $value['matkul']; ?></td>
                                <td><?= $value['sks']; ?></td>
                                <td><?= $value['smt']; ?></td>
                                <td><?= $value['nilai_huruf']; ?></td>
                                <td><?= $value['bobot']; ?></td>
                            </tr>
                        <?php } ?>
                        <tr>
                            <td colspan="7"></td>
                        </tr>
                        <tr>
                            <th colspan="6">
                                <b>Jumlah SKS</b>
                            </th>
                            <td><b><?= $sks; ?></b></td>
                        </tr>
                        <tr>
                            <th colspan="6">IP</th>
                            <td><b><?php if (empty($krs)) {
                                        echo "0";
                                    } else {
                                        echo number_format($grand_total_bobot / $sks, 2);
                                    } ?></b>
                            </td>
                        </tr>
                    </table>

                </div>
            </div>

            <div class="row">
                <!-- accepted payments column -->
                <div class="col-xs-4">

                </div>

                <!-- /.col -->
                <div class="col-xs-4">

                </div>
                <!-- /.col -->
                <div class="col-xs-4">
                    Bandar Lampung, <?= date('d M Y'); ?>
                    <br>
                    <br>
                    <br><br>
                    <?= $mhs['nama_dosen']; ?>
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