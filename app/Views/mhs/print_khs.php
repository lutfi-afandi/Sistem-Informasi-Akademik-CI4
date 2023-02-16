<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

    <title>KRS - <?= $mhs['nama_mhs']; ?> </title>
</head>

<!-- <body> -->

<body onload="window.print()">

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container">
                <div class="card">
                    <div class="card">
                        <center><img class="img mt-3 " style="width: 100px;" src="<?= base_url('assets/img/logo.png') ?>" align="middle">
                            <h2 class="font-weight-bolder">AKADEMI FARMASI CENDIKIA FARMA HUSADA</h2>
                            <h4 class="mb-0">
                                <?= $title;  ?><br>
                            </h4>
                            <p class="mb-0">Semester : <?= $ta_aktif['semester'] ?></p>
                            <p>Tahun Akademik : <?= $ta_aktif['ta'] ?></p>
                        </center>
                    </div>
                </div>

            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container">

                <div class="row">
                    <div class="col-sm-3">
                        <img src="<?= base_url('foto_mhs/' . $mhs['foto_mhs']); ?> " class="img img-thumbnail " alt="">
                    </div>

                    <div class="col-sm-9">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-sm">
                                        <tr>
                                            <th>Tahun Akademik</th>
                                            <th>:</th>
                                            <th><?= $ta_aktif['ta'] . " - " . $ta_aktif['semester'] ?></th>
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
                                            <td>Program Studi</td>
                                            <td>:</td>
                                            <td><?= $mhs['prodi']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Kelas</td>
                                            <td>:</td>
                                            <td><?= $mhs['nama_kelas']; ?>- <?= $mhs['tahun_angkatan']; ?></td>
                                        </tr>

                                    </table>
                                </div>

                            </div>
                        </div>

                    </div>


                    <div class="col-sm-12 mt-2">
                        <div class="card">
                            <div class="card-body">

                                <div class="table-responsive">
                                    <table class="table table-striped  table-bordered table-sm text-sm" id="example2">
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
                        </div>

                    </div>
                </div>

                <div class="row">
                    <!-- accepted payments column -->
                    <div class="col-sm-4 pl-5">


                    </div>

                    <!-- /.col -->
                    <div class="col-sm-4">

                    </div>
                    <!-- /.col -->
                    <div class="col-sm-4">
                        <p class="mb-0">Bandar Lampung, <?= date('d M Y'); ?></p>
                        <p class="mb-0">Dosen PA</p>
                        <br>
                        <br>
                        <br><br>
                        .......................
                    </div>
                    <!-- /.col -->
                </div>
            </div>

        </div>
    </div>
</body>

</html>