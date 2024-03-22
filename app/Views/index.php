<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<nav class="navbar navbar-expand-lg navbar-light bg-light" style="position:fixed; top:0px; left:0px; right:0px; z-index:100;">
  <div class="container">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
    <a style="font-size: 28px;" class="navbar-brand lilac judul mx-0" href="">Dapur Mama Ain</a>

    <img class="d-lg-none mx-0" src="<?=base_url('public/icon.png');?>" style="width:48px; height:48px; border-radius:100%;">

    <div class="collapse navbar-collapse ms-4" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="<?=base_url();?>">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#menu">Menu</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#terlaris">Terlaris</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#kontak">Kontak</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?=base_url('komentar');?>">Komentar</a>
        </li>
        <?php if(session()->has('email')) { ?>
          <li class="nav-item">
            <a class="nav-link" href="<?=base_url('admin/logout');?>">Logout</a>
          </li>
        <?php } ?>
      </ul>
    </div>
    <img class="d-none d-lg-block mx-0" src="<?=base_url('public/icon.png');?>" style="width:48px; height:48px; border-radius:100%;">
  </div>
</nav>

<br><br><br>

<!-- Carousel Untuk Dekstop -->
<div id="carouselExampleCaptions" class="carousel slide d-none d-lg-block" data-bs-ride="carousel">
  <div style="height:70%;" class="carousel-inner">
    <div class="carousel-item active">
      <img src="<?=base_url('public/assets/image-preview.png');?>" data-src="<?=base_url('public/assets/banner-home.png');?>" class="d-block w-100 h-100 lazyload" alt="Dapur Mama Ain">
    </div>
    <div class="carousel-item">
      <img src="<?=base_url('public/assets/image-preview.png');?>" data-src="<?=base_url('public/assets/bolu ulang tahun.png');?>" class="d-block w-100 h-100 lazyload" alt="bolu ulang tahun">
    </div>
    <div class="carousel-item">
      <img src="<?=base_url('public/assets/image-preview.png');?>" data-src="<?=base_url('public/assets/kue sepit.png');?>" class="d-block w-100 h-100 lazyload" alt="kue sepit">
    </div>
      <div class="carousel-item">
      <img src="<?=base_url('public/assets/image-preview.png');?>" data-src="<?=base_url('public/assets/kue sepit coklat.png');?>" class="d-block w-100 h-100 lazyload" alt="kue sepit">
    </div>
    <div class="carousel-item">
      <img src="<?=base_url('public/assets/image-preview.png');?>" data-src="<?=base_url('public/assets/bolu pandan.png');?>" class="d-block w-100 h-100 lazyload" alt="Donat lumer coklat">
  </div>
  <div class="carousel-item">
      <img src="<?=base_url('public/assets/image-preview.png');?>" data-src="<?=base_url('public/assets/donat.png');?>" class="d-block w-100 h-100 lazyload" alt="Donat lumer coklat">
  </div>
  <div class="carousel-item">
      <img src="<?=base_url('public/assets/image-preview.png');?>" data-src="<?=base_url('public/assets/bingka pandan.png');?>" class="d-block w-100 h-100 lazyload" alt="Bingka pandan">
  </div>
</div>
<br>
<div style="position:relative;">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="3" aria-label="Slide 4"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="4" aria-label="Slide 5"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="5" aria-label="Slide 6"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="6" aria-label="Slide 7"></button>
  </div>
</div>
</div>




<!-- Carousel Untuk HP -->
<div id="carouselExampleCaptions" class="carousel slide d-xl-none d-lg-none" data-bs-ride="carousel">
  <div style="height:35%;" class="carousel-inner">
    <div class="carousel-item active">
      <img src="<?=base_url('public/assets/image-preview.png');?>" data-src="<?=base_url('public/assets/banner-home.png');?>" class="d-block w-100 h-100 lazyload" alt="Dapur Mama Ain">
    </div>
    <div class="carousel-item">
      <img src="<?=base_url('public/assets/image-preview.png');?>" data-src="<?=base_url('public/assets/bolu ulang tahun.png');?>" class="d-block w-100 h-100 lazyload" alt="bolu ulang tahun">
    </div>
    <div class="carousel-item">
      <img src="<?=base_url('public/assets/image-preview.png');?>" data-src="<?=base_url('public/assets/kue sepit.png');?>" class="d-block w-100 h-100 lazyload" alt="kue sepit">
    </div>
      <div class="carousel-item">
      <img src="<?=base_url('public/assets/image-preview.png');?>" data-src="<?=base_url('public/assets/kue sepit coklat.png');?>" class="d-block w-100 h-100 lazyload" alt="kue sepit">
    </div>
    <div class="carousel-item">
      <img src="<?=base_url('public/assets/image-preview.png');?>" data-src="<?=base_url('public/assets/bolu pandan.png');?>" class="d-block w-100 h-100 lazyload" alt="Donat lumer coklat">
  </div>
  <div class="carousel-item">
      <img src="<?=base_url('public/assets/image-preview.png');?>" data-src="<?=base_url('public/assets/donat.png');?>" class="d-block w-100 h-100 lazyload" alt="Donat lumer coklat">
  </div>
  <div class="carousel-item">
      <img src="<?=base_url('public/assets/image-preview.png');?>" data-src="<?=base_url('public/assets/bingka pandan.png');?>" class="d-block w-100 h-100 lazyload" alt="Bingka pandan">
  </div>
</div>
<br>
<div style="position:relative;">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="3" aria-label="Slide 4"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="4" aria-label="Slide 5"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="5" aria-label="Slide 6"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="6" aria-label="Slide 7"></button>
  </div>
</div>
</div>

<br><br>
<!--Spesial Raya-->
<center><a href="<?= base_url('menu/kueraya'); ?>"><img class="lazyload" src="<?= base_url('public/assets/image-preview.png'); ?>" data-src="<?= base_url('public/assets/banner.gif'); ?>" width="90%" height="100px"></a></center>
<br>

<!-- HP -->
    <div class="menus d-lg-none">
        <?php foreach($raya as $d) { ?>
        <div class="menu mx-2 my-2 d-lg-none" style="height: 250px;" onclick="window.location.href = '<?= base_url("menu/$d->slug"); ?>'">
        <img class="lazyload" src="<?=base_url('public/assets/image-preview.png');?>" data-src="<?=base_url('public/assets/img/'.$d->gambar);?>" width="100%" height="55%">
        <p style="overflow: hidden; display: -webkit-box; -webkit-line-clamp: 1; -webkit-box-orient: vertical;"><?=$d->nama;?></p>
        <span class="mx-2 lilac px-1" style="border:1px solid #c8a2c8; font-size:12px;">
            <?=$d->kategory;?>
        </span>
        <p class="harga mt-2" style="overflow: hidden; display: -webkit-box; -webkit-line-clamp: 1; -webkit-box-orient: vertical;">Rp<?=$d->harga;?></p>
        <span class="ms-2 mt-1 px-2 shadow-sm" style="font-size:13px; background-color:#FFD700; border-radius: 3px;  color:white; font-weight: normal;">
        <?=$d->keterangan;?>  
        </span>
        </div>
        <?php } ?>
    </div>

 <?php foreach($raya as $d) { ?>
  <!-- Dekstop -->
  <div class="menu ms-2 my-2 d-none d-lg-inline-block" style="width:15.6%;" onclick="window.location.href = '<?= base_url("menu/$d->slug"); ?>'">
    <img class="lazyload" src="<?=base_url('public/assets/image-preview.png');?>" data-src="<?=base_url('public/assets/img/'.$d->gambar);?>" width="100%" height="55%">
    <p style="overflow: hidden; display: -webkit-box; -webkit-line-clamp: 1; -webkit-box-orient: vertical;"><?=$d->nama;?></p>
    <span class="mx-2 lilac px-1" style="border:1px solid #c8a2c8; font-size:12px;">
      <?=$d->kategory;?>
    </span>
    <p class="harga mt-2" style="overflow: hidden; display: -webkit-box; -webkit-line-clamp: 1; -webkit-box-orient: vertical;">Rp<?=$d->harga;?></p>
    <span class="ms-2 mt-1 px-2 shadow-sm" style="font-size:13px; background-color:#FFD700; border-radius: 3px;  color:white; font-weight: normal;">
      <?=$d->keterangan;?>  
    </span>
  </div>
  
  <?php } ?>
  
  <div class="menu pt-2 ms-2 my-2 d-none d-lg-inline-block" style="width:15.6%; height: 250px;" onclick="window.location.href = '<?= base_url("menu/kueraya"); ?>'">
    <h1 class="text-center pinks" style="margin-top: 50px;">Lihat Semua</h1>
  </div>


<!-- MENU -->

  <div id="menu">
    <center>
      <hr class="pinks mx-2" size="5px" width="90%">
      <h2 class="sub-judul mt-3 wow fadeInUp">MENU</h2>
      <hr class="pinks mx-2" size="5px" width="90%">
    </center>

    <center>
    <a href="<?=base_url('menu/bolu');?>">
      <img style="border-radius:30px;" class="d-inline-block mx-1 mb-2 lazyload" data-wow-delay="1s" src="<?=base_url('public/assets/image-preview.png');?>" data-src="<?=base_url('public/assets/img/bolu.jpg');?>" height="160px" width="160px"> 
     </a>

     <a href="<?=base_url('menu/roti');?>">
      <img style="border-radius:30px;" class="d-inline-block mx-1 mb-2 lazyload" src="<?=base_url('public/assets/image-preview.png');?>" data-src="<?=base_url('public/assets/img/roti.jpg');?>" height="160px" width="160px"> 
    </a>

    <a href="<?=base_url('menu/kuebasah');?>">
      <img style="border-radius:30px;" class="d-inline-block mx-1 mb-2 lazyload" src="<?=base_url('public/assets/image-preview.png');?>" data-src="<?=base_url('public/assets/img/kue basah.jpg');?>" height="160px" width="160px">
    </a>

    <a href="<?=base_url('menu/kuekering');?>">
      <img style="border-radius:30px;" class="d-inline-block mx-1 mb-2 lazyload" src="<?=base_url('public/assets/image-preview.png');?>" data-src="<?=base_url('public/assets/img/kue kering.jpg');?>" height="160px" width="160px">
    </a>

    <a href="<?=base_url('menu/kueraya');?>">
      <img style="border-radius:30px;" class="d-inline-block mx-1 mb-2 lazyload" src="<?=base_url('public/assets/image-preview.png');?>" data-src="<?=base_url('public/assets/img/kue raya.jpg');?>" height="160px" width="160px">
    </a>  

    <a href="<?=base_url('menu/cemilan');?>">
      <img style="border-radius:30px;" class="d-inline-block mx-1 mb-2 lazyload" src="<?=base_url('public/assets/image-preview.png');?>" data-src="<?=base_url('public/assets/img/cemilan.jpg');?>" height="160px" width="160px">
    </a>

    <a href="<?=base_url('menu');?>" class="d-none d-md-inline-block" style="text-decoration:none;">
    <div id="lihat semua" class="d-inline-block bg-pinks shadow semua">
      <br>
      <p>LIHAT SEMUA</p> 
      <i class="fas fa-ellipsis-h fa-3x text-white"></i>
    </div>
    </a>
    </center>

    <!-- HP -->
    <center>
    <a href="<?=base_url('menu');?>" style="text-decoration:none;">
    <div id="lihat semua" class="position-relative d-inline-block bg-pink shadow d-xl-none d-md-none" style="width:250px; height:160px; border-radius: 30px;">
      <i style="bottom:30px; left:100px;" class="fas fa-ellipsis-h fa-3x text-white position-absolute"></i>
      <p style="position:absolute; top:45px; left:43px; color:white; font-family:arial; font-size:25px; font-weight:bold;">LIHAT SEMUA</p> 
    </div>
   </a>
   </center>
   <!-- HP -->

  </div>
<!-- END MENU -->


<!-- PRODUK TERLARIS -->
<div id="terlaris" class="w-100 bg-pinks shadow-sm text-white mt-2" style="height:30px; font-family:arial;">
  <i style="color:#FFD700;" class="fas fa-fire d-inline ms-3 shadow wow fadeInLeft" data-wow-delay="1s"></i><p style="vertical-align: middle;" class="fs-4 d-inline wow fadeInLeft" data-wow-delay="1s"> PRODUK TERLARIS</p>
</div>

   
    <!-- HP -->
    <div class="menus d-lg-none">
        <?php foreach($data as $d) { ?>
        <div class="menu mx-2 my-2 d-lg-none" style="height: 250px;">
        <img class="lazyload" src="<?=base_url('public/assets/image-preview.png');?>" data-src="<?=base_url('public/assets/img/'.$d->gambar);?>" width="100%" height="55%">
        <p style="overflow: hidden; display: -webkit-box; -webkit-line-clamp: 1; -webkit-box-orient: vertical;"><?=$d->nama;?></p>
        <span class="mx-2 lilac px-1" style="border:1px solid #c8a2c8; font-size:12px;">
            <?=$d->kategory;?>
        </span>
        <p class="harga mt-2" style="overflow: hidden; display: -webkit-box; -webkit-line-clamp: 1; -webkit-box-orient: vertical;">Rp<?=$d->harga;?></p>
        <span class="ms-2 mt-1 px-2 shadow-sm" style="font-size:13px; background-color:#FFD700; border-radius: 3px;  color:white; font-weight: normal;">
        TERLARIS  
        </span>
        </div>
        <?php } ?>
    </div>

 <?php foreach($data as $d) { ?>
  <!-- Dekstop -->
  <a href="<?=base_url('menu/'.$d->slug);?>" style="text-decoration:none;">
  <div class="menu ms-2 my-2 d-none d-lg-inline-block" style="width:15.6%;">
    <img class="lazyload" src="<?=base_url('public/assets/image-preview.png');?>" data-src="<?=base_url('public/assets/img/'.$d->gambar);?>" width="100%" height="55%">
    <p style="overflow: hidden; display: -webkit-box; -webkit-line-clamp: 1; -webkit-box-orient: vertical;"><?=$d->nama;?></p>
    <span class="mx-2 lilac px-1" style="border:1px solid #c8a2c8; font-size:12px;">
      <?=$d->kategory;?>
    </span>
    <p class="harga mt-2" style="overflow: hidden; display: -webkit-box; -webkit-line-clamp: 1; -webkit-box-orient: vertical;">Rp<?=$d->harga;?></p>
    <span class="ms-2 mt-1 px-2 shadow-sm" style="font-size:13px; background-color:#FFD700; border-radius: 3px;  color:white; font-weight: normal;">
      TERLARIS  
    </span>
  </div>
  </a>

  <?php } ?>
  
<!-- END PRODUK TERLARIS -->
<?= $this->endSection(); ?>