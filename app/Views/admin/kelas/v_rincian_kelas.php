<?= $this->include('template/head'); ?>
<?= $this->include('template/header'); ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container">

        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container">
            <div class="col-sm-12">
                <div class="card card-success card-solid">
                    <div class="card-header with-border">
                        <h3 class="card-title">Data <?= $title; ?></h3>
                        <div class="card-tools pull-right">
                            <button type="button" data-target="#add" data-toggle="modal" class="btn btn-success"><i class="fa fa-plus"></i> add</button>
                            <a href="<?= base_url('kelas'); ?>" class="btn btn-outline-danger "><i class="fa fa-arrow-left"></i> back</a>
                        </div>
                    </div>
                    <div class="card-body">

                        <table class="table">
                            <tr>
                                <th width="150px">Nama Kelas</th>
                                <th width="30px">:</th>
                                <td><?= $kelas['nama_kelas']; ?></td>
                                <th width="150px">Angkatan</th>
                                <th width="30px">:</th>
                                <td><?= $kelas['tahun_angkatan']; ?></td>
                            </tr>
                            <tr>
                                <th width="">Program Studi</th>
                                <th width="30px">:</th>
                                <td><?= $kelas['prodi']; ?></td>
                                <th width="">Jumlah</th>
                                <th width="30px">:</th>
                                <td><?= $jml; ?></td>
                            </tr>
                        </table>



                        <?php
                        if (session()->getFlashdata('pesan')) { ?>
                            <div class="alert alert-success" role="alert">
                                <?= session()->getFlashdata('pesan'); ?>
                            </div>
                        <?php } ?>

                        <table class="table table-bordered table-sm" id="example2" width="100%">
                            <tr class="bg-gradient-navy">
                                <th class="text-center" width="5%">NO</th>
                                <th class="" width="20%">NIM</th>
                                <th>Nama Mahasiswa</th>
                                <th class="text-center" width="10%">Aksi</th>
                            </tr>
                            <?php $no = 1;
                            foreach ($mhs as $key => $value) { ?>
                                <tr>
                                    <td class="text-center"><?= $no++; ?></td>
                                    <td><?= $value['nim']; ?></td>
                                    <td><?= $value['nama_mhs']; ?></td>
                                    <td class="text-center">
                                        <a href="<?= base_url('kelas/remove_anggota_kelas/' . $kelas['id_kelas'] . '/' . $value['id_mhs']); ?>" class="btn btn-danger btn-sm" onclick="confirm('mau hapus mahasiswa ini?')">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </table>


                    </div>
                </div>

                <!-- Modal Tambah -->
                <div class="modal fade" id="add">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Mahasiswa</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span></button>
                            </div>
                            <div class="modal-body">
                                <table class="table table-bordered table-striped table-sm" id="example1" style="width: 100%;">
                                    <thead class="bg-gradient-blue">
                                        <tr>
                                            <th style="width: 5%;">NO</th>
                                            <th>NIM</th>
                                            <th>Nama Mahasiswa</th>
                                            <th>Program Studi</th>
                                            <th style="width: 5%;">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1;
                                        foreach ($tanpa_kelas as $key => $value) { ?>
                                            <?php
                                            if ($kelas['id_prodi'] == $value['id_prodi']) { ?> <tr>
                                                    <td><?= $no++; ?></td>
                                                    <td><?= $value['nim']; ?></td>
                                                    <td><?= $value['nama_mhs']; ?></td>
                                                    <td><?= $value['prodi']; ?></td>
                                                    <td class="text-center">
                                                        <a href="<?= base_url('kelas/add_anggota_kelas/' . $kelas['id_kelas'] . '/' . $value['id_mhs']); ?>" class="btn btn-success btn-xs"><i class="fa fa-plus"></i></a>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                        <?php } ?>
                                    </tbody>
                                </table>


                            </div>

                            <?= form_close(); ?>
                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>
                <!-- /.modal -->
            </div>

        </div>
    </div>
</div>

<?= $this->include('template/js'); ?>
<?= $this->include('template/footer'); ?>