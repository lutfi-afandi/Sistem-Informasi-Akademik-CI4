<?= $this->include('template/head'); ?>
<?= $this->include('template/header'); ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"> Daftar Mata Kuliah <?= $prodi['jenjang']; ?> <?= $prodi['prodi']; ?></h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('matkul'); ?>">Prodi</a></li>
                        <li class="breadcrumb-item active">Mata kuliah</li>
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
                    <div class="card card-success card-solid">
                        <div class="card-body">

                            <table class="table table-bordered">
                                <tr>
                                    <th width="150px">Program Studi</th>
                                    <td width="30px">:</td>
                                    <td><?= $prodi['prodi']; ?></td>
                                </tr>
                                <tr>
                                    <th>Jenjang</th>
                                    <td>:</td>
                                    <td><?= $prodi['jenjang']; ?></td>
                                </tr>
                                <tr>
                                    <th>Fakultas</th>
                                    <td>:</td>
                                    <td><?= $prodi['fakultas']; ?></td>
                                </tr>
                            </table>


                        </div>
                    </div>
                </div>


                <div class="col-sm-12">
                    <div class="card card-success card-solid">
                        <div class="card-header with-border">
                            <h3 class="card-title"> <?= $title; ?></h3>
                            <div class="card-tools pull-right">
                                <button type="button" data-target="#add" data-toggle="modal" class="btn btn-success"><i class="fa fa-plus"></i> add</button>
                            </div>
                        </div>
                        <div class="card-body">
                            <?php
                            $errors = session()->getFlashdata('errors');
                            if (!empty($errors)) { ?>
                                <div class="alert alert-danger" role="alert">
                                    <ul>
                                        <?php foreach ($errors as $key => $value) { ?>
                                            <li><?= esc($value); ?></li>
                                        <?php } ?>
                                    </ul>
                                </div>
                            <?php } ?>
                            <?php
                            if (session()->getFlashdata('pesan')) { ?>
                                <div class="alert alert-success" role="alert">
                                    <?= session()->getFlashdata('pesan'); ?>
                                </div>
                            <?php } ?>
                            <div class="btn btn-primary mb-2" type="button" data-target="#import" data-toggle="modal"><i class="fas fa-file-import"></i> import</div>
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th width="50px" class="text-center">No</th>
                                        <th>Kode Makul</th>
                                        <th>Mata Kuliah</th>
                                        <th>SKS</th>
                                        <th>Kategori</th>
                                        <th>Semester</th>
                                        <th width="50px" class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($matkul as $key => $value) { ?>
                                        <tr>
                                            <td class="text-center"><?= $no++; ?></td>
                                            <td class="text-center"><?= $value['kode_matkul']; ?></td>
                                            <td><?= $value['matkul']; ?></td>
                                            <td class="text-center"><?= $value['sks']; ?></td>
                                            <td class="text-center"><?= $value['kategori']; ?></td>
                                            <td class="text-center"><?= $value['smt']; ?> (<?= $value['semester']; ?>)</td>
                                            <td class="text-center">
                                                <button data-toggle="modal" data-target="#delete<?= $value['id_matkul']; ?>" class="btn btn-danger btn-sm btn-flat"><i class="fa fa-trash"></i></button>
                                            </td>
                                        </tr>
                                    <?php }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Modal Tambah -->
            <div class="modal fade" id="import">
                <div class="modal-dialog ">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Tambah <?= $title; ?></h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                        </div>
                        <div class="modal-body">
                            <?php echo form_open_multipart('matkul/import_matkul/' . $prodi['id_prodi']); ?>
                            <div class="form-group">
                                <label for="">File Excel</label>
                                <input type="file" name="fileexcel" class="form-control" id="file" required accept=".xls, .xlsx">
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success btn-flat">Simpan</button>
                        </div>
                        <?= form_close(); ?>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            <!-- /.modal -->
            <!-- Modal Tambah -->
            <div class="modal fade" id="add">
                <div class="modal-dialog ">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Tambah <?= $title; ?></h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                        </div>
                        <div class="modal-body">
                            <?php echo form_open('matkul/add/' . $prodi['id_prodi']); ?>
                            <div class="form-group">
                                <label>Kode</label>
                                <input type="text" name="kode_matkul" class="form-control" placeholder="Masukan Kode Matkul...">
                            </div>
                            <div class="form-group">
                                <label>Mata Kuliah</label>
                                <input type="text" name="matkul" class="form-control" placeholder="Masukan Nama Mata Kuliah...">
                            </div>
                            <div class="form-group">
                                <label>SKS</label>
                                <select name="sks" class="form-control" id="">
                                    <option value="">--Pilih SKS--</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Semester</label>
                                <select name="smt" class="form-control" id="">
                                    <option value="">--Pilih Semester--</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Kategori</label>
                                <select name="kategori" class="form-control" id="">
                                    <option value="">--Pilih Kategori--</option>
                                    <option value="Wajib">Wajib</option>
                                    <option value="Pilihan">Pilihan</option>
                                </select>
                            </div>





                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success btn-flat">Simpan</button>
                        </div>
                        <?= form_close(); ?>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            <!-- /.modal -->

            <?php
            foreach ($matkul as $key => $value) { ?>
                <!-- Modal hapus -->
                <div class="modal fade" id="delete<?= $value['id_matkul']; ?>">
                    <div class="modal-dialog ">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Hapus Gedung</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span></button>
                            </div>
                            <div class="modal-body">
                                Apakah anda ingin menghapus Gedung <b><?= $value['matkul']; ?></b> ?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Close</button>
                                <a href="<?= base_url('matkul/delete/' . $prodi['id_prodi'] . '/' . $value['id_matkul']); ?>" class="btn btn-success btn-flat">Hapus</a>
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

</div>







<?= $this->include('template/js'); ?>
<?= $this->include('template/footer'); ?>