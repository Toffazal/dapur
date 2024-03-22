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
          <a class="nav-link" href="<?=base_url('admin/komentar');?>">Komentar</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="<?=base_url('admin/langganan');?>">Email</a>
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

    <h1 class="pinks" style="font-size: 45px; font-family: 'Odibee Sans', cursive;" align="center">Kirim email</h1>
    
    <a href="<?=base_url('admin/langganan');?>" class="btn bg-pinks ms-2 text-white mb-2">Lihat user berlangganan</a>

    <form method="post" action="<?=base_url('admin/kirimEmail');?>" enctype="multipart/form-data">
  <?= csrf_field(); ?>
 <?php if(session()->getFlashdata('pesan')) : ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
  <?= session()->getFlashdata('pesan'); ?>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
  <?php endif; ?>

    <label for="subject" class="form-label mb-0 mt-2">Subject</label>
    <input id="subject" name="subject" type="text" class="form-control mb-3 <?= ($validation->hasError('subject')) ? 'is-invalid' : ''; ?>" style="border-radius: 30px; font-size: 17px;">
    <div class="invalid-feedback">
        <?= $validation->getError('subject'); ?>
    </div>

    <label for="pesan" class="form-label mb-0 mt-2">Pesan</label>
    <textarea id="pesan" name="pesan" type="text" class="form-control mb-3 <?= ($validation->hasError('pesan')) ? 'is-invalid' : ''; ?>" style="border-radius: 10px; font-size: 17px;" rows="5"></textarea>
    <div class="invalid-feedback">
        <?= $validation->getError('pesan'); ?>
    </div>
<br>
  <button style="border-radius: 30px;" name="simpan" type="submit" class="btn bg-pinks w-100 text-white d-block mt-4" onclick="return confirm('Tambah data?');">Kirim</button>

<br>
</form>


</div>

<!-- akun, menu, pre-order, galeri, komentar, langganan -->

<?= $this->endSection(); ?>