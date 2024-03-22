<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<nav class="navbar navbar-expand-lg navbar-light bg-light" style="position:fixed; top:0px; left:0px; right:0px; z-index:100;">
  <div class="container">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
    <a style="font-size: 28px;" class="navbar-brand lilac judul mx-0" href="<?=base_url();?>">Dapur Mama Ain</a>

    <img class="d-lg-none mx-0" src="<?=base_url('public/icon.png');?>" style="width:48px; height:48px; border-radius:100%;">

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
    <img class="d-none d-lg-block mx-0" src="<?=base_url('public/icon.png');?>" style="width:48px; height:48px; border-radius:100%;">     
  </div>
</nav>

<br><br><br>

<!-- MENU -->
<div class="bg-white px-3 py-2">

	<div class="row">

    <div class="col-lg-6 galeri">
        <div>  <img src="<?=base_url('public/assets/image-preview.png');?>" data-src="<?=base_url('public/assets/img/'.$data->gambar);?>" class="d-block w-100 mb-2 lazyload" style="border-radius: 15px; cursor: pointer;" onclick="window.location.href = '<?=base_url("public/assets/img/$data->gambar");?>'" height="270px"> </div>

    <?php foreach ($datag as $g)  { ?>
        <div>  <img src="<?=base_url('public/assets/image-preview.png');?>" data-src="<?=base_url('public/assets/'.$g->slug.'/'.$g->galeri);?>" class="d-block w-100 mb-2 lazyload" style="border-radius: 15px; cursor: pointer;" onclick="window.location.href = '<?=base_url("public/assets/$g->slug/$g->galeri");?>'" height="270px" alt="<?=$g->alt;?>"> </div>
    <?php } ?>
    </div>

<div class="col-lg-4">
    <h5><?=$data->nama;?> <font style="color:gray; margin-left:5px; font-size: 15px;">| <?php echo "$data->kategory | $data->keterangan";?></font></h5>
    <hr style="border-radius: 10px; height:3px;" class="mt-0 pinks">

    <p><b>Harga:</b> Rp<?=$data->harga;?></p>
    <p style="text-align:justify;"><?=$data->deskripsi;?></p>
    <hr style="border-radius: 10px; height:2px;" class="mt-0 pinks">

    <a href="https://wa.me/6289613325456?text=Saya ingin memesan <?= $data->nama; ?>" class="btn bg-pinks w-100 text-white" style="border-radius: 30px;">Pesan Sekarang</a>
</div>

</div>

<br><br>
</div>

<?php if(session()->getFlashdata('pesan')) : ?>
        <div class="alert alert-success alert-dismissible fade show mx-2" role="alert">
  <?= session()->getFlashdata('pesan'); ?>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
  <?php endif; ?>

  <?php if(session()->getFlashdata('danied')) : ?>
        <div class="alert alert-danger alert-dismissible fade show mx-2" role="alert">
  <?= session()->getFlashdata('danied'); ?>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
  <?php endif; ?>

<h5 class="ms-3"><i class="far fa-comments"></i> Komentar</h5>
<div id="komentar" style="border-top:2px solid #EE82EE; border-bottom:2px solid #EE82EE; border-radius:3px;margin-top:10px; padding:0px;">

	<?php foreach($komen as $k) { ?>
	<div id="isi" class="ps-2 pt-2 pb-1" style="border-bottom:1px solid gray;">
		<img src="<?=base_url('public/assets/img/'.$k->foto);?>" width="40px" height="40px" style="border-radius: 100%; border:2px solid #c8a2c8; display: inline-block; float:left;">
		<p class="d-inline-block ms-2"><?=$k->nama;?><br>
			<span class="py-0 px-1" style="border-radius:20px; font-size:12px; border:1px solid #FF1493; color:#FF1493;"><?=$k->tanggapan;?></span></p>
		<p class="mb-1 me-3" style="text-align:justify;"><?=$k->komentar;?></p>
		<p class="my-0 me-3" style="color:gray; font-size:14px; text-align: right;"><?=$k->tanggal;?></p>

  <?php foreach($balasan as $b) { ?>
    <div class="bg-light ms-2 me-3 my-1 p-2 <?= ($k->id == $b->id) ? '' : 'd-none'; ?>">
      <img src="<?=base_url('public/'.$b->gambar);?>" width="40px" height="40px" style="border-radius: 100%; border:2px solid #c8a2c8; display: inline-block; float:left;">
    <p class="d-inline-block ms-2"><?=$b->nama;?><br>
      <span class="py-0 px-1" style="border-radius:20px; font-size:12px; border:1px solid #FF1493; background:#FF1493; color:white;">Balasan</span></p>
    <p class="mb-1 me-3" style="text-align:justify;"><?=$b->balasan;?></p>
    <p class="my-0 me-3" style="color:gray; font-size:14px; text-align: right;"><?=$b->tanggal;?></p>

  <?php if(session()->has('email')) { ?>
    <center>
    <a href="<?=base_url('admin/editBalasan/'.$b->id);?>" class="btn btn-success d-inline-block mx-2 my-1" style="width:30%; border-radius: 50px;">Edit</a>
    <a href="<?=base_url('admin/hapusBalasan/'.$b->id);?>" class="btn btn-danger d-inline-block mx-2 my-1" style="width:30%; border-radius: 50px;" onclick="return confirm('Hapus komentar?');">Hapus</a>
    </center>
  <?php } ?>

    </div>
  <?php } ?>

  <?php if(session()->has('email')) { ?>
    <center>
    <a href="<?=base_url('admin/balas/'.$k->id);?>" class="btn btn-success d-inline-block mx-2 my-1" style="width:40%; border-radius: 50px;">Balas</a>
    <a href="<?=base_url('admin/hapusKomen/'.$k->id);?>" class="btn btn-danger d-inline-block mx-2 my-1" style="width:40%; border-radius: 50px;" onclick="return confirm('Hapus komentar?');">Hapus</a>
    </center>
  <?php } ?>

	</div>
	<?php } ?>

	<a style="font-size:20px; text-align:center;" class="pinks nav-link mb-0" data-bs-toggle="collapse" href="#getKomentar" role="button" aria-expanded="false" aria-controls="getKomentar"><?php if($komen == null){echo "Belum ada kommentar";}else{echo "Lihat semua komentar";}?></a>
    <div class="collapse" id="getKomentar">
    	<!-- ISI COLLAPSE -->
      <br><br><br>
      	<h5 class="ms-3 mt-3 d-inline-block"><i class="far fa-comments"></i> Komentar</h5>
      	<a style="font-size:15px; float:right;" class="pinks nav-link mb-0 mt-2 d-inline-block" data-bs-toggle="collapse" href="#getKomentar" role="button" aria-expanded="false" aria-controls="getKomentar">Tutup komentar</a>
      	<hr style="border-radius: 10px; height:3px;" class="mt-0 pinks">

  <?php foreach($komentar as $k) { ?>
	<div id="isi" class="ps-2 pt-2 pb-1" style="border-bottom:1px solid gray;">
		<img src="<?=base_url('public/assets/img/'.$k->foto);?>" width="40px" height="40px" style="border-radius: 100%; border:2px solid #c8a2c8; display: inline-block; float:left;">
		<p class="d-inline-block ms-2"><?=$k->nama;?><br>
		<span class="py-0 px-1" style="border-radius:20px; font-size:12px; border:1px solid #FF1493; color:#FF1493;"><?=$k->tanggapan;?></span></p>
		<p class="mb-1 me-3" style="text-align:justify;"><?=$k->komentar;?></p>
		<p class="my-0 me-3" style="color:gray; font-size:14px; text-align: right;"><?=$k->tanggal;?></p>

    <?php foreach($balasan as $b) { ?>
    <div class="bg-light ms-2 me-3 my-1 p-2 <?= ($k->id == $b->id) ? '' : 'd-none'; ?>">
      <img src="<?=base_url('public/'.$b->gambar);?>" width="40px" height="40px" style="border-radius: 100%; border:2px solid #c8a2c8; display: inline-block; float:left;">
    <p class="d-inline-block ms-2"><?=$b->nama;?><br>
      <span class="py-0 px-1" style="border-radius:20px; font-size:12px; border:1px solid #FF1493; background:#FF1493; color:white;">Balasan</span></p>
    <p class="mb-1 me-3" style="text-align:justify;"><?=$b->balasan;?></p>
    <p class="my-0 me-3" style="color:gray; font-size:14px; text-align: right;"><?=$b->tanggal;?></p>

  <?php if(session()->has('email')) { ?>
    <center>
    <a href="<?=base_url('admin/editBalasan/'.$b->id);?>" class="btn btn-success d-inline-block mx-2 my-1" style="width:30%; border-radius: 50px;">Edit</a>
    <a href="<?=base_url('admin/hapusBalasan/'.$b->id);?>" class="btn btn-danger d-inline-block mx-2 my-1" style="width:30%; border-radius: 50px;" onclick="return confirm('Hapus komentar?');">Hapus</a>
    </center>
  <?php } ?>

    </div>
  <?php } ?>

  <?php if(session()->has('email')) { ?>
    <center>
    <a href="<?=base_url('admin/balas/'.$k->id);?>" class="btn btn-success d-inline-block mx-2 my-1" style="width:40%; border-radius: 50px;">Balas</a>
    <a href="<?=base_url('admin/hapusKomen/'.$k->id);?>" class="btn btn-danger d-inline-block mx-2 my-1" style="width:40%; border-radius: 50px;" onclick="return confirm('Hapus komentar?');">Hapus</a>
    </center>
  <?php } ?>

	</div>
	<?php } ?>
	<center>
	<a style="font-size:20px;" class="pinks nav-link mb-0" data-bs-toggle="collapse" href="#getKomentar" role="button" aria-expanded="false" aria-controls="getKomentar">Tutup komentar</a>
	</center>
	<hr style="border-radius: 10px; height:3px;" class="my-0 pinks">
	<!-- END ISI COLLAPSE -->
    </div>

</div>

<br><br>

<!-- END MENU -->

<input id="id" type="hidden" name="id" value="<?= $data->id; ?>">

<script type="text/javascript" src="<?=base_url('public/assets/js/jquery.js');?>"></script>

<script>
  function kirim()
  {
    var id = document.getElementById("id").value;
    $.post("<?=base_url('menu/kunjungan');?>", {id:id});
  }
        
kirim();    
</script>

<?= $this->endSection(); ?>