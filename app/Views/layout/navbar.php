<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #00AEEF;">
    <a class="navbar-brand" href="#">DAMAI</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="<?php base_url() ?>/">Beranda</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php base_url() ?>/tentang">Tentang</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php base_url() ?>/lapor">Lapor</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php base_url() ?>/kontak">Kontak</a>
            </li>
            <?php if (session('role') == 'masyarakat') { ?>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                        <?= session('nama_user') ?>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="/masyarakat/laporan_saya">Laporan Saya</a>
                        <a class="dropdown-item" href="/masyarakat/profil">Profil</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="/masyarakat/logout">Logout</a>
                    </div>
                </li>
        </ul>
    <?php } else { ?>
        <a class="btn btn-outline-light my-2 my-sm-0" href="<?php base_url() ?>/login">Login</a>
    <?php } ?>
    </div>
</nav>
<?php
if (session()->getFlashdata('message')) {
    echo '<div class="alert alert-danger">' . session()->getFlashdata('message') . '</div>';
}
?>