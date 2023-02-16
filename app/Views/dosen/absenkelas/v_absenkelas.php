<?= $this->include('template/head'); ?>
<?= $this->include('template/header'); ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">  <?= $title;  ?> : <?= session()->get('nama_dosen'); ?></h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Semester : <?= $ta['semester']; ?> - <?= $ta['ta']; ?></a>
                        </li>
                        <select id="select-ta" class="js-example-basic-single form-control">
                                <option hidden><?= $ta['semester']; ?> - <?= $ta['ta']; ?> </option>
                                <?php foreach ($tas as $key => $data) { ?>
                                <option value="<?= $data['id_ta']; ?>" <?= ($data['id_ta'] == $fil_ta) ? 'selected' : ''; ?>><?= $data['ta']; ?> - <?= $data['semester']; ?></option>
                                <?php } ?>
                        </select>
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
                                <table class="table table-striped table-sm table-bordered ">
                                    <tr class="bg-gradient-success">
                                        <th>No</th>
                                        <th>Kode</th>
                                        <th>Hari</th>
                                        <th>Mata Kuliah</th>
                                        <th>SKS</th>
                                        <th>Kelas</th>
                                        <th>Absensi</th>
                                    </tr>
                                    <?php $no = 1;
                                    foreach ($jadwal as $key => $value) { ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><?= $value['kode_matkul']; ?></td>
                                            <td><?= $value['hari']; ?> - <?= $value['waktu']; ?></td>
                                            <td><?= $value['matkul']; ?></td>
                                            <td><?= $value['sks']; ?></td>
                                            <td><?= $value['nama_kelas']; ?> - <?= $value['tahun_angkatan']; ?></td>
                                            <td class="text-center">
                                                <a href="<?= base_url('dsn/absensi/' . $value['id_jadwal']); ?>" class="btn btn-success btn-flat btn-sm"><i class="fa fa-calendar"></i> Absensi</a>
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
<script>
    $(document).on('change', '#select-ta', function () {

        var dokumen = $(this).val();
        window.location.href = "?id=" + dokumen;
    });
</script>
<?= $this->include('template/footer'); ?>