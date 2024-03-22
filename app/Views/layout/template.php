<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, shrink-to-fit=no">
    <meta name="description" content="Dapur Mama Ain [Pangkalan Berandan] | Menjual bermacam-macam kue kering/basah, Aneka bolu, Minuman, Kue raya, dan Menerima tempahan untuk berbagai acara.">
    <meta name="keyword" content="dapur mama ain, dapur mama, toko bolu pangkalan brandan, toko kue pangkalan brandan, nempah kue raya, pangkalan brandan, pangkalan berandan">
    <meta name="author" content="Muhammad Toffazal">

<!-- Untuk Chrome & Opera -->
<meta name="theme-color" content="#c8a2c8">
<!-- Untuk Windows Phone -->
<meta name="msapplication-navbutton-color" content="#c8a2c8">
<!-- Untuk Safari iOS -->
<meta name="apple-mobile-web-app-status-bar-style" content="#c8a2c8">

    <!-- Icon -->
    <link rel="shortcut icon" href="<?=base_url('public/icon.png');?>">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?=base_url('public/assets/css/bootstrap.css');?>">
    <link rel="stylesheet" href="<?=base_url('public/assets/css/style.css');?>">
    <link rel="stylesheet" href="<?=base_url('public/assets/css/slick.css');?>">
    <link rel="stylesheet" href="<?=base_url('public/assets/css/slick-theme.css');?>">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Serif:ital@1&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Teko:wght@300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Odibee+Sans&display=swap" rel="stylesheet">

    <!-- Fonts Awesome -->
    <link href="<?=base_url('public/assets/font-awesome/css/all.css');?>" rel="stylesheet">

    <!-- Wow JS -->
    <link href="https://dl.dropbox.com/s/dy890pni7k045na/animate.css?dl=0" rel="stylesheet" type="text/css">

    <title><?=$title;?></title>
  </head>
  <style>
    .bg-bwhite
    {
      background-color: #F2F2F2 !important;
    }

    .bg-lilac
    {
      background-color: #c8a2c8 !important;
    }

    .bg-pink
    {
      background-color: #FF69B4 !important;
    }

    .bg-pinks
    {
      background-color:#FF1493 !important;
    }

    .lilac
    {
      color: #c8a2c8 !important;
    }

    .bwhite
    {
      color: #F2F2F2 !important;
    }

    .pink
    {
      color: #FF69B4 !important;
    }

    .pinks
    {
      color:#FF1493 !important;
    }

    .judul
    {
      font-family: 'Noto Serif', serif;
      font-weight: bold;
    }

    .kotak
    {
      border-top:5px solid #c8a2c8 !important; 
      border-bottom:5px solid #c8a2c8 !important;
      margin-top:10px;
      padding:0px;
      text-align:center;
    }

    .sub-judul
    {
      font-family: arial;
      font-weight: bold;
    }

    .bold
    {
      font-weight: bold;
    }

    #menu
    {
      background-image:url(<?=base_url('public/assets/img/cookie.svg');?>); 
      background-size:100% 650px;
      background-repeat:no-repeat; 
      background-attachment:fixed;
    }

    #getKomentar
    {
      background:white;
      position: fixed;
      top:0px;
      bottom:0px;
      right:0px;
      left:0px;
      margin:0px;
      overflow: auto;
      z-index: 90;
    }

  </style>
  <body style="overflow-x: hidden;">



    <?= $this->renderSection('content');?>

    <!-- Footer -->
<footer id="kontak" class="footer m-0 px-4">

    <div class="row mb-0">
      <div id="langganan" class="col-lg-4">
        <div class="kotak py-2">
          <div data-wow-delay="1s" class="wow fadeInLeft">
          <i class="fas fa-envelope-open-text fa-2x d-inline me-3"></i><h5 class="d-inline">DAPATKAN PENAWARAN TERBARU</h5>
        </div>
        </div>
        <div class="card-body">
          <?php if(session()->getFlashdata('pesan')) : ?>
        <div class="alert alert-success alert-dismissible fade show mx-2" role="alert">
  <?= session()->getFlashdata('pesan'); ?>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
  <?php endif; ?>
          <form method="post" action="<?=base_url('home/berlangganan');?>">
          <input style="border-radius: 30px; font-size: 20px;" name="email" type="text" class="form-control p-2 <?= ($validation->hasError('email')) ? 'is-invalid' : ''; ?>" placeholder="Alamat email/No. Whatsapp">
          <div class="invalid-feedback">
            <?= $validation->getError('email'); ?>
          </div>
          <small>* Saya ingin menerima pemberitahuan tentang produk terbaru, pembukaan pre-order, dan permbaruan lainnya agar tidak ketinggalan info terkini.</small>
          <button style="border-radius: 30px;" type="submit" class="btn bg-pink text-white d-block mt-1 w-100">Submit</button>
          </form>
        </div>
      </div>
      <div class="col-lg-4">
        <div class="kotak py-2">
          <div data-wow-delay="1s" class="wow fadeInUp">
          <i class="far fa-clock fa-2x d-inline me-3"></i><h5 class="d-inline">JAM BUKA</h5>
        </div>
        </div>
        <div class="row">
        <div class="col">
          <p class="m-0">Senin</p>
          <p class="m-0">Selasa</p>
          <p class="m-0">Rabu</p>
          <p class="m-0">Kamis</p>
          <p class="m-0">Jumat</p>
          <p class="m-0">Sabtu</p>
          <p class="m-0">Minggu</p>
        </div>
        <div class="col">
          <p align="right" class="m-0">08:00 - 20:00 WIB</p>
          <p align="right" class="m-0">08:00 - 20:00 WIB</p>
          <p align="right" class="m-0">08:00 - 20:00 WIB</p>
          <p align="right" class="m-0">08:00 - 20:00 WIB</p>
          <p align="right" class="m-0">08:00 - 20:00 WIB</p>
          <p align="right" class="m-0">08:00 - 20:00 WIB</p>
          <p align="right" class="m-0">08:00 - 20:00 WIB</p>
        </div>
      </div>
      </div>
      <div class="col-lg-4">
        <div class="kotak py-2">
          <div data-wow-delay="1s" class="wow fadeInRight">
          <i class="far fa-address-book fa-2x d-inline me-3"></i><h5 class="d-inline">KONTAK</h5>
        </div>
        </div>
        <p class="my-0">Email: admin@dapurmamaain.xyz</p>
        <p class="my-0">Telepon: 0896-1332-5456</p>
        <p class="my-0">Alamat: Jln.Besitang, GG. Damai, Lr. Teratai, Pangkalan Berandan</p>
        <a style="color:#c8a2c8; font-weight: bold; display:block; margin-bottom:2px;" href="https://g.page/dapur-mama-ain?share" target="_blank">Lihat di google maps</a>
        <a href="https://wa.me/6289613325456?text=Saya tertarik dengan produk dapur mama ain" target="_blank"><i class="fab fa-whatsapp fa-2x text-success me-3"></i></a>
        <a href="https://www.instagram.com/dapur.mamaain/" target="_blank"><i style="color:#9932CC;" class="fab fa-instagram fa-2x me-3"></i></a>
        <a href="https://www.facebook.com/profile.php?id=100065245250634" target="_blank"><i class="fab fa-facebook fa-2x text-primary"></i></a>
        
      </div>
    </div>
</footer>
    <center>
      <a href="<?=base_url('menu');?>">
    <img class="m-0 p-0 lazyload" src="<?=base_url('public/assets/image-preview.png');?>" data-src="<?=base_url('public/assets/img/footer.png');?>" alt="dapur mama ain" width="350px" height="250px">
    </a>  
    </center>
    <script type="text/javascript">
      function hasil()
      {
        var harga = document.getElementById("harga").value ;
        var jumlah = document.getElementById("jumlah").value ;
        var total = harga * jumlah;
        document.getElementById("total").value = total;
      }
    </script>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="<?=base_url('public/assets/js/bootstrap.bundle.min.js');?>"></script>
    <script type="text/javascript" src="<?=base_url('public/assets/js/jquery.js');?>"></script>
    <script type="text/javascript" src="<?=base_url('public/assets/js/slick.min.js');?>"></script>
    <script type="text/javascript" src="<?=base_url('public/assets/js/lazysize.min.js');?>"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
     <script type="text/javascript">
    $(document).ready(function(){
    $('.menus').slick({
        slidesToShow: 2,
        infinite: true,
        dots: true,
        slidesToScroll: 1
      });
      
      $('.galeri').slick({
        slidesToShow: 1,
        infinite: true,
        dots: true,
        slidesToScroll: 1
      });
      
      $('.menuDekstop').slick({
        slidesToShow: 6,
        infinite: false,
        dots: true,
        slidesToScroll: 1
      });
      
//       Swal.fire({
//         imageUrl: '',
//         imageHeight: 500,
//         imageAlt: 'Daftar Menu Kue Raya Dapur Mama Ain'
// })

    });
  </script>

  <script type="text/javascript" src="<?=base_url('public/assets/js/search.js');?>"></script>
    <script type="text/javascript">
      $(document).ready(function(){
        $('table.search-table').tableSearch({
          searchPlaceHolder:'Search...'
        });
      });
    </script>


    <!-- WOW JS -->
    <script src="https://dl.dropbox.com/s/kqyr5w7ia2q7fkb/wow.js?dl=0" type="text/javascript"></script>
    <script>new WOW().init();</script>

  </body>
</html>