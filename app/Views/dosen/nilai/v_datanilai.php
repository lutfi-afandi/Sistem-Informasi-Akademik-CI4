<?= $this->include('template/head'); ?>
<?= $this->include('template/header'); ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"><?= $title;  ?> : <?= $jadwal['matkul']; ?> - <?= $jadwal['nama_kelas']; ?></h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#"><a href="<?= base_url('dsn/NilaiMahasiswa'); ?>"><i class="fa fa-edit"></i> Nilai Mahasiswa</a></a></li>
                        <li class="breadcrumb-item active"><a href="#">Nilai</a></li>
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

                        <table class="table  table-sm ">

                            <tr>
                                <th>Program Studi</th>
                                <td class="text-center" width="20px"> : </td>
                                <td><?= $jadwal['prodi']; ?></td>
                            </tr>
                            <tr>
                                <th>Fakultas</th>
                                <td class="text-center" width="20px"> : </td>
                                <td><?= $jadwal['fakultas']; ?></td>
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
                            <tr>
                                <th>Jadwal</th>
                                <td class="text-center" width="20px"> : </td>
                                <td><?= $jadwal['hari']; ?> - <?= $jadwal['waktu']; ?></td>
                            </tr>
                            <tr>
                                <th>Dosen Pengampu</th>
                                <td class="text-center" width="20px"> : </td>
                                <td><?= $jadwal['nama_dosen']; ?></td>
                            </tr>
                        </table>
                    </div>

                </div>

                <div class="col-sm-12">
                    <a target="_blank" href="<?= base_url('dsn/print_nilai/' . $jadwal['id_jadwal']); ?>" class="btn btn-sm btn-flat btn-primary mb-2"><i class="fa fa-print"></i> Cetak Nilai</a>
                    <a class="btn btn-sm btn-flat btn-info mb-2" id="edit"><i class="fa fa-pen"></i> edit</a>
                </div>


            </div>
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
                            <?= form_open('dsn/SimpanNilai/' . $jadwal['id_jadwal']); ?>
                            <table class="table table-striped table-sm  table-bordered" id="example2" width="100%">
                                <thead>
                                    <tr class="bg-gradient-success">
                                        <th class="text-center">No</th>
                                        <th class="text-center">NIM</th>
                                        <th class="text-center" width="70%">Mahasiswa</th>
                                        <th class=" text-center">Nilai Akhir</th>
                                        <th class="text-center">Huruf Mutu</th>
                                    </tr>

                                </thead>

                                <?php $no = 1; $no_h = 1;$no_a = 1;
                                $sks = 0;
                                foreach ($mhs as $key => $value) { ?>

                                <tr>
                                    <td class="text-center"><?= $no++; ?></td>
                                    <td><?= $value['nim']; ?></td>
                                    <td><?= $value['nama_mhs']; ?></td>

                                    <td class="text-center">
                                        <input type="hidden" name="<?= $value['id_krs']; ?>id_krs" value="<?= $value['id_krs']; ?>">
                                        <input type="number" name="<?= $value['id_krs']; ?>nilai_akhir" id="<?= $no_a++; ?>nilai_akhir" class="form-control" onkeyup="putan()" value="<?= $value['nilai_akhir']; ?>" readonly>
                                    </td>
                                    <td class="text-center">
                                        <input type="text" name="<?= $value['id_krs']; ?>nilai_huruf" id="<?= $no_h++; ?>nilai_huruf" class="form-control" value="<?= $value['nilai_huruf']; ?>" readonly>
                                    </td>

                                </tr>
                                <?php } ?>
                            </table>
                            <button class="btn btn-success btn-flat"><i class="fa fa-save"></i> Simpan Nilai</button>
                            <?= form_close(); ?>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>
</div>

<?= $this->include('template/js'); ?>
<script>
    $("#edit").click(function () {
        $('.form-control').removeAttr('readonly');
        $('.form-control').prop('disabled', false);
    });
    const jumlah_mhs = '<?= $total_mhs; ?>';
    // console.log(jumlah_mhs);
</script>

<script>
    function putan() {
        for (i = 1; i <= jumlah_mhs; i++) {
            const id_angka = document.getElementById(i + "nilai_akhir");
            const id_huruf = document.getElementById(i + "nilai_huruf");
            const val_angka = id_angka.value;
            const val_huruf = id_huruf.value;

            if (val_angka > 74 && val_angka <= 100) {
                id_huruf.value = 'A';
            } else if (val_angka > 60 && val_angka <= 75) {
                id_huruf.value = 'B';
            } else if (val_angka > 44 && val_angka <= 60) {
                id_huruf.value = 'C';
            } else if (val_angka > 30 && val_angka <= 44) {
                id_huruf.value = 'D';
            } else if (val_angka >= 0 && val_angka <= 30) {
                id_huruf.value = 'E';
            } else {
                id_huruf.value = '';
            }
        }

    }
</script>
<?= $this->include('template/footer'); ?>