<?php $this->extend('layout/index.php') ?>
<?= $this->section('content') ?>
<div class="container mt-5">
    <div class="card">
        <div class="card-header" style="background-color: #00AEEF;color:white;">
            <h3>Laporan Saya</h3>
        </div>
    </div>
    <!-- <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link active" href="#semua" data-bs-toggle="tab">Semua</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#belum" data-bs-toggle="tab">Belum</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#proses" data-bs-toggle="tab">Proses</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#selesai" data-bs-toggle="tab">Selesai</a>
        </li>
    </ul> -->

    <div class="tab-content mt-3">
        <!-- Semua -->
        <div class="tab-pane fade show active" id="semua">
            <?php foreach ($laporan as $item): ?>
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title"><?= $item['judul_laporan']; ?></h5>
                        <p class="card-text"><?= $item['deskripsi_laporan']; ?></p>
                        <p class="card-text"><strong>Status:</strong> <?= $item['status']; ?></p>
                        <p class="card-text"><small class="text-muted">Dikirim pada: <?= $item['tanggal_laporan']; ?></small></p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<?= $this->endSection() ?>