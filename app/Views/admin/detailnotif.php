<?php $this->extend('/templates/index.php') ?>
<?php $this->section('content') ?>
<div class="container">
    <div class="card">
        <div class="card-header bg-primary">
            <h3 class="ml-5 text-white">Detail Notifikasi</h3>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <a href="<?= base_url() ?>'/admin/notifikasi/detail/<?= $data['kode_laporan'] ?>"></a>
                <tbody>
                    <tr>
                        <th scope="row">Kode Laporan</th>
                        <td><?= $data['kode_laporan'] ?></td>
                    </tr>
                    <tr>
                        <th scope="row">Nama Pelapor</th>
                        <td><?= $user['nama_user'] ?></td>
                    </tr>
                    <tr>
                        <th scope="row">Judul Laporan</th>
                        <td><?= $data['judul_laporan'] ?></td>
                    </tr>
                    <tr>
                        <th scope="row">Deskripsi Laporan</th>
                        <td><?= $data['deskripsi_laporan'] ?></td>
                    </tr>
                    <tr>
                        <th scope="row">Deskripsi Data Korban</th>
                        <td><?= $data['deskripsi_data_korban'] ?></td>
                    </tr>
                    <tr>
                        <th scope="row">Status</th>
                        <td><?= $data['status'] ?></td>
                    </tr>
                    <tr>
                        <th scope="row">Tanggal Laporan</th>
                        <td><?= date('d M Y', strtotime($data['tanggal_laporan'])) ?></td>
                    </tr>
                    <tr>
                        <th scope="row">Lokasi Kejadian</th>
                        <td><?= $kelurahan['nama_kelurahan'] ?></td>
                    </tr>
                    </tr>
                </tbody>
                </thead>
            </table>
            <div class="row">
                <div class="col md-6">
                    <a class="btn btn-success" href="<?php base_url() ?>/admin/verifikasi/<?= $data['kode_laporan'] ?>">Verifikasi</a>
                </div>
                <form action="<?= base_url('/admin/tolak/') .$data['kode_laporan']?>" method="post">
                    <button type="submit" class="btn btn-danger">Tolak</button>
                    <input type="hidden" name="kode_laporan" value="<?= $data['kode_laporan'] ?>">
                    <textarea name="alasan" class="form-control" placeholder="Berikan alasan penolakan"></textarea>
                </form>
                <!-- <div class="col col-md-6 d-flex justify-content-end">
                    <a class="btn btn-danger" href="<?= base_url('/admin/tolak/' . $data['kode_laporan']) ?>">Tolak</a>
                </div> -->
            </div>
        </div>
    </div>
</div>
<?php $this->endSection() ?>