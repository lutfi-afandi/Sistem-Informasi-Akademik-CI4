<?= $this->include('template/head'); ?>
<?= $this->include('template/header'); ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container">

        </div>
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container">

            <div class="row">
                <div class="col-sm-12">
                    <div class="card card-success card-solid">
                        <div class="card-header with-border">
                            <h3 class="card-title">Data <?= $title; ?></h3>
                            <div class="card-tools pull-right text-white">
                                <button class="btn btn-sm btn-success text-white" onclick="add_ruangan()"><i class="fa fa-plus"></i> Add</button>

                            </div>
                        </div>
                        <div class="card-body">

                            <?php
                            if (session()->getFlashdata('pesan')) { ?>
                                <div class="alert alert-success" role="alert">
                                    <?= session()->getFlashdata('pesan'); ?>
                                </div>
                            <?php } ?>
                            <table id="example1" class="table table-bordered table-sm table-striped">
                                <thead>
                                    <tr>
                                        <th width="50px" class="text-center">No</th>
                                        <th>Gedung</th>
                                        <th>Ruangan</th>
                                        <th width="150px" class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($ruangan as $key => $value) { ?>

                                        <tr>
                                            <td class="text-center"><?= $no++; ?></td>
                                            <td><?= $value['gedung']; ?></td>
                                            <td><?= $value['ruangan']; ?></td>
                                            <td class="text-center">

                                                <button class="btn btn-warning btn-sm btn-flat" onclick="edit_ruangan(<?php echo $value['id_ruangan']; ?>)"><i class="fa fa-edit text-white"></i></button>
                                                <button class="btn btn-danger btn-sm btn-flat" onclick="delete_ruangan(<?php echo $value['id_ruangan']; ?>)"><i class="fa fa-trash"></i></button>
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


<!-- Modal Form -->
<div class="modal fade" id="modal_form" role="dialog">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header bg-gradient-success">
                <h4 class="modal-title">Form Ruangan</h4>
                <button type="button" class="close" class="btn-tools" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
            </div>
            <form action="#" id="form">
                <div class="modal-body form">
                    <div class="form-group">
                        <input type="hidden" name="id_ruangan">
                        <label>Gedung</label>
                        <select name="id_gedung" id="" class="form-control" required>
                            <option value="">--Pilih Gedung--</option>
                            <?php foreach ($gedung as $key => $value) { ?>
                                <option value="<?= $value['id_gedung']; ?>"><?= $value['gedung']; ?></option>
                            <?php } ?>

                        </select>
                    </div>

                    <div class="form-group">
                        <label>Ruangan</label>
                        <input type="text" name="ruangan" class="form-control" required placeholder="Ruangan">
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" id="btnSave" onclick="save()" class="btn btn-success btn-flat">Simpan</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<?= $this->include('template/js'); ?>
<script type="text/javascript">
    var save_method; //for save method string
    var table;

    function add_ruangan() {
        save_method = 'add';
        $('#form')[0].reset(); // reset form on modals
        $('#modal_form').modal('show'); // show bootstrap modal
        //$('.modal-title').text('Add Person'); // Set Title to Bootstrap modal title
    }

    function edit_ruangan(id) {
        save_method = 'update';
        $('#form')[0].reset(); // reset form on modals
        <?php header('Content-type: application/json'); ?>
        //Ajax Load data from ajax
        $.ajax({
            url: "<?php echo base_url('ruangan/ajax_edit/') ?>/" + id,
            type: "GET",
            dataType: "JSON",
            success: function(data) {
                console.log(data);

                $('[name="id_ruangan"]').val(data.id_ruangan);
                $('[name="ruangan"]').val(data.ruangan);
                $('[name="id_gedung"]').val(data.id_gedung);

                $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
                $('.modal-title').text('Edit Ruangan'); // Set title to Bootstrap modal title

            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log(jqXHR);
                alert('Error get data from ajax');
            }
        });
    }

    function save() {
        var url;
        if (save_method == 'add') {
            url = "<?php echo base_url('ruangan/insert') ?>";
        } else {
            url = "<?php echo base_url('ruangan/update') ?>";
        }

        // ajax adding data to database
        $.ajax({
            url: url,
            type: "POST",
            data: $('#form').serialize(),
            dataType: "JSON",
            success: function(data) {
                //if success close modal and reload ajax table
                $('#modal_form').modal('hide');
                location.reload(); // for reload a page
            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert('Error adding / update data');
            }
        });
    }

    function delete_ruangan(id) {
        if (confirm('Anda yakin akan menghapus ruangan ini?')) {
            // ajax delete data from database
            $.ajax({
                url: "<?php echo base_url('ruangan/delete') ?>/" + id,
                type: "POST",
                dataType: "JSON",
                success: function(data) {
                    location.reload();
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    alert('Error deleting data');
                }
            });

        }
    }
</script>
<?= $this->include('template/footer'); ?>