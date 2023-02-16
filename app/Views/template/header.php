<body class="hold-transition layout-top-nav">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand-md navbar-dark navbar-white bg-danger">
            <div class="container">
                <a href="<?= base_url(); ?>/admin" class="navbar-brand">
                    <img src="<?= base_url(); ?>/assets/img/logo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3">
                    <span class="brand-text font-weight-light">SIAKAD AKFAR CEFADA</span>
                </a>

                <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <?php if (session()->get('user') == 'admin') { ?>
                    <?= $this->include('template/nav_admin'); ?>
                <?php } elseif (session()->get('user') == 'mhs') { ?>
                    <?= $this->include('template/nav_mhs'); ?>
                <?php } elseif (session()->get('user') == 'dsn') { ?>
                    <?= $this->include('template/nav_dosen'); ?>
                <?php } else { ?>
                    <?= $this->include('template/nav_no'); ?>
                <?php  } ?>

            </div>
        </nav>
        <!-- /.navbar -->