<?php $this->extend('/templates/index.php') ?>
<?php $this->section('content') ?>
<div class="container">
    <div class="card">
        <div class="card-header bg-primary ">
            <h3 style="color:white" class="pt-2">Tambah Laporan</h3>
        </div>
        <div class="card-body">
            <form action="<?php base_url() ?>/admin_kelurahan/data_laporan/tambahLaporan" method="post">
                <div class="row">
                    <div class="col-md-6">

                        <div class="form-group">
                            <label for="">Kode Laporan</label>
                            <input value="<?= esc($kode_laporan) ?>" type="text" class="form-control" name="kode_laporan" readonly>
                        </div>
                        <div class="form-group">
                            <label for="">Nama Pelapor</label>
                            <!-- <select name="id_user" id="" class="form-control">
                                <?php foreach ($user as $pengguna) { ?>
                                    <option value="<?= $pengguna['id_user'] ?>"><?= $pengguna['nama_user'] ?></option>
                                <?php } ?>
                            </select> -->
                            <input class="form-control" name="id_user" type="text">
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
                    </div>
                    <div class="col-md-6">

                        <div class="form-group">
                            <label for="">Deskripsi Data Korban</label>
                            <input type="text" class="form-control" name="deskripsi_data_korban">
                        </div>
                        <div class="form-group">
                            <label for="">Lokasi Kejadian</label>
                            <select name="id_kelurahan" id="" class="form-control">
                                <?php foreach ($kelurahan as $kel) { ?>
                                    <option value="<?= $kel['id_kelurahan'] ?>"><?= $kel['nama_kelurahan'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Tanggal Laporan</label>
                            <input type="date" class="form-control" name="tanggal_laporan">
                        </div>
                        <div class="d-flex justify-content-end">
                            <button class="btn btn-primary" type="submit">Simpan</button>
                        </div>
                    </div>
                    </div>
                </form>
        </div>
    </div>
</div>
<?php $this->endSection() ?>