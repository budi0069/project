<?php $this->extend('/templates/index.php') ?>
<?php $this->section('content') ?>
<div class="container">
    <div class="card">
        <div class="card-header bg-primary text-white">
            <h3>Detail Laporan</h3>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <a href="<?= base_url() ?>'/admin/data_laporan/detail/<?= $data['kode_laporan'] ?>"></a>
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
                        <td><?= $data['deskripsi_data_korban']?></td>
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
                </tbody>
            </table>
            <div class="row">
                <div class="col-md-6">
                    <a class="btn btn-success mr-2" href="<?php base_url() ?>/admin/data_laporan"><i class="fa fa-arrow-left"></i></a>
                    <a class="btn btn-warning mr-2" href="<?php base_url() ?>/admin/data_laporan/edit/<?= $data['kode_laporan'] ?>"><i class="fa fa-edit"></i></a>
                    <a class="btn btn-danger mr-2" href="<?php base_url() ?>/admin/data_laporan/delete/<?= $data['kode_laporan'] ?>" onclick="return confirm('Apakah Anda Yakin Ingin menghapus data <?= $data['kode_laporan'] ?>')"><i class="fa fa-trash"></i></a>
                </div>
                <div class="col-md-6 d-flex justify-content-end">
                    <a class="btn btn-primary mr-2 " href="<?php base_url() ?>/admin/penugasan/kirim/<?= $data['kode_laporan'] ?>" onclick="return confirm('Apakah Anda Yakin Ingin Mengirim Penugasan <?= $data['kode_laporan'] ?> Ke Kelurahan Degayu?')"><i class="fa fa-paper-plane"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $this->endSection() ?>