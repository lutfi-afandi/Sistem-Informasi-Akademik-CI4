<?php

$layanan = \Config\Database::connect()->query("SELECT * FROM tbl_layanan")->getResultArray();
?>
<div class="collapse navbar-collapse order-3  " id="navbarCollapse">
    <!-- Left navbar links -->
    <ul class="navbar-nav mr-auto">
        <li class="nav-item">
            <a href="<?= base_url('mhs'); ?>" class="nav-link">Beranda</a>
        </li>
        <li class="nav-item dropdown">
            <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">Akademik</a>
            <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
                <li><a href="<?= base_url('krs'); ?>" class="dropdown-item">Kartu Rencana Studi </a></li>
                <li><a href="<?= base_url('mhs/khs'); ?>" class="dropdown-item">Kartu Hasil Studi</a></li>
                <li><a href="<?= base_url('mhs/absensi'); ?>" class="dropdown-item">Absensi</a></li>
            </ul>
        </li>
        <li class="nav-item dropdown">
            <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">Layanan</a>
            <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
                <?php foreach ($layanan as $key => $lay) { ?>
                    <li><a href="<?= base_url('mhs/layanan/' . $lay['id_layanan']); ?>" class="dropdown-item"><?= $lay['nama_layanan']; ?> </a></li>
                <?php } ?>
                <li><a target="_blank" href="<?= base_url('surat_siap_pkl.docx'); ?>" class="dropdown-item">Surat Kesediaan Mengikuti PKL </a></li>

            </ul>
        </li>
        <li class="nav-item">
            <a href="<?= base_url('mhs/profil_mhs'); ?>" class="nav-link">Profil</a>
        </li>
        <!-- End Level two -->
    </ul>


    <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="far fa-user"></i> SAYA
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <span class="dropdown-item dropdown-header"><?= session()->get('nama_user'); ?></span>
                <div class="dropdown-divider"></div>
                <a href="<?= base_url('mhs/profil_mhs'); ?>" class="dropdown-item">
                    <i class="fas fa-user-cog mr-2"></i> Profil
                </a>
                <div class="dropdown-divider"></div>
                <a href="<?= base_url('auth/logout/mhs'); ?>" class="dropdown-item">
                    <i class="fas fa-sign-out-alt mr-2"></i> Logout
                </a>
            </div>
        </li>
    </ul>

</div>