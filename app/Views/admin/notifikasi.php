<?php $this->extend('/templates/index.php') ?>
<?php $this->section('content') ?>
<div class="card ml-4 mr-4">
    <div class="card-header bg-primary">
        <h6 class="m-0 font-weight-bold text-white">Notifikasi</h6>
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
                    <th>Tanggal Laporan</th>
                    <th>Kelurahan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($data)): ?>
                    <?php $nomor = 1;
                    foreach ($data as $notif): ?>
                        <tr>
                            <td><?= $nomor++ ?></td>
                            <td><?= $notif['kode_laporan'] ?></td>
                            <td><?= $notif['nama_user'] ?></td>
                            <td><?= $notif['judul_laporan'] ?></td>
                            <td><span class="badge badge-info">Dirujuk ke DPMPPA</span></td>
                            <td><?= date('d M Y', strtotime($notif['tanggal_laporan'])) ?></td>
                            <td><?= $notif['nama_kelurahan'] ?></td>
                            <td>
                                <a class="btn btn-success" href="<?php base_url() ?>/admin/notifikasi/detail/<?= $notif['kode_laporan'] ?>">Detail</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="8" class="text-center">Tidak ada laporan baru</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
<?php $this->endSection() ?>