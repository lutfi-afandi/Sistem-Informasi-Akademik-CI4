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
                        <center><img class="img mt-3 " style="width: 100px;" src="<?= base_url(); ?>/logo.png" align="middle">
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
                    <div class="col-sm-3 col-xs-3 col-xl-3">
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
                                <?php
                                if (session()->getFlashdata('pesan')) { ?>
                                    <div class="alert alert-success" role="alert">
                                        <?= session()->getFlashdata('pesan'); ?>
                                    </div>
                                <?php } ?>

                                <div class="table-responsive">
                                    <table class="table table-bordered table-sm" style="border: thick;">
                                        <thead class="bg-gradient-navy">
                                            <tr>
                                                <th>#</th>
                                                <th>Kode</th>
                                                <th>Mata Kuliah</th>
                                                <th>Kelas</th>
                                                <th>Dosen</th>
                                                <th class="text-center">SKS</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no = 1;
                                            $sks = 0;
                                            foreach ($krs as $key => $value) {
                                                $sks = $sks + $value['sks'];; ?>

                                                <tr>
                                                    <td><?= $no++; ?></td>
                                                    <td><?= $value['kode_matkul']; ?></td>
                                                    <td><?= $value['matkul']; ?></td>
                                                    <td><?= $value['nama_kelas']; ?> - <?= $value['tahun_angkatan']; ?></td>
                                                    <td><?= $value['nama_dosen']; ?></td>
                                                    <td class="text-center"><?= $value['sks']; ?></td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <td class="text-center" colspan="6"><b>Jumlah SKS</b></td>
                                                <td class="text-center"> <b><?= $sks; ?></b></td>
                                            </tr>
                                        </tfoot>

                                    </table>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>

                <div class="row">
                    <!-- accepted payments column -->
                    <div class="col-sm-4 pl-5">
                        <br>
                        Mahasiswa
                        <br>
                        <br>
                        <br>
                        <br><br>
                        <strong><?= $mhs['nama_mhs']; ?></strong>

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
                        <strong>..............................</strong>
                    </div>
                    <!-- /.col -->
                </div>
            </div>

        </div>
    </div>
</body>

</html>