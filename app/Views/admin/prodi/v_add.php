<section class="content-header">
    <h1>
        <?= $title; ?>
    </h1>
    <br>
</section>

<div class="row">
    <div class="col-sm-6">
        <div class="box box-success box-solid">
            <div class="box-header with-border">
                <h3 class="box-title"> <?= $title; ?></h3>
                <div class="box-tools pull-right">
                    <a href="<?= base_url('prodi'); ?>" class="btn btn-box-tool"><i class="fa fa-mail-reply"></i> back</a>
                </div>
            </div>
            <div class="box-body">

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
                    <div class="alert alert-warning" role="alert">
                        <?= session()->getFlashdata('pesan'); ?>
                    </div>
                <?php } ?>
                <?= form_open('prodi/insert'); ?>

                <div class="form-group">
                    <button type="submit" class="btn btn-success btn-flat">Simpan</button>
                </div>
                <div class="form-group">
                    <label>Fakultas</label>
                    <select name="fakultas" id="" class="form-control" required>
                        <option value="">--Pilih Fakultas--</option>
                        <?php foreach ($fakultas as $key => $value) { ?>
                            <option value="<?= $value['id_fakultas']; ?>"><?= $value['fakultas']; ?></option>
                        <?php } ?>

                    </select>
                </div>

                <div class="form-group">
                    <label>Kode Prodi</label>
                    <input type="text" name="kode_prodi" class="form-control" placeholder="Kode Prodi">
                </div>

                <div class="form-group">
                    <label>Program Studi</label>
                    <input type="text" name="prodi" class="form-control" placeholder="Program Studi">
                </div>

                <div class="form-group">
                    <label>Jenjang</label>
                    <select name="jenjang" id="" class="form-control">
                        <option value="">-Pilih Jenjang-</option>
                        <option value="D3">D3</option>
                        <option value="D4">D4</option>
                        <option value="S1">S1</option>
                        <option value="S2">S2</option>
                    </select>
                </div>


                <div class="form-group">
                    <label>KA Prodi</label>
                    <select name="ka_prodi" id="" class="form-control">
                        <option value="">-Pilih KA Prodi-</option>
                        <?php foreach ($dosen as $key => $value) { ?>
                            <option value="<?= $value['nama_dosen']; ?>"><?= $value['nama_dosen']; ?></option>
                        <?php }; ?>
                </div>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</div>