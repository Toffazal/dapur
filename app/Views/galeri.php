<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<nav class="navbar navbar-expand-lg navbar-light bg-white" style="position:fixed; top:0px; left:0px; right:0px; z-index:100;">
  <div class="container">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
    <a style="font-size: 28px;" class="navbar-brand lilac judul mx-0" href="">Dapur Mama Ain</a>

    <img class="d-lg-none mx-0" src="<?=base_url('public/icon.png');?>" style="width:48px; height:48px; border-radius:100%;">

    <div class="collapse navbar-collapse ms-5" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="<?=base_url();?>">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?=base_url('menu');?>">Menu</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?=base_url('order');?>">Pre-Order</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="<?=base_url('home/galeri');?>">Galeri</a>
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

<br><br>

<div class="container-fluid">
<br>
<center>

	<h1 class="pinks" style="font-size: 55px; font-family: 'Odibee Sans', cursive;" align="center">Galeri</h1>

  <?php foreach($data as $d) { ?>
  	<img class="mb-2" src="<?=base_url('public/assets/'.$d->slug.'/'.$d->galeri);?>" width="350px" height="300px" onclick="window.location.href = '<?=base_url("public/assets/$d->slug/$d->galeri");?>'">
  <?php } ?>

</center>

</div>

<!-- akun, menu, pre-order, galeri, komentar, langganan -->

<?= $this->endSection(); ?>