<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<nav class="navbar navbar-expand-lg navbar-light bg-light" style="position:fixed; top:0px; left:0px; right:0px; z-index:100;">
  <div class="container">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
    <a style="font-size: 28px;" class="navbar-brand lilac judul mx-0" href="<?=base_url();?>">Dapur Mama Ain</a>

    <img class="lilac d-lg-none mx-0" src="<?=base_url('public/icon.png');?>" style="width:48px; height:48px; border-radius:100%;">

    <div class="collapse navbar-collapse ms-4" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="<?=base_url();?>">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="<?=base_url('menu');?>">Menu</a>
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
    <img class="lilac d-none d-lg-block mx-0" src="<?=base_url('public/icon.png');?>" style="width:48px; height:48px; border-radius:100%;">     
  </div>
</nav>

<br><br>

<!-- MENU -->
<div class="px-1 py-2">

    <a style="font-size:20px; text-align:right;" class="pink nav-link mb-0 mt-2 me-1" data-bs-toggle="collapse" href="#kategori" role="button" aria-expanded="false" aria-controls="kategori"><?=$kategory;?> <i class="fas fa-sort"></i>
  </a>

    <div class="collapse" id="kategori">
      <center>
        <div class="col">
        <a href="<?=base_url('menu/bolu');?>" class="btn btn-outline-danger my-1">Bolu</a>
        <a href="<?=base_url('menu/roti');?>" class="btn btn-outline-danger my-1">Roti</a>
        <a href="<?=base_url('menu/kuebasah');?>" class="btn btn-outline-danger my-1">Kue Basah</a>
        </div>
        <div class="col">
        <a href="<?=base_url('menu/kuekering');?>" class="btn btn-outline-danger my-1">Kue Kering</a>
        <a href="<?=base_url('menu/kueraya');?>" class="btn btn-outline-danger my-1">Kue Raya</a>
        <a href="<?=base_url('menu/cemilan');?>" class="btn btn-outline-danger my-1">Cemilan</a>
      </div>
        </center>
      </div>
      
  <!-- Tampilan Untuk HP -->
  <?php foreach($data as $d) { ?>
  
  <a href="<?=base_url('menu/'.$d->slug);?>" style="text-decoration:none;">
    <!-- HP -->
  <div class="menu ms-2 my-2 d-md-none" style="width:46%;">
    <img src="<?=base_url('public/assets/img/'.$d->gambar);?>" width="100%" height="55%">
    <p style="overflow: hidden; display: -webkit-box; -webkit-line-clamp: 1; -webkit-box-orient: vertical;"><?=$d->nama;?></p>
    <span class="mx-2 lilac px-1" style="border:1px solid #c8a2c8; font-size:12px;">
      <?=$d->kategory;?>
    </span>
    <p class="harga mt-2" style="overflow: hidden; display: -webkit-box; -webkit-line-clamp: 1; -webkit-box-orient: vertical;">Rp<?=$d->harga;?></p>
    <?php if($d->keterangan) { ?>
    <span class="ms-2 mt-1 px-2 shadow-sm" style="font-size:13px; background-color:#FFD700; border-radius: 3px;  color:white; font-weight: normal;">
      <?=$d->keterangan;?>  
    </span>
    <?php } ?>
  </div>

  <!-- Dekstop -->
  <div class="menu ms-2 my-2 d-none d-md-inline-block" style="width:15.6%;">
    <img src="<?=base_url('public/assets/img/'.$d->gambar);?>" width="100%" height="55%">
    <p style="overflow: hidden; display: -webkit-box; -webkit-line-clamp: 1; -webkit-box-orient: vertical;"><?=$d->nama;?></p>
    <span class="mx-2 lilac px-1" style="border:1px solid #c8a2c8; font-size:12px;">
      <?=$d->kategory;?>
    </span>
    <p class="harga mt-2" style="overflow: hidden; display: -webkit-box; -webkit-line-clamp: 1; -webkit-box-orient: vertical;">Rp<?=$d->harga;?></p>
    <?php if($d->keterangan) { ?>
    <span class="ms-2 mt-1 px-2 shadow-sm" style="font-size:13px; background-color:#FFD700; border-radius: 3px;  color:white; font-weight: normal;">
      <?=$d->keterangan;?>  
    </span>
    <?php } ?>
  </div>
  </a>

  <?php } ?>
</div>
<!-- END MENU -->

<?= $this->endSection(); ?>