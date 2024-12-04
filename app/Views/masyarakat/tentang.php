<?= $this->extend('layout/index.php') ?>
<?= $this->section('content') ?>
<div class="card">
  <div class="card-body text-center shadow-sm bg-white rounded">
    <h2>Tentang</h2>
  </div>
</div>
<div class="card mt-5" style="width: 18rem;">
  <img src="..." class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Card title</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    <a href="#" class="btn btn-primary">Go somewhere</a>
  </div>
</div>
<?= $this->endSection() ?>