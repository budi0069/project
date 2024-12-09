<?php $this->extend('/templates/index.php') ?>
<?php $this->section('content') ?>
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Laporan Selesai</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode Laporan</th>
                            <th>Nama Pelapor</th>
                            <th>Judul Laporan</th>
                            <th>Lokasi Kejadian</th>
                            <th>Tanggal Laporan</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $nomor = 1;
                        foreach ($data as $datalaporan): ?>
                            <tr>
                                <td><?= $nomor++ ?></td>
                                <td><?= $datalaporan['kode_laporan'] ?></td>
                                <td><?= $datalaporan['nama_user'] ?></td>
                                <td><?= $datalaporan['judul_laporan'] ?></td>
                                <td><?= $datalaporan['nama_kelurahan'] ?></td>
                                <td><?= date('d M Y', strtotime($datalaporan['tanggal_laporan'])) ?></td>
                                <td><span class="badge badge-success"><?= $datalaporan['status'] ?></span></td>
                                
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php $this->endSection() ?>