<?= $this->include('template/head'); ?>
<?= $this->include('template/header'); ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"><?= $title;  ?> : <b><?= session()->get('nama_user'); ?></b></h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <select id="select-ta" class="js-example-basic-single form-control">
                            <option hidden><?= $ta_aktif['semester']; ?> - <?= $ta_aktif['ta']; ?> </option>
                            <?php foreach ($tas as $key => $data) { ?>
                                <option value="<?= $data['id_ta']; ?>" <?= ($data['id_ta'] == $fil_ta) ? 'selected' : ''; ?>><?= $data['ta']; ?> - <?= $data['semester']; ?></option>
                            <?php } ?>
                        </select>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div>
    </div>

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
                    <?php if ($mhs['pembayaran'] != 0) { ?>
                        <a target="_blank" href="<?= base_url('mhs/print_khs'); ?>/<?= isset($_GET['id']) ? $_GET['id'] : ''; ?>" class="btn btn-xs btn-flat btn-success"><i class="fa fa-print"></i> Cetak KHS</a>

                    <?php } else { ?>
                        <div class="callout callout-danger">
                            <h5><i class="fas fa-bullhorn"></i> Perhatian</h5>
                            <p>Mohon Maaf, Silahkan melakukan Pembayaran untuk bisa Melihat dan Mencetak KHS.<br> Silahkan menghubungi bagian keuangan.</p>
                        </div>
                    <?php } ?>
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
                                <table class="table table-sm table-bordered">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Kode</th>
                                            <th>Mata Kuliah</th>
                                            <th>SKS</th>
                                            <th>SMT</th>
                                            <th>Nilai</th>
                                            <th>Bobot</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php
                                        $no = 1;
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
                                                <td><?= ($mhs['pembayaran'] != 0) ? $value['nilai_huruf'] : ''; ?></td>
                                                <td><?= ($mhs['pembayaran'] != 0) ? $value['bobot'] : ''; ?></td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                    <tfoot>
                                        <?php if ($mhs['pembayaran'] == 0) { ?>

                                        <?php } else { ?>
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

                                        <?php } ?>
                                    </tfoot>
                                </table>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>




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
                            <a href="<?= base_url('krs/delete/' . $value['id_krs']); ?>" class="btn btn-success btn-flat">Hapus</a>
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