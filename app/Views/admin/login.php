<?= $this->extend('admin/template'); ?>

<?= $this->section('nav'); ?>
<div class="collapse navbar-collapse ms-5" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="<?=base_url('admin');?>">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?=base_url('menu');?>">Menu</a>
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

<div class="mx-3">
<br>



<h1 class="pinks" style="font-size: 45px; font-family: 'Odibee Sans', cursive;" align="center"><i class="fas fa-user-cog"></i>Administrator</h1>

<form method="post" action="<?=base_url('admin/prosesLogin');?>">
  <?= csrf_field(); ?>

 <?php if(session()->getFlashdata('danied')) : ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
  <?= session()->getFlashdata('danied'); ?>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
  <?php endif; ?>

  <?php if(session()->getFlashdata('pesan')) : ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
  <?= session()->getFlashdata('pesan'); ?>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
  <?php endif; ?>

  <label for="pesanan" class="form-label mb-0 mt-2">Alamat email</label>
    <input id="email" name="email" type="text" class="form-control mb-3 <?= ($validation->hasError('email')) ? 'is-invalid' : ''; ?>" style="border-radius: 30px; font-size: 17px;">
    <div class="invalid-feedback">
        <?= $validation->getError('email'); ?>
    </div>

  <label for="pesanan" class="form-label mb-0 mt-2">Password</label>
    <input id="password" name="password" type="password" class="form-control <?= ($validation->hasError('password')) ? 'is-invalid' : ''; ?>" style="border-radius: 30px; font-size: 17px;">
    <div class="invalid-feedback">
        <?= $validation->getError('password'); ?>
    </div>
    
    <small onclick="return confirm('Anda ingin meminta password baru?');" class="mt-2 ms-1"><a style="text-decoration:none;" href="<?=base_url('admin/resetPassword');?>">Lupa password</a></small>
          
  <button style="border-radius: 30px;" name="simpan" type="submit" class="btn bg-pink text-white d-block mt-4 w-100">Login</button>
  <br><br><br>
</form>


</div>

<!-- akun, menu, pre-order, galeri, komentar, langganan -->

<?= $this->endSection(); ?>