<div class="collapse navbar-collapse order-3  " id="navbarCollapse">
    <!-- Left navbar links -->
    <ul class="navbar-nav ml-auto">
        <center>
            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
                    <i class="fas fa-sign-out-alt"></i> login

                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">

                    <a href="<?= base_url(); ?>/auth/login_admin" class="dropdown-item">
                        <i class="fas fa-user-tie  mr-2"></i> ADMIN
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="<?= base_url(); ?>/auth/login_dsn" class="dropdown-item">
                        <i class="fas fa-user-graduate mr-2"></i> DOSEN
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="<?= base_url(); ?>/auth/login_mhs" class="dropdown-item">
                        <i class="fas fa-users mr-2"></i> MAHASISWA
                    </a>
                    <div class="dropdown-divider"></div>
                </div>
            </li>
        </center>

    </ul>

</div>