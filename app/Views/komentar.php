<?= $this->extend('admin/template'); ?>

<?= $this->section('nav'); ?>
<div class="collapse navbar-collapse ms-5" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="<?=base_url();?>">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?=base_url('menu');?>">Menu</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="<?=base_url('komentar');?>">Komentar</a>
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

    <h1 class="pinks" style="font-size: 45px; font-family: 'Odibee Sans', cursive;" align="center"><i class="far fa-comments pink me-2"></i>Komentar</h1>

    <form method="post" action="<?=base_url('komentar/simpan');?>" enctype="multipart/form-data">
  <?= csrf_field(); ?>

 <?php if(session()->getFlashdata('pesan')) : ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
  <?= session()->getFlashdata('pesan'); ?>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
  <?php endif; ?>

  <?php if(session()->getFlashdata('danied')) : ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
  <?= session()->getFlashdata('danied'); ?>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
  <?php endif; ?>

    <label for="pin" class="form-label mb-0 mt-2">PIN</label>
    <input id="pin" name="pin" type="number" class="form-control mb-3 <?= ($validation->hasError('pin')) ? 'is-invalid' : ''; ?>" autocomplete="off" style="border-radius: 30px; font-size: 17px;">
    <div class="invalid-feedback">
        <?= $validation->getError('pin'); ?>
    </div>

  <label for="tanggapan" class="form-label mb-0 mt-2">Tanggapan</label>
    <select id="tanggapan" name="tanggapan" class="form-select mb-3" aria-label="Default select example" style="border-radius: 30px; font-size: 17px;">
      <option selected>Pilih tanggapan anda</option>
      <option value="tidak puas">Tidak puas</option>
      <option value="puas">Puas</option>
      <option value="sangat puas">Sangat puas</option>
    </select>
    <div class="invalid-feedback">
        <?= $validation->getError('tanggapan'); ?>
    </div>

    <label for="komentar" class="form-label mb-0 mt-2">Komentar</label>
    <textarea id="komentar" name="komentar" type="text" class="form-control mb-3 <?= ($validation->hasError('komentar')) ? 'is-invalid' : ''; ?>" style="border-radius: 10px; font-size: 17px;" rows="5"></textarea>
    <div class="invalid-feedback">
        <?= $validation->getError('komentar'); ?>
    </div> 
          
  <button style="border-radius: 30px;" name="simpan" type="submit" class="btn bg-pinks w-100 text-white d-block mt-4" onclick="return confirm('Tambah data?');">Kirim</button>

<br>
</form>

</div>

<!-- akun, menu, pre-order, galeri, komentar, langganan -->

<?= $this->endSection(); ?>