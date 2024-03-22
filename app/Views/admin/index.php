<?= $this->extend('admin/template'); ?>

<?= $this->section('nav'); ?>
<div class="collapse navbar-collapse ms-5" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="<?=base_url('admin');?>">Home</a>
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
          <a class="nav-link" href="<?=base_url('admin/langganan');?>">Email</a>
        </li>
        <?php if(session()->has('email')) { ?>
          <li class="nav-item">
            <a class="nav-link text-danger" href="<?=base_url('admin/logout');?>">Logout</a>
          </li>
        <?php } ?>
      </ul>
    </div>
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>


<div class="container-fluid">
<br>
<center>

<div class="chart bg-light mx-2 mb-2 d-none d-md-inline-block" style="width:300px;">
  <h3 class="ms-3 me-5 mt-3 text-start pinks bold">DAFTAR MENU</h3>
  <i class="fas fa-list-ul fa-3x float-end me-3 pink"></i>
  <h1 class=" text-start ms-3 bold" style="color:#7B68EE;"><?=count($menu);?></h1>
</div>
<div class="chart bg-light mx-2 mb-2 d-md-none d-inline-block" style="width:46%;">
  <h5 class="ms-3 me-5 mt-3 text-start pinks bold">DAFTAR MENU</h5>
  <i class="fas fa-list-ul fa-3x float-end me-3 pink"></i>
  <h1 class=" text-start ms-3 bold" style="color:#7B68EE;"><?=count($menu);?></h1>
</div>

<div class="chart bg-light mx-2 mb-2 d-none d-md-inline-block" style="width:300px;">
  <h3 class="ms-3 me-5 mt-3 text-start pinks bold">GALERI</h3>
  <i class="fas fa-images fa-3x float-end me-3 pink"></i>
  <h1 class=" text-start ms-3 bold" style="color:#7B68EE;"><?=count($galeri);?></h1>
</div>
<div class="chart bg-light mx-2 mb-2 d-md-none d-inline-block" style="width:46%;">
  <h5 class="ms-3 me-5 mt-3 text-start pinks bold">GALERI</h5>
  <i class="fas fa-images fa-3x float-end me-3 pink"></i>
  <h1 class=" text-start ms-3 bold" style="color:#7B68EE;"><?=count($galeri);?></h1>
</div>

<div class="chart bg-light mx-2 mb-2 d-none d-md-inline-block" style="width:300px;">
  <h3 class="ms-3 me-5 mt-3 text-start pinks bold">KOMENTAR</h3>
  <i class="fas fa-comments fa-3x float-end me-3 pink"></i>
  <h1 class=" text-start ms-3 bold" style="color:#7B68EE;"><?=count($komentar);?></h1>
</div>
<div class="chart bg-light mx-2 mb-2 d-md-none d-inline-block" style="width:46%;">
  <h5 class="ms-3 me-5 mt-3 text-start pinks bold">KOMENTAR</h5>
  <i class="fas fa-comments fa-3x float-end me-3 pink"></i>
  <h1 class=" text-start ms-3 bold" style="color:#7B68EE;"><?=count($komentar);?></h1>
</div>

<div class="chart bg-light mx-2 mb-2 d-none d-md-inline-block" style="width:300px;">
  <h3 class="ms-3 me-5 mt-3 text-start pinks bold">BERLANGGANAN</h5>
  <i class="fas fa-award fa-3x float-end me-3 pink"></i>
  <h1 class=" text-start ms-3 bold" style="color:#7B68EE;"><?=count($berlangganan);?></h1>
</div>
<div class="chart bg-light mx-2 mb-2 d-md-none d-inline-block" style="width:46%;">
  <h5 class="ms-3 me-5 mt-3 text-start pinks bold">BERLANGGANAN</h3>
  <i class="fas fa-award fa-3x float-end me-3 pink"></i>
  <h1 class=" text-start ms-3 bold" style="color:#7B68EE;"><?=count($berlangganan);?></h1>
</div>

<br>

  <a href="<?=base_url('admin/akun');?>" style="text-decoration: none;">
  <div class="menu m-4">
    <span class="fas fa-user-cog fa-5x text-dark"></span>
    <p>Akun</p>
  </div>
  </a>

  <a href="<?=base_url('admin/menu');?>" style="text-decoration: none;">
  <div class="menu m-4">
    <span class="fas fa-birthday-cake fa-5x" style="color:#D2691E;"></span>
    <p>Menu</p>
  </div>
  </a>

  <a href="<?=base_url('admin/galeri');?>" style="text-decoration: none;">
  <div class="menu m-4">
    <span class="far fa-images fa-5x" style="color:#6495ED;"></span>
    <p>Galeri</p>
  </div>
  </a>

  <a href="<?=base_url('admin/komentar');?>" style="text-decoration: none;">
  <div class="menu m-4">
    <span class="far fa-comments fa-5x" style="color:#20B2AA;"></span>
    <p>Komentar</p>
  </div>
  </a>

  <a href="<?=base_url('admin/email');?>" style="text-decoration: none;">
  <div class="menu m-4">
    <span class="fas fa-reply-all fa-5x" style="color:#7B68EE;"></span>
    <p>Email</p>
  </div>
  </a>
</center>

</div>

<!-- akun, menu, pre-order, galeri, komentar, langganan -->

<?= $this->endSection(); ?>