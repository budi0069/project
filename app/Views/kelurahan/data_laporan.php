<?php $this->extend('/templates_kel/index.php') ?>
<?php $this->section('content') ?>
<div class="card ml-4 mr-4">
    <div class="card-header bg-primary">
        <h6 class="m-0 font-weight-bold text-white">Data Laporan</h6>
    </div>
    <div class="card-body">
        <div class="d-flex justify-content-end mb-3">
            <a class="btn btn-sm btn-success" href="<?php base_url() ?>/admin_kelurahan/data_laporan/tampilForm">Tambah <i class="fa fa-plus"></i></a>
        </div>
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
                        <td><?= $datalaporan['nama_kelurahan'] ?></td>
                        <td>
                            <?php
                            if ($datalaporan['status'] == 'Terverifikasi') {
                                echo '<span class="badge badge-primary">Terverifikasi</span>';
                            } elseif ($datalaporan['status'] == 'Diproses Kelurahan') {
                                echo '<span class="badge badge-warning">Diproses Kelurahan</span>';
                            } elseif ($datalaporan['status'] == 'penugasan') {
                                echo '<span class="badge badge-dark">Penugasan</span>';
                            }
                            ?>
                        </td>
                        <td>
                            <?php ?>
                            <a class="btn btn-sm btn-success" href="<?php base_url() ?>/admin_kelurahan/data_laporan/detail/<?= $datalaporan['kode_laporan'] ?>"><i class="fas fa-eye"></i></a>
                            <a class="btn btn-sm btn-warning" href="<?php base_url() ?>/admin_kelurahan/data_laporan/proses/<?= $datalaporan['kode_laporan'] ?>" data-toggle="modal" data-target="#modalProses"><i class="fas fa-project-diagram"></i></a>
                            <a class="btn btn-sm btn-primary" href="<?php base_url() ?>/admin_kelurahan/rujukan/kirim/<?= $datalaporan['kode_laporan'] ?>" onclick="return confirm('Apakah Anda Yakin Ingin Mengirim Rujukan <?= $datalaporan['kode_laporan'] ?> Ke DPMPPA?')"><i class="fa fa-paper-plane"></i></a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<!-- Modal Proses-->
<div class="modal fade" id="modalProses" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col">
                            <label for="">Kode Laporan</label>
                            <input type="text" class="form-control" placeholder="<?= $datalaporan['kode_laporan']?>" readonly>
                        </div>
                        <div class="col">
                            <label for="">Nama Pelapor</label>
                            <input type="text" class="form-control" placeholder="<?= $datalaporan['nama_user']?>" readonly>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col">
                            <div class="form-group">
                                <label for="">Pelayanan</label>
                                <select name="" id="" class="form-control">
                                    <?php foreach ($pelayanan as $pelayanan): ?>
                                    <option value="<?= $pelayanan['pelayanan'] ?>"><?= $pelayanan['pelayanan'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php $this->endSection() ?>