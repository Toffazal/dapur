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

<div class="container-fluid">

    <h1 class="pinks" style="font-size: 45px; font-family: 'Odibee Sans', cursive;" align="center">Tambah Menu</h1>

    <form method="post" action="<?=base_url('admin/simpanMenu');?>" enctype="multipart/form-data">
  <?= csrf_field(); ?>
 <?php if(session()->getFlashdata('pesan')) : ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
  <?= session()->getFlashdata('pesan'); ?>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
  <?php endif; ?>

  <div class="row mx-2">

  <div class="col-lg-6">
    <label for="nama" class="form-label mb-0 mt-2">Nama</label>
    <input id="nama" name="nama" type="text" class="form-control mb-3 <?= ($validation->hasError('nama')) ? 'is-invalid' : ''; ?>" style="border-radius: 30px; text-transform:capitalize;  font-size: 17px;">
    <div class="invalid-feedback">
        <?= $validation->getError('nama'); ?>
    </div>

  <label for="kategory" class="form-label mb-0 mt-2">Kategori</label>
    <select id="kategori" name="kategory" class="form-select mb-3 <?= ($validation->hasError('kategory')) ? 'is-invalid' : ''; ?>" style="border-radius: 30px; font-size: 17px;">
        <option selected>Pilih Kategori</option>
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
    <input id="harga" name="harga" type="text" class="form-control mb-3 <?= ($validation->hasError('harga')) ? 'is-invalid' : ''; ?>" style="border-radius: 30px; font-size: 17px;">
    <div class="invalid-feedback">
        <?= $validation->getError('harga'); ?>
    </div>
  </div>

  <div class="col-lg-6">
    <label for="keterangan" class="form-label mb-0 mt-2">Keterangan</label>
    <input id="keterangan" name="keterangan" type="text" class="form-control mb-3 <?= ($validation->hasError('keterangan')) ? 'is-invalid' : ''; ?>" style="border-radius: 30px; font-size: 17px;">
    <div class="invalid-feedback">
        <?= $validation->getError('keterangan'); ?>
    </div>

        <label for="deskripsi" class="form-label mb-0 mt-2">Deskripsi</label>
    <textarea id="deskripsi" name="deskripsi" type="text" class="form-control mb-3 <?= ($validation->hasError('deskripsi')) ? 'is-invalid' : ''; ?>" style="border-radius: 10px; font-size: 17px;" rows="5"></textarea>
    <div class="invalid-feedback">
        <?= $validation->getError('deskripsi'); ?>
    </div>

    <label for="formFile" class="form-label mb-0 mt-2">Gambar</label>
    <input id="formFile" name="gambar" type="file" class="form-control mb-3 <?= ($validation->hasError('gambar')) ? 'is-invalid' : ''; ?>" style="border-radius: 30px; font-size: 17px;">
    <div class="invalid-feedback">
        <?= $validation->getError('gambar'); ?>
    </div>
  </div>
          
  <button style="border-radius: 30px;" name="simpan" type="submit" class="btn bg-pink text-white d-block mt-4" onclick="return confirm('Tambah data?');">Tambah</button>

</div>
<br>
</form>


</div>

<!-- akun, menu, pre-order, galeri, komentar, langganan -->

<?= $this->endSection(); ?>