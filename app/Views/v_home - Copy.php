<?= $this->include('template/head'); ?>
<?= $this->include('template/header'); ?>
<style>
    @media (min-width: 992px) {
        .content-wrapper {
            background-image: url("gambar/cover.png");
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            min-height: 680px;
            width: 100%;
            font-family: Arial, Helvetica, sans-serif;
        }

        h1,
        h3 {
            font-weight: bolder;
            color: aliceblue;
        }
    }

    @media (max-width: 992px) {
        .content-wrapper {
            background-image: url("gambar/cover2.png");
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            min-height: 350px;
            font-family: Arial, Helvetica, sans-serif;
        }

        h1,
        h3 {
            font-weight: bolder;
            color: aliceblue;
        }
    }
</style>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"> <strong>SISTEM INFORMASI AKADEMIK</strong> </h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item text-dark"><a href="#" class="text-dark">AKADEMI FARMASI CENDIKIA FARMA HUSADA</a></li>
                    </ol>
                </div>
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->

    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->

<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="<?= base_url(); ?>/assets/plugins/jquery/jquery.min.js"></script>
<script src="<?= base_url(); ?>/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url(); ?>/assets/dist/js/adminlte.min.js"></script>

<!-- DataTables  & Plugins -->
<script src="<?= base_url(); ?>/assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url(); ?>/assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url(); ?>/assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<!-- Select2 -->
<!-- Bootstrap 4 -->
<script src="<?= base_url(); ?>/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url(); ?>/assets/plugins/select2/js/select2.full.min.js"></script>


<?= $this->include('template/footer'); ?>