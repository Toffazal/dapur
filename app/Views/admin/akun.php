<?= $this->extend('admin/template'); ?>

<?= $this->section('nav'); ?>
<div class="collapse navbar-collapse ms-5" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="<?=base_url('admin');?>">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="<?=base_url('admin/akun');?>">Akun</a>
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

<div class="container-fluid">
<br>



<center><img src="<?=base_url('public/assets/img/'.$data->gambar);?>" width="200px" height="200px" style="border-radius: 100%; border:4px solid #FF1493;"></center>

<form method="post" action="<?=base_url('admin/editAkun');?>">
  <?= csrf_field(); ?>
  <input type="hidden" name="id" value="<?=$data->id;?>">
  <input type="hidden" name="gambarLama" value="<?=$data->gambar;?>">

 <?php if(session()->getFlashdata('pesan')) : ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
  <?= session()->getFlashdata('pesan'); ?>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
  <?php endif; ?>

  <label for="pesanan" class="form-label mb-0 mt-2">Alamat email</label>
    <input id="email" name="email" type="text" class="form-control mb-3" value="<?=$data->email;?>" readonly style="border-radius: 30px; font-size: 17px;">

  <label for="pesanan" class="form-label mb-0 mt-2">Password</label>
    <input id="password" name="password" type="password" class="form-control <?= ($validation->hasError('password')) ? 'is-invalid' : ''; ?>" placeholder="(ubah password)" style="border-radius: 30px; font-size: 17px;">
    <div class="invalid-feedback">
        <?= $validation->getError('password'); ?>
    </div>
          
  <button style="border-radius: 30px;" name="simpan" type="submit" class="btn bg-pink text-white d-block mt-4 w-100" onclick="return confirm('Apakah anda yakin ingin mengubah password?');">Simpan</button>
  <br><br><br>
</form>


</div>

<!-- akun, menu, pre-order, galeri, komentar, langganan -->

<?= $this->endSection(); ?>