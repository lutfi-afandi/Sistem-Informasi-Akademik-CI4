<div class="collapse navbar-collapse order-3  " id="navbarCollapse">
    <!-- Left navbar links -->
    <ul class="navbar-nav mr-auto">
        <li class="nav-item">
            <a href="<?= base_url('admin'); ?>" class="nav-link">Dashboard</a>
        </li>
        <li class="nav-item dropdown">
            <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">Akademik</a>
            <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
                <li><a href="<?= base_url('dsn/jadwal'); ?>" class="dropdown-item">Jadwal Mengajar </a></li>
                <li><a href="<?= base_url('dsn/AbsenKelas'); ?>" class="dropdown-item">Absen Kelas </a></li>
                <li><a href="<?= base_url('dsn/NilaiMahasiswa'); ?>" class="dropdown-item">Nilai Mahasiswa </a></li>
                <!-- End Level two -->
            </ul>
        </li>

    </ul>
    <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="far fa-user"></i> SAYA
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <span class="dropdown-item dropdown-header"><?= session()->get('nama_dosen'); ?></span>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <i class="fas fa-user-cog mr-2"></i> Profil
                </a>
                <div class="dropdown-divider"></div>
                <a href="<?= base_url('auth/logout/dosen'); ?>" class="dropdown-item">
                    <i class="fas fa-sign-out-alt mr-2"></i> Logout
                </a>
            </div>
        </li>
    </ul>

</div>