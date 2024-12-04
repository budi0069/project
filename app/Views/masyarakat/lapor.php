<?= $this->extend('layout/index.php') ?>
<?= $this->section('content') ?>
<div class="card">
    <div class="card-header text-center" style="background-color: #00AEEF;color:white;">
        <h5>Sampaikan Laporan Anda Disini</h5>
    </div>
    <div class="card-body">
        <form action="<?php base_url() ?>/masyarakat_lapor" method="post">
            <div class="form-group">
                <label for="">NIK</label>
                <input type="text" class="form-control" name="nik" value="<?= session('nik') ?>" readonly>
            </div>
            <div class="form-group">
                <label for="">Nama Pelapor</label>
                <input type="text" class="form-control" name="nama_pelapor" value="<?= session('nama_user') ?>" readonly>
            </div>
            <div class="form-group">
                <label for="">Judul Laporan</label>
                <select id="judul_laporan" name="judul_laporan" required class="form-control">
                    <option value="Kekerasan Fisik">Kekerasan Fisik</option>
                    <option value="Kekerasan Psikis/Emosional">Kekerasan Psikis/Emosional</option>
                    <option value="Kekerasan Seksual">Kekerasan Seksual</option>
                    <option value="Kekerasan Ekonomi">Kekerasan Ekonomi</option>
                    <option value="Kekerasan Digital">Kekerasan Digital</option>
                    <option value="Kekerasan Dalam Rumah Tangga (KDRT)">Kekerasan dalam Rumah Tangga (KDRT)</option>
                    <option value="Kekerasan di Sekolah">Kekerasan di Sekolah</option>
                    <option value="Eksploitasi Anak">Eksploitasi Anak</option>
                    <option value="Kekerasan dalam Pengasuhan">Kekerasan dalam Pengasuhan</option>
                </select>
            </div>
            <div class="form-group">
                <label for="">Deskripsi Laporan</label>
                <input type="text" class="form-control" name="deskripsi_laporan">
            </div>
            <div class="form-group">
                <label for="">Deskripsi Data Korban</label>
                <input type="text" class="form-control" name="deskripsi_data_korban">
            </div>
            <div class="form-group">
                <label for="">Tanggal Laporan</label>
                <input type="date" class="form-control" name="tanggal_laporan">
            </div>
            <div class="form-group">
                <label for="">Lokasi Kejadian</label>
                <select class="form-control" name="id_kelurahan">
                    <option value=""></option>
                    <?php foreach ($kelurahan as $key => $value) { ?>
                        <option value="<?= $value['id_kelurahan'] ?>"><?= $value['nama_kelurahan'] ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="d-flex justify-content-end">
                <button class="btn btn-primary" type="submit">Simpan</button>
            </div>
        </form>
    </div>
</div>
<?= $this->endSection() ?>