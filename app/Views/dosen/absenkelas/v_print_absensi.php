        <?= $this->include('template/head'); ?>

        <script>
            var css = '@page { size: 29.7cm 21cm ; }',
                head = document.head || document.getElementsByTagName('head')[0],
                style = document.createElement('style');

            style.type = 'text/css';
            style.media = 'print';

            if (style.styleSheet) {
                style.styleSheet.cssText = css;
            } else {
                style.appendChild(document.createTextNode(css));
            }

            head.appendChild(style);

            window.print();
        </script>

        <body onload="window.print();">

            <div class="wrapper">
                <!-- Main content -->
                <section class="invoice">
                    <!-- title row -->
                    <center>
                        <img class="img mt-3 " style="width: 50px;" src="http://localhost:8080/pmb_akfar/img/logo1.png" align="middle">
                        <h4 class="font-weight-bolder mb-0">AKADEMI FARMASI CENDIKIA FARMA HUSADA</h4>
                        <h5 class="mb-0">
                            DAFTAR HADIR

                    </center>
                    <!-- info row -->
                    <div class="row">

                        <div class="col-sm-6">
                            <table class="table table-sm">
                                <tr>
                                    <th>Program Studi</th>
                                    <td class="text-center" width="20px"> : </td>
                                    <td><?= $jadwal['prodi']; ?></td>
                                </tr>
                                <tr>
                                    <th>Kode Matkul</th>
                                    <td class="text-center" width="20px"> : </td>
                                    <td><?= $jadwal['kode_matkul']; ?></td>
                                </tr>
                                <tr>
                                    <th>Mata Kuliah</th>
                                    <td class="text-center" width="20px"> : </td>
                                    <td><?= $jadwal['matkul']; ?></td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-sm-6">
                            <table class="table table-sm">
                                <tr>
                                    <th>Dosen Pengampu</th>
                                    <td class="text-center" width="20px"> : </td>
                                    <td><?= $jadwal['nama_dosen']; ?></td>
                                </tr>
                                <tr>
                                    <th>Semester</th>
                                    <td class="text-center" width="20px"> : </td>
                                    <td><?= $ta['semester']; ?> </td>
                                </tr>
                                <tr>
                                    <th>Tahun Akademik</th>
                                    <td class="text-center" width="20px"> : </td>
                                    <td> <?= $ta['ta'] ?></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <!-- /.row -->
                    <br>
                    <!-- Table row -->
                    <div class="row">
                        <div class="col-sm-12">
                            <table class="table table-striped table-sm table-bordered" id="example2">
                                <tr class="label-success">
                                    <th style="vertical-align: middle;" rowspan="2" class="text-center">No</th>
                                    <th style="vertical-align: middle;" rowspan="2" class="text-center">NIM</th>
                                    <th style="vertical-align: middle;" rowspan="2" class="text-center">Mahasiswa</th>
                                    <th colspan="16" class="text-center">Pertemuan</th>
                                </tr>
                                <tr class="label-success">
                                    <th class="text-center">1</th>
                                    <th class="text-center">2</th>
                                    <th class="text-center">3</th>
                                    <th class="text-center">4</th>
                                    <th class="text-center">5</th>
                                    <th class="text-center">6</th>
                                    <th class="text-center">7</th>
                                    <th class="text-center">8</th>
                                    <th class="text-center">9</th>
                                    <th class="text-center">10</th>
                                    <th class="text-center">11</th>
                                    <th class="text-center">12</th>
                                    <th class="text-center">13</th>
                                    <th class="text-center">14</th>
                                    <th class="text-center">15</th>
                                    <th class="text-center">16</th>
                                </tr>
                                <?php $no = 1;
                                $sks = 0;
                                foreach ($mhs as $key => $value) { ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= $value['nim']; ?></td>
                                        <td><?= $value['nama_mhs']; ?></td>
                                        <td class="text-center">
                                            <?php if ($value['p1'] == 0) { ?>
                                                <i class="fa fa-times text-danger"></i>
                                            <?php } elseif ($value['p1'] == 1) { ?>
                                                <i class="fa fa-info text-warning"></i>
                                            <?php } elseif ($value['p1'] == 2) { ?>
                                                <i class="fa fa-check text-success"></i>
                                            <?php } ?>
                                        </td>
                                        <td class="text-center">
                                            <?php if ($value['p2'] == 0) { ?>
                                                <i class="fa fa-times text-danger"></i>
                                            <?php } elseif ($value['p2'] == 1) { ?>
                                                <i class="fa fa-info text-warning"></i>
                                            <?php } elseif ($value['p2'] == 2) { ?>
                                                <i class="fa fa-check text-success"></i>
                                            <?php } ?>
                                        </td>
                                        <td class="text-center">
                                            <?php if ($value['p3'] == 0) { ?>
                                                <i class="fa fa-times text-danger"></i>
                                            <?php } elseif ($value['p3'] == 1) { ?>
                                                <i class="fa fa-info text-warning"></i>
                                            <?php } elseif ($value['p3'] == 2) { ?>
                                                <i class="fa fa-check text-success"></i>
                                            <?php } ?>
                                        </td>
                                        <td class="text-center">
                                            <?php if ($value['p4'] == 0) { ?>
                                                <i class="fa fa-times text-danger"></i>
                                            <?php } elseif ($value['p4'] == 1) { ?>
                                                <i class="fa fa-info text-warning"></i>
                                            <?php } elseif ($value['p4'] == 2) { ?>
                                                <i class="fa fa-check text-success"></i>
                                            <?php } ?>
                                        </td>
                                        <td class="text-center">
                                            <?php if ($value['p5'] == 0) { ?>
                                                <i class="fa fa-times text-danger"></i>
                                            <?php } elseif ($value['p5'] == 1) { ?>
                                                <i class="fa fa-info text-warning"></i>
                                            <?php } elseif ($value['p5'] == 2) { ?>
                                                <i class="fa fa-check text-success"></i>
                                            <?php } ?>
                                        </td>
                                        <td class="text-center">
                                            <?php if ($value['p6'] == 0) { ?>
                                                <i class="fa fa-times text-danger"></i>
                                            <?php } elseif ($value['p6'] == 1) { ?>
                                                <i class="fa fa-info text-warning"></i>
                                            <?php } elseif ($value['p6'] == 2) { ?>
                                                <i class="fa fa-check text-success"></i>
                                            <?php } ?>
                                        </td>
                                        <td class="text-center">
                                            <?php if ($value['p7'] == 0) { ?>
                                                <i class="fa fa-times text-danger"></i>
                                            <?php } elseif ($value['p7'] == 1) { ?>
                                                <i class="fa fa-info text-warning"></i>
                                            <?php } elseif ($value['p7'] == 2) { ?>
                                                <i class="fa fa-check text-success"></i>
                                            <?php } ?>
                                        </td>
                                        <td class="text-center">
                                            <?php if ($value['p8'] == 0) { ?>
                                                <i class="fa fa-times text-danger"></i>
                                            <?php } elseif ($value['p8'] == 1) { ?>
                                                <i class="fa fa-info text-warning"></i>
                                            <?php } elseif ($value['p8'] == 2) { ?>
                                                <i class="fa fa-check text-success"></i>
                                            <?php } ?>
                                        </td>
                                        <td class="text-center">
                                            <?php if ($value['p9'] == 0) { ?>
                                                <i class="fa fa-times text-danger"></i>
                                            <?php } elseif ($value['p9'] == 1) { ?>
                                                <i class="fa fa-info text-warning"></i>
                                            <?php } elseif ($value['p9'] == 2) { ?>
                                                <i class="fa fa-check text-success"></i>
                                            <?php } ?>
                                        </td>
                                        <td class="text-center">
                                            <?php if ($value['p10'] == 0) { ?>
                                                <i class="fa fa-times text-danger"></i>
                                            <?php } elseif ($value['p10'] == 1) { ?>
                                                <i class="fa fa-info text-warning"></i>
                                            <?php } elseif ($value['p10'] == 2) { ?>
                                                <i class="fa fa-check text-success"></i>
                                            <?php } ?>
                                        </td>
                                        <td class="text-center">
                                            <?php if ($value['p11'] == 0) { ?>
                                                <i class="fa fa-times text-danger"></i>
                                            <?php } elseif ($value['p11'] == 1) { ?>
                                                <i class="fa fa-info text-warning"></i>
                                            <?php } elseif ($value['p11'] == 2) { ?>
                                                <i class="fa fa-check text-success"></i>
                                            <?php } ?>
                                        </td>
                                        <td class="text-center">
                                            <?php if ($value['p12'] == 0) { ?>
                                                <i class="fa fa-times text-danger"></i>
                                            <?php } elseif ($value['p12'] == 1) { ?>
                                                <i class="fa fa-info text-warning"></i>
                                            <?php } elseif ($value['p12'] == 2) { ?>
                                                <i class="fa fa-check text-success"></i>
                                            <?php } ?>
                                        </td>
                                        <td class="text-center">
                                            <?php if ($value['p13'] == 0) { ?>
                                                <i class="fa fa-times text-danger"></i>
                                            <?php } elseif ($value['p13'] == 1) { ?>
                                                <i class="fa fa-info text-warning"></i>
                                            <?php } elseif ($value['p13'] == 2) { ?>
                                                <i class="fa fa-check text-success"></i>
                                            <?php } ?>
                                        </td>
                                        <td class="text-center">
                                            <?php if ($value['p14'] == 0) { ?>
                                                <i class="fa fa-times text-danger"></i>
                                            <?php } elseif ($value['p14'] == 1) { ?>
                                                <i class="fa fa-info text-warning"></i>
                                            <?php } elseif ($value['p14'] == 2) { ?>
                                                <i class="fa fa-check text-success"></i>
                                            <?php } ?>
                                        </td>
                                        <td class="text-center">
                                            <?php if ($value['p15'] == 0) { ?>
                                                <i class="fa fa-times text-danger"></i>
                                            <?php } elseif ($value['p15'] == 1) { ?>
                                                <i class="fa fa-info text-warning"></i>
                                            <?php } elseif ($value['p15'] == 2) { ?>
                                                <i class="fa fa-check text-success"></i>
                                            <?php } ?>
                                        </td>
                                        <td class="text-center">
                                            <?php if ($value['p16'] == 0) { ?>
                                                <i class="fa fa-times text-danger"></i>
                                            <?php } elseif ($value['p16'] == 1) { ?>
                                                <i class="fa fa-info text-warning"></i>
                                            <?php } elseif ($value['p16'] == 2) { ?>
                                                <i class="fa fa-check text-success"></i>
                                            <?php } ?>
                                        </td>


                                    </tr>
                                <?php } ?>
                            </table>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->

                    <div class="row">
                        <!-- accepted payments column -->
                        <div class="col-sm-4">
                            <h4>
                            </h4>

                        </div>

                        <!-- /.col -->
                        <div class="col-sm-4">

                        </div>
                        <!-- /.col -->
                        <div class="col-sm-4">
                            Bandar Lampung, <?= date('d M Y'); ?>
                            <br>
                            <br>
                            <br><br>
                            <?= $jadwal['nama_dosen']; ?>
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