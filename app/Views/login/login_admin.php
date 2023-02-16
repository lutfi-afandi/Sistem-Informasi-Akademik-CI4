<?= $this->include('template/head'); ?>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo ">
            <a href="#" class="text-uppercase"><b><?= $title; ?></a>
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Silahkan Login</p>

                <form action="<?= base_url(); ?>/auth/cek_admin" method="post">
                    <div class="input-group mb-3">
                        <input type="text" name="username" class="form-control" placeholder="username" required autofocus>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" name="password" class="form-control" placeholder="Password" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">

                        <div class="col-12">
                            <button type="submit" class="btn bg-gradient-primary btn-flat btn-block mb-2">Login</button>
                        </div>
                        <div class="col-12">
                            <a href="<?= base_url(); ?>" class="btn bg-gradient-navy btn-flat btn-block"><i class="fa fa-home"></i> Beranda</a>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>

            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="<?= base_url(); ?>/assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?= base_url(); ?>/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url(); ?>/assets/dist/js/adminlte.min.js"></script>
</body>

</html>