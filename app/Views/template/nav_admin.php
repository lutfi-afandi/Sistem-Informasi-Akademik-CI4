<div class="collapse navbar-collapse order-3  " id="navbarCollapse">
    <!-- Left navbar links -->
    <ul class="navbar-nav mr-auto">
        <li class="nav-item">
            <a href="<?= base_url('admin'); ?>" class="nav-link">Dashboard</a>
        </li>
        <li class="nav-item dropdown">
            <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">Master</a>
            <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
                <li><a href="<?= base_url('gedung'); ?>" class="dropdown-item">Gedung </a></li>
                <li><a href="<?= base_url('ruangan'); ?>" class="dropdown-item">Ruangan </a></li>
                <li><a href="<?= base_url('fakultas'); ?>" class="dropdown-item">Fakultas </a></li>
                <li><a href="<?= base_url('prodi'); ?>" class="dropdown-item">Program Studi </a></li>
                <li><a href="<?= base_url('ta'); ?>" class="dropdown-item">Tahun Akademik </a></li>
                <li><a href="<?= base_url('matkul'); ?>" class="dropdown-item">Mata Kuliah </a></li>
                <li><a href="<?= base_url('mahasiswa'); ?>" class="dropdown-item">Mahasiswa </a></li>
                <li><a href="<?= base_url('dosen'); ?>" class="dropdown-item">Dosen </a></li>
                <li><a href="<?= base_url('user'); ?>" class="dropdown-item">User </a></li>
                <!-- End Level two -->
            </ul>
        </li>
        <li class="nav-item dropdown">
            <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">Akademik</a>
            <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
                <li><a href="<?= base_url('kelas'); ?>" class="dropdown-item">Kelas </a></li>
                <li><a href="<?= base_url('JadwalKuliah'); ?>" class="dropdown-item">Jadwal Kuliah </a></li>
                <!-- End Level two -->
            </ul>
        </li>
        <li class="dropdown open">
            <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Setting </a>
            <ul class="dropdown-menu" role="menu">
                <li><a href="<?= base_url('user'); ?>" class="dropdown-item">User</a></li>
                <li><a href="<?= base_url('ta/setting'); ?>" class="dropdown-item">Tahun Akademik</a></li>
 <li><a href="<?= base_url('ta/layanan'); ?>" class="dropdown-item">Layanan</a></li>
            </ul>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link">About</a>
        </li>

    </ul>
    <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="far fa-user"></i> SAYA
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <span class="dropdown-item dropdown-header"><?= session()->get('nama_user'); ?></span>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <i class="fas fa-user-cog mr-2"></i> Profil
                </a>
                <div class="dropdown-divider"></div>
                <a href="<?= base_url('auth/logout/admin'); ?>" class="dropdown-item">
                    <i class="fas fa-sign-out-alt mr-2"></i> Logout
                </a>
            </div>
        </li>
    </ul>

</div>