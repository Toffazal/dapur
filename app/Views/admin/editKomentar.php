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
          <a class="nav-link" href="<?=base_url('admin/galeri');?>">Galeri</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="<?=base_url('admin/komentar');?>">Komentar</a>
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

    <h1 class="pinks" style="font-size: 45px; font-family: 'Odibee Sans', cursive;" align="center">Buat PIN</h1>

    <form method="post" action="<?=base_url('admin/updateKomentar');?>" enctype="multipart/form-data">
  <?= csrf_field(); ?>
  <input type="hidden" name="id"  value="<?= $d->id; ?>">
 <?php if(session()->getFlashdata('pesan')) : ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
  <?= session()->getFlashdata('pesan'); ?>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
  <?php endif; ?>

  <label for="pin" class="form-label mb-0 mt-2">PIN</label>
    <input id="pin" name="pin" type="number" min="0" class="form-control mb-3 <?= ($validation->hasError('pin')) ? 'is-invalid' : ''; ?>" value="<?=$d->pin;?>" style="border-radius: 30px; font-size: 17px;">
    <div class="invalid-feedback">
        <?= $validation->getError('pin'); ?>
    </div>

    <label for="kategori" class="form-label mb-0 mt-2">Kategori</label>
    <input id="kategori" name="kategori" type="text" class="form-control mb-3 <?= ($validation->hasError('kategori')) ? 'is-invalid' : ''; ?>" value="<?=$d->kategori;?>" style="border-radius: 30px; font-size: 17px;">
    <div class="invalid-feedback">
        <?= $validation->getError('kategori'); ?>
    </div>

    <label for="nama" class="form-label mb-0 mt-2">Nama</label>
    <input id="nama" name="nama" type="text" class="form-control mb-3 <?= ($validation->hasError('nama')) ? 'is-invalid' : ''; ?>" value="<?=$d->nama;?>" style="border-radius: 30px; font-size: 17px;">
    <div class="invalid-feedback">
        <?= $validation->getError('nama'); ?>
    </div>
<br>
  <button style="border-radius: 30px;" name="simpan" type="submit" class="btn bg-pinks w-100 text-white d-block mt-4" onclick="return confirm('Tambah data?');">Simpan</button>

<br>
</form>


</div>

<!-- akun, menu, pre-order, galeri, komentar, langganan -->

<?= $this->endSection(); ?>