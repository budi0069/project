<?php $this->extend('/templates_kel/index.php') ?>
<?php $this->section('content') ?>
<div class="card ml-4 mr-4">
    <div class="card-header bg-primary">
        <h6 class="m-0 font-weight-bold text-white">Rujukan</h6>
    </div>
    <div class="card-body">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Kode Laporan</th>
                    <th>Nama Pelapor</th>
                    <th>Judul Laporan</th>
                    <th>Status</th>
                    <th>Petugas Penugasan</th>
                    <th>Tanggal Penugasan</th>
                </tr>
            </thead>
            <tbody>
                <?php $nomor = 1;
                foreach ($data as $item): ?>
                    <tr>
                        <td><?= $nomor++ ?></td>
                        <td><?= $item['kode_laporan'] ?></td>
                        <td><?= $item['nama_user'] ?></td>
                        <td><?= $item['judul_laporan'] ?></td>
                        <td><span class="badge badge-dark">Rujukan</span></td>
                        <td><?= $item['nama_kelurahan'] ?></td>
                        <td><?= $item['tanggal_penugasan'] ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<?php $this->endSection() ?>