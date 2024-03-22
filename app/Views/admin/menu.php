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
          <a class="nav-link active" href="<?=base_url('admin/menu');?>">Menu</a>
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

<br>

<a href="<?=base_url('admin/tambahMenu');?>" class="btn bg-pinks ms-2 text-white mb-2">Tambah menu</a>

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
  
  <table class="table table-bordered bg-white search-table mb-4">
  <thead>
    <tr align="center">
      <th scope="col">No</th>
      <th scope="col">Gambar</th>
      <th scope="col">Nama</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
      <?php $i=1; foreach($data as $d) { ?>
    <tr>
      <th scope="row" style="text-align: center; vertical-align: middle;"><?= $i++ ;?></th>
      <td><center><img src="<?=base_url('public/assets/img/'.$d->gambar);?>" width="80px" height="80px"></center></td>
      <td class="p-2"><?= $d->nama; ?></td>
      <td class="pt-4"><center>
        <a href="<?=base_url('admin/menu/'.$d->slug);?>" class="btn bg-pink text-white d-inline me-1">Edit</a>
        <form action="<?= base_url('admin/hapusMenu/'.$d->id);?>" method="post" class="d-inline">
          <input type="hidden" name="_method" value="DELETE">
          <button type="submit" class="btn btn-danger ms-1" onclick="return confirm('Hapus menu?')">Hapus</button>
        </form>
      </center></td>
    </tr>
      <?php } ?>
  </tbody>
</table>

<!-- akun, menu, pre-order, galeri, komentar, langganan -->

<?= $this->endSection(); ?>