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
                    <a href="<?= base_url('ruangan'); ?>" class="btn btn-box-tool"><i class="fa fa-mail-reply"></i> back</a>
                </div>
            </div>
            <div class="box-body">
                <?= form_open('ruangan/insert'); ?>
                <div class="form-group">
                    <label>Gedung</label>
                    <select name="gedung" id="" class="form-control" required>
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

                <div class="modal-footer">
                    <button type="submit" class="btn btn-success btn-flat">Simpan</button>
                </div>

                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</div>