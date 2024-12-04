<?php $this->extend('/templates/index.php') ?>
<?php $this->section('content') ?>
<div class="container">
    <div class="card">
        <div class="card-header bg-primary ">
            <h3 style="color:white" class="pt-2">Edit Laporan</h3>
        </div>
        <div class="card-body">
            <form action="<?= base_url() ?>/admin/data_laporan/editLaporan/<?= $data['kode_laporan']?>" method="post">
                <div class="form-group">
                    <label for="">Kode Laporan</label>
                    <input value="<?=$data['kode_laporan']?>" type="text" class="form-control" readonly>
                </div>
                <div class="form-group">
                    <label for="">Nama Pelapor</label>
                    <input value="<?=$user['nama_user']?>" type="text" class="form-control" readonly>
                </div>
                <div class="form-group">
                    <label for="">Judul Laporan</label>
                    <input value="<?=$data['judul_laporan'] ?>" type="text" class="form-control" readonly>
                </div>
                <div class="form-group">
                    <label for="">Status</label>
                    <select name="status" class="form-control">
                        <option value="belum">Belum</option>
                        <option value="proses">Proses</option>
                        <option value="selesai">Selesai</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Pelayanan yang diberikan</label>
                    <select name="pelayanan" class="form-control">
                        <option value="Pelayanan Penerimaan Pengaduan">Pelayanan Penerimaan Pengaduan</option>
                        <option value="Pelayanan Pemberian Perlindungan Tinggal Sementara">Pelayanan Pemberian Perlindungan Tinggal Sementara</option>
                        <option value="Pelayanan Bantuan Rujukan Pemeriksaan Medis Korban Kekerasan">Pelayanan Bantuan Rujukan Pemeriksaan Medis Korban Kekerasan</option>
                        <option value="Pelayanan Bantuan Rujukan Pendampingan dan Pemeriksaan Psikologis Korban Kekerasan">Pelayanan Bantuan Rujukan Pendampingan dan Pemeriksaan Psikologis Korban Kekerasan</option>
                        <option value="Pelayanan Bantuan Rujukan Rehabilitasi Psikososial Korban Kekerasan">Pelayanan Bantuan Rujukan Rehabilitasi Psikososial Korban Kekerasan</option>
                        <option value="Pelayanan Bantuan dan Rujukan Bantuan Hukum Korban Kekerasan">Pelayanan Bantuan dan Rujukan Bantuan Hukum Korban Kekerasan</option>
                        <option value="Pelayanan Bantuan Mediasi Kasus Kekerasan">Pelayanan Bantuan Mediasi Kasus Kekerasan</option>
                        <option value="Pelayanan Bantuan Pendampingan Psikologis Korban Kekerasan Saat Proses Berita Acara Pemeriksaan di Kepolisian">Pelayanan Bantuan Pendampingan Psikologis Korban Kekerasan Saat Proses Berita Acara Pemeriksaan di Kepolisian</option>
                        <option value="Pelayanan Bantuan Tenaga Ahli Bidang Psikologi (Psikolog) Proses Diversi di Kepolisian">Pelayanan Bantuan Tenaga Ahli Bidang Psikologi (Psikolog) Proses Diversi di Kepolisian</option>
                        <option value="Pelayanan Bantuan Pendampingan Psikologis Korban Kekerasan di Pengadilan Negeri">Pelayanan Bantuan Pendampingan Psikologis Korban Kekerasan di Pengadilan Negeri</option>
                        <option value="Pelayanan Bantuan Saksi Ahli Psikologi Terkait Kekerasan Berbasis Gender dan Anak di Persidangan">Pelayanan Bantuan Saksi Ahli Psikologi Terkait Kekerasan Berbasis Gender dan Anak di Persidangan</option>
                        <option value="Pelayanan Menerima Rujukan dari Instansi Lembaga Kota/Kab/Provinsi">Pelayanan Menerima Rujukan dari Instansi Lembaga Kota/Kab/Provinsi</option>
                        <option value="Pelayanan Mengirim Rujukan Ke Instansi/Lembaga Kota/Kab/Provinsi">Pelayanan Mengirim Rujukan Ke Instansi/Lembaga Kota/Kab/Provinsi</option>
                        <option value="Pelayanan Bantuan Informasi Rujukan Permasalah Anak dan Perempuan">Pelayanan Bantuan Informasi Rujukan Permasalah Anak dan Perempuan</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Tanggal Laporan</label>
                    <input value="<?=$data['tanggal_laporan']?>" type="date" class="form-control" readonly>
                </div>

                <div class="d-flex bd-highlight">
                <a class="btn btn-success mr-auto" href="<?php base_url()?>/admin/data_laporan/detail/<?=$data['kode_laporan']?>"><i class="fa fa-arrow-left pl-2 pr-2"></i></a>
                    <button class="btn btn-primary " type="submit">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php $this->endSection() ?>