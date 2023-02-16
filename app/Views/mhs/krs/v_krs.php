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
                    <div class="row">
                        <span class="info-box-number mt-0 ml-2">Tahun Akademik : </span>
                        <div class="col-sm-3">
                            <select id="select-ta" class="js-example-basic-single form-control">
                                <option value>Pilih Tahun Akademik </option>
                                <?php foreach ($ta as $key => $data) { ?>
                                    <option value="<?= $data['id_ta']; ?>" <?= ($data['id_ta'] == $fil_ta) ? 'selected' : ''; ?>><?= $data['ta']; ?> - <?= $data['semester']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-sm-3">
                            <a href="<?= base_url('krs'); ?>" class="btn btn-info"><i class="fa fa-history"></i></a>
                        </div>
                    </div>

                </div>
                <!-- /.info-box-content -->
            </div>
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container">

            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary collapsed-card">
                        <div class="card-header">
                            <h3 class="card-title"><?= $mhs['nama_mhs']; ?></h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
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
                                                    <tr>
                                                        <td>Dosen PA</td>
                                                        <td>:</td>
                                                        <td><?= $mhs['nama_dosen']; ?></td>
                                                    </tr>
                                                </table>
                                            </div>

                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>




                <div class="col-sm-12 mt-2">
                    <button class="btn btn-xs btn-flat btn-primary " data-toggle="modal" data-target="#add"><i class="fa fa-plus"></i> Tambah Mata Kuliah</button>
                    <a target="_blank" href="<?= base_url('krs/print'); ?>/<?= isset($_GET['id']) ? $_GET['id'] : ''; ?>" class="btn btn-xs btn-flat btn-success"><i class="fa fa-print"></i> Cetak KRS</a>
                    <a href="<?= base_url('mhs/khs'); ?>" class="btn btn-xs btn-flat btn-warning mr-auto text-white"><i class="fa fa-arrow-right text-white"></i> Kartu Hasil Studi</a>
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
                                <table class="table table-bordered table-sm">
                                    <thead class="bg-gradient-navy">
                                        <tr>
                                            <th>#</th>
                                            <th>Kode</th>
                                            <th>Mata Kuliah</th>
                                            <th>SKS</th>
                                            <th>SMT</th>
                                            <th>Kelas</th>
                                            <th>Ruangan</th>
                                            <th>Dosen</th>
                                            <th>Waktu</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-nowrap">
                                        <?php $no = 1;
                                        $sks = 0;
                                        foreach ($krs as $key => $value) {
                                            $sks = $sks + $value['sks'];; ?>

                                            <tr>
                                                <td><?= $no++; ?></td>
                                                <td><?= $value['kode_matkul']; ?></td>
                                                <td><?= $value['matkul']; ?></td>
                                                <td><?= $value['sks']; ?></td>
                                                <td><?= $value['smt']; ?></td>
                                                <td><?= $value['nama_kelas']; ?> - <?= $value['tahun_angkatan']; ?></td>
                                                <td><?= $value['ruangan']; ?> - <?= $value['gedung']; ?></td>
                                                <td><?= $value['nama_dosen']; ?></td>
                                                <td>
                                                    <?= $value['hari']; ?>
                                                </td>
                                                <td class="text-center">
                                                    <button class="btn btn-danger btn-flat btn-xs" data-toggle="modal" data-target="#delete<?= $value['id_krs']; ?>"><i class="fa fa-trash"></i></button>
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

        <!-- Modal Tambah Makul -->
        <div class="modal fade" id="add">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header pt-1 pb-1 bg-gradient-blue">
                        <h4 class="modal-title">Mata Kuliah Yang Ditawarkan</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <?php if ($mhs['pembayaran'] == '1') { ?>
                            <?= $this->include('mhs/krs/tambah_makul'); ?>
                        <?php } else { ?>
                            <center>
                                <i class="fas fa-times-circle fa-4x text-danger"></i>
                                <h3>MOHON MAAF ANDA BELUM MENYELESAIKAN PEMBAYARAN</h3>
                                <H5>HARAP SEGERA MENGURUS UNTUK DAPAT MENGINPUTKAN KRS</H5>
                                <a target="_blank" href="https://api.whatsapp.com/send/?phone=6289658195665&text&app_absent=0" class="btn btn-success "><i class="fab fa-whatsapp"></i> | ADMINISTRASI</a>
                            </center>
                        <?php }  ?>


                    </div>

                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->


        <?php
        foreach ($krs as $key => $value) { ?>
            <!-- Modal hapus -->
            <div class="modal fade" id="delete<?= $value['id_krs']; ?>">
                <div class="modal-dialog ">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Hapus Mata Kuliah</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                        </div>
                        <div class="modal-body">
                            Apakah anda ingin menghapus Matakuliah <b><?= $value['matkul']; ?></b> ?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Close</button>
                            <a href="<?= base_url('krs/delete/' . $value['id_krs']); ?>/<?= isset($_GET['id']) ? $_GET['id'] : ''; ?>" class="btn btn-success btn-flat">Hapus</a>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            <!-- /.modal -->
        <?php }
        ?>
    </div>
</div>
<?= $this->include('template/js'); ?>
<script>
    $(document).on('change', '#select-ta', function() {

        var dokumen = $(this).val();
        window.location.href = "?id=" + dokumen;
    });
</script>
<?= $this->include('template/footer'); ?>