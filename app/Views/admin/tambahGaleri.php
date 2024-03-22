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

<div class="mx-4">

    <h1 class="pinks" style="font-size: 45px; font-family: 'Odibee Sans', cursive;" align="center">Tambah Gambar</h1>

    <form method="post" action="<?=base_url('admin/simpanGaleri');?>" enctype="multipart/form-data">
  <?= csrf_field(); ?>
 <?php if(session()->getFlashdata('pesan')) : ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
  <?= session()->getFlashdata('pesan'); ?>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
  <?php endif; ?>

    <label for="nama" class="form-label mb-0 mt-2">Nama</label>
    <select id="nama" name="nama" class="form-select mb-3 <?= ($validation->hasError('nama')) ? 'is-invalid' : ''; ?>" style="border-radius: 30px; font-size: 17px;">
        <option selected>Pilih Produk</option>
        <?php foreach($data as $d) { ?>
        <option value="<?= $d->nama; ?>"><?= $d->nama; ?></option>
        <?php } ?>
    </select>
    <div class="invalid-feedback">
        <?= $validation->getError('nama'); ?>
    </div>

  <label for="alt" class="form-label mb-0 mt-2">Teks</label>
    <input id="alt" name="alt" type="text" class="form-control mb-3 <?= ($validation->hasError('alt')) ? 'is-invalid' : ''; ?>" style="border-radius: 30px; font-size: 17px;">
    <div class="invalid-feedback">
        <?= $validation->getError('alt'); ?>
    </div>

    <label for="formFile" class="form-label mb-0 mt-2">Gambar</label>
    <input id="formFile" name="galeri" type="file" class="form-control mb-3 <?= ($validation->hasError('galeri')) ? 'is-invalid' : ''; ?>" style="border-radius: 30px; font-size: 17px;">
    <div class="invalid-feedback">
        <?= $validation->getError('galeri'); ?>
    </div>

          
  <button style="border-radius: 30px;" name="simpan" type="submit" class="btn bg-pink text-white d-block mt-4 w-100" onclick="return confirm('Tambah data?');">Tambah</button>
<br>
</form>


</div>

<!-- akun, menu, pre-order, galeri, komentar, langganan -->

<?= $this->endSection(); ?>