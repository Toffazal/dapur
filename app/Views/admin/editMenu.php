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
          <a class="nav-link active" href="<?=base_url('admin/menu');?>">Menu</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?=base_url('admin/galeri');?>">Galeri</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?=base_url('admin/komentar');?>">Komentar</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?=base_url('admin/langganan');?>">Email</a>
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

<div class="mx-3">

    <h1 class="pinks" style="font-size: 45px; font-family: 'Odibee Sans', cursive;" align="center">Edit Menu</h1>

<?php foreach($data as $d) { ?>
    <form method="post" action="<?=base_url('admin/updateMenu/'.$d->slug);?>" enctype="multipart/form-data">
  <?= csrf_field(); ?>
  <input type="hidden" name="id"  value="<?= $d->id; ?>">
  <input type="hidden" name="gambarLama" value="<?= $d->gambar; ?>">
 <?php if(session()->getFlashdata('pesan')) : ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
  <?= session()->getFlashdata('pesan'); ?>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
  <?php endif; ?>

      <img src="<?=base_url('public/assets/img/'.$d->gambar);?>" class="w-100 d-block" style="border-radius: 15px; cursor: pointer;" alt="dapur mama ain" onclick="window.location.href = '<?=base_url("public/assets/img/$d->gambar");?>'" height="263px">

  <div class="row">

  <div class="col-lg-6">
    <label for="nama" class="form-label mb-0 mt-2">Nama</label>
    <input id="nama" name="nama" type="text" class="form-control mb-3 <?= ($validation->hasError('nama')) ? 'is-invalid' : ''; ?>" value="<?= $d->nama; ?>" style="border-radius: 30px; font-size: 17px;">
    <div class="invalid-feedback">
        <?= $validation->getError('nama'); ?>
    </div>

  <label for="kategory" class="form-label mb-0 mt-2">Kategori</label>
    <select id="kategori" name="kategory" class="form-select mb-3 <?= ($validation->hasError('kategory')) ? 'is-invalid' : ''; ?>" style="border-radius: 30px; font-size: 17px;">
        <option selected><?=$d->kategory;?></option>
        <option value="Bolu">Bolu</option>
        <option value="Roti">Roti</option>
        <option value="Kue basah">Kue Basah</option>
        <option value="Kue kering">Kue Kering</option>
        <option value="Kue raya">Kue Raya</option>
        <option value="Cemilan">Cemilan</option>
    </select>
    <div class="invalid-feedback">
        <?= $validation->getError('kategory'); ?>
    </div>

    <label for="harga" class="form-label mb-0 mt-2">Harga</label>
    <input id="harga" name="harga" type="text" class="form-control mb-3 <?= ($validation->hasError('harga')) ? 'is-invalid' : ''; ?>" value="<?= $d->harga; ?>" style="border-radius: 30px; font-size: 17px;">
    <div class="invalid-feedback">
        <?= $validation->getError('harga'); ?>
    </div>
  </div>

  <div class="col-lg-6">
    <label for="keterangan" class="form-label mb-0 mt-2">Keterangan</label>
    <input id="keterangan" name="keterangan" type="text" class="form-control mb-3 <?= ($validation->hasError('keterangan')) ? 'is-invalid' : ''; ?>" value="<?= $d->keterangan; ?>" style="border-radius: 30px; font-size: 17px;">
    <div class="invalid-feedback">
        <?= $validation->getError('keterangan'); ?>
    </div>

        <label for="deskripsi" class="form-label mb-0 mt-2">Deskripsi</label>
    <textarea id="deskripsi" name="deskripsi" type="text" class="form-control mb-3 <?= ($validation->hasError('deskripsi')) ? 'is-invalid' : ''; ?>" style="border-radius: 10px; font-size: 17px;" rows="5"><?= $d->deskripsi; ?></textarea>
    <div class="invalid-feedback">
        <?= $validation->getError('deskripsi'); ?>
    </div>

    <label for="formFile" class="form-label mb-0 mt-2">Gambar</label>
    <input id="formFile" name="gambar" type="file" class="form-control mb-3 <?= ($validation->hasError('gambar')) ? 'is-invalid' : ''; ?>" style="border-radius: 30px; font-size: 17px;">
    <div class="invalid-feedback">
        <?= $validation->getError('gambar'); ?>
    </div>
  </div>
          
  <button style="border-radius: 30px;" name="simpan" type="submit" class="btn bg-pink text-white d-block mt-4 mx-3" onclick="return confirm('Simpan perubahan?');">Edit</button>

</div>

<br>
</form>
<?php } ?>


</div>

<!-- akun, menu, pre-order, galeri, komentar, langganan -->

<?= $this->endSection(); ?>