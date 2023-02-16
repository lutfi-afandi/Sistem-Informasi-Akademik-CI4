<?= $this->include('template/head'); ?>
<?= $this->include('template/header'); ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container">
            <div class="info-box">
                <span class="info-box-icon bg-info"><i class="fa fa-id-card"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">
                        <h3><?= $title;  ?></h3>
                    </span>
                    <span class="info-box-number mt-0">Tahun Akademik : <?= $ta_aktif['ta'] . " - " . $ta_aktif['semester'] ?></span>
                </div>
                <!-- /.info-box-content -->
            </div>
        </div>
    </div>

    <!-- Main content -->
    <div class="content">
        <div class="container">


            <div class="row">
                <div class="col-sm-12 ">
                    <div class="card">
                        <div class="card-body">
                            <?php
                            if (session()->getFlashdata('pesan')) { ?>
                                <div class="alert alert-success" role="alert">
                                    <?= session()->getFlashdata('pesan'); ?>
                                </div>
                            <?php } ?>
                            <div class="table-responsive">
                                <table class="table table-striped table-sm table-bordered" id="example2">
                                    <tr class="bg-gradient-success">
                                        <th rowspan="2" class="text-center">No</th>
                                        <th rowspan="2" class="text-center">Kode</th>
                                        <th rowspan="2" class="text-center">Mata Kuliah</th>
                                        <th colspan="16" class="text-center">Pertemuan</th>
                                    </tr>
                                    <tr class="bg-gradient-success">
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
                                    foreach ($krs as $key => $value) {
                                        $sks = $sks + $value['sks'];; ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><?= $value['kode_matkul']; ?></td>
                                            <td><?= $value['matkul']; ?></td>
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
                        </div>
                    </div>


                </div>
            </div>

        </div>
    </div>
</div>

<?= $this->include('template/js'); ?>
<?= $this->include('template/footer'); ?>