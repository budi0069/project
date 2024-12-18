<?php $this->extend('/templates/index.php') ?>
<?php $this->section('content') ?>
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Laporan Selesai</h6>
        </div>
        <div class="card-body">
        <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <input type="text" name="tgl_awal" class="form-control" placeholder="Pilih Tanggal Awal" onfocus="this.type='date'" onblur="this.type='text'">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <input type="text" name="tgl_akhir" class="form-control" placeholder="Pilih Tanggal Akhir" onfocus="this.type='date'" onblur="this.type='text'">
                    </div>
                </div>
                <div class="col-md-6 d-flex justify-content-end">
                    <div class="form-group">
                        <button type="submit" class="btn btn-block btn-danger"><i class="fa fa-print"></i>Cetak</button>
                    </div>
                </div>
            </div>
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