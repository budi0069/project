<?php $this->extend('templates/index.php') ?>
<?php $this->section('content') ?>
<div class="container">
  <div class="card">
    <div class="card-header bg-primary">
    <h6 class="m-0 font-weight-bold text-white">Data Laporan</h6>
    </div>
    <div class="card-body">

      <div class="d-flex justify-content-end mb-3">
        <a class="btn btn-sm btn-success" href="<?php base_url() ?>/admin/data_laporan/tampilForm">Tambah <i class="fa fa-plus"></i></a>
      </div>
      <!-- < ?php dd($data)?> -->
      <table class="table table-striped">
        <thead>
          <tr>
            <th>No.</th>
            <th>Kode Laporan</th>
            <th>Nama Pelapor</th>
            <th>Judul Laporan</th>
            <th>Kelurahan</th>
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
              <td><?= $datalaporan['nama_kelurahan']?></td>
              <td>
                <?php
                if ($datalaporan['status'] == 'Diproses DPMPPA') {
                  echo '<span class="badge badge-warning">Diproses DPMPPA</span>';
                } elseif ($datalaporan['status'] == 'Diproses Kelurahan') {
                  echo '<span class="badge badge-dark">Diproses Kelurahan</span>';
                }
                ?>
              </td>
              <td>
                <?php ?>
                <a class="btn btn-sm btn-success" href="<?php base_url()?>/admin/data_laporan/detail/<?=$datalaporan['kode_laporan']?>"><i class="fas fa-eye"></i></a>
                <a class="btn btn-sm btn-warning" href="<?php base_url() ?>/admin/data_laporan/proses/<?= $datalaporan['kode_laporan'] ?>" onclick="return confirm('Apakah Anda Yakin Ingin Memproses Penugasan <?= $datalaporan['kode_laporan'] ?>?')"><i class="fas fa-project-diagram"></i></a>
                <a class="btn btn-sm btn-primary" href="<?php base_url() ?>/admin/penugasan/kirim/<?= $datalaporan['kode_laporan'] ?>" onclick="return confirm('Apakah Anda Yakin Ingin Mengirim Penugasan <?= $datalaporan['kode_laporan'] ?> Ke Kelurahan Degayu?')"><i class="fa fa-paper-plane"></i></a>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>

</div>

<?php $this->endSection() ?>