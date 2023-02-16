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
                </div>
                <!-- /.info-box-content -->
            </div>
        </div>
    </div>

    <!-- Main content -->
    <div class="content">
        <div class="container">


            <div class="row">
                <div class="col-sm-12 ">
                    <div class="card card-outline card-navy">
                        <div class="card-body">
                            <iframe class="" src="<?= $layananni['link']; ?>" frameborder="0" height="600px" width="100%"></iframe>
                        </div>
                    </div>


                </div>
            </div>

        </div>
    </div>
</div>

<?= $this->include('template/js'); ?>
<?= $this->include('template/footer'); ?>