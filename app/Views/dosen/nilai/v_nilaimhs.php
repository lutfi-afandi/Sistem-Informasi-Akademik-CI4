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
                                <table class="table table-sm table-striped ">
                                    <thead>
                                        <tr class="bg-gradient-success">
                                            <th class="text-center">No</th>
                                            <th class="text-center">Kode</th>
                                            <th class="text-center">Mata Kuliah</th>
                                            <th class="text-center">SKS</th>
                                            <th class="text-center">Kelas</th>
                                            <th class="text-center">Nilai</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1;
                                 foreach ($jadwal as $key => $value) { ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><?= $value['kode_matkul']; ?></td>
                                            <td><?= $value['matkul']; ?></td>
                                            <td><?= $value['sks']; ?></td>
                                            <td><?= $value['nama_kelas']; ?> - <?= $value['tahun_angkatan']; ?></td>
                                            <td class="text-center">
                                                <a href="<?= base_url('dsn/DataNilai/' . $value['id_jadwal']); ?>" class="btn btn-success btn-flat btn-sm"><i class="fa fa-edit"></i> Nilai</a>
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
    </div>
</div>

<?= $this->include('template/js') ; ?>
<script>
    $(document).on('change', '#select-ta', function () {

        var dokumen = $(this).val();
        window.location.href = "?id=" + dokumen;
    });
</script>
<?= $this->include('template/footer') ; ?>