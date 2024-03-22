<?= $this->extend('admin/template'); ?>

<?= $this->section('nav'); ?>
<div class="collapse navbar-collapse ms-5" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="<?=base_url('admin');?>">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?=base_url('admin/akun');?>">Akun</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?=base_url('admin/menu');?>">Menu</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="<?=base_url('admin/galeri');?>">Galeri</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?=base_url('admin/komentar');?>">Komentar</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?=base_url('admin/langganan ');?>">Email</a>
        </li>
        <?php if(session()->has('email')) { ?>
          <li class="nav-item">
            <a class="nav-link" href="<?=base_url('admin/logout');?>">Logout</a>
          </li>
        <?php } ?>
      </ul>
    </div>
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>

<br>

<a href="<?=base_url('admin/tambahGaleri');?>" class="btn bg-pinks ms-2 text-white mb-2">Tambah gambar</a>

  <?php if(session()->getFlashdata('pesan')) : ?>
        <div class="alert alert-success alert-dismissible fade show mx-2" role="alert">
  <?= session()->getFlashdata('pesan'); ?>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
  <?php endif; ?>

  <?php if(session()->getFlashdata('danied')) : ?>
        <div class="alert alert-danger alert-dismissible fade show mx-2" role="alert">
  <?= session()->getFlashdata('danied'); ?>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
  <?php endif; ?>

<br>
<center>
<?php foreach($data as $d) { ?>
  	<div class="d-inline-block card" style="margin-bottom:10px; text-align:left; width: 20rem; align-items: center;">
  <img src="<?= base_url('public/assets/'.$d->slug.'/'.$d->galeri);?>" class="card-img-top" alt="<?= $d->alt; ?>" height="250px" onclick="window.location.href = '<?=base_url("public/assets/$d->slug/$d->galeri");?>'">
  <div class="card-body">
    <h5 align="center" class="card-title"><?= $d->kategori;?></h5>
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item">Teks : <?= $d->alt; ?></li>
  </ul>
  <div class="card-body">
  <a style="float:left; width:45%;" href="<?=base_url('admin/editGaleri/'.$d->slug);?>" class="btn btn-success d-inline-block card-link mb-2">Edit</a><a style="float:right; width:45%;" href="<?=base_url('admin/hapusGaleri/'.$d->id);?>" class="btn btn-danger d-inline-block card-link mb-2" onclick="return confirm('Lanjutkan hapus gambar?');">Hapus</a>
  </div>
</div>
<?php } ?>
</center>

<br>
<!-- akun, menu, pre-order, galeri, komentar, langganan -->

<?= $this->endSection(); ?>