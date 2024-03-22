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

<a href="<?=base_url('admin/email');?>" class="btn bg-pinks ms-2 text-white mb-2">Kirim email</a>

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
  
  <table class="table table-bordered bg-white container-fluid mb-4">
  <thead>
    <tr align="center">
      <th scope="col">No</th>
      <th scope="col">Email</th>
      <th scope="col">Tanggal</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
      <?php $i=1; foreach($data as $d) { ?>
    <tr>
      <th scope="row" style="text-align: center; vertical-align: middle;"><?= $i++ ;?></th>
      <td class="p-2 bold" style="vertical-align: middle;"><?= $d->email; ?></td>
      <td class="p-2" style="vertical-align: middle;"><?= $d->tanggal; ?></td>
      <td class="pt-4"><center>
        <a href="<?=base_url('admin/hapusLangganan/'.$d->id);?>" class="btn btn-danger d-block mx-1" onclick="return confirm('Hapus email pelanggan?');">Hapus</a>
      </center></td>
    </tr>
      <?php } ?>
  </tbody>
</table>

<!-- akun, menu, pre-order, galeri, komentar, langganan -->

<?= $this->endSection(); ?>