<html>
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
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
    <link rel="stylesheet" href="<?=base_url('public/assets/css/admin.css');?>">
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

    .menu
    {
    	width:110px;
    	height:110px;
    	border-radius: 100%;
    	display:inline-block;
    	border:4px solid #FF1493;
    	overflow: hidden;
    	padding:0px;
    	background:white;
    }

    .menu p
    {
    	color:white;
    	background:#FF1493;
    	padding:0px;
    }

    .bold
    {
      font-weight: bold;
    }

  </style>
  <body>

 <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
    <a style="font-size: 27px;" class="navbar-brand lilac judul mx-0" href="<?=base_url();?>">Dapur Mama Ain</a>

    <img class="d-sm-none mx-0" src="<?=base_url('public/icon.png');?>" style="width:48px; height:48px; border-radius:100%;">

      <?= $this->renderSection('nav'); ?>
    
    <img class="d-none d-md-block mx-0" src="<?=base_url('public/icon.png');?>" style="width:48px; height:48px; border-radius:100%;">
  </div>
</nav>

    <?= $this->renderSection('content');?>

    <br><br>

    <footer class="w-100 bg-light py-4" style="text-align:center; font-size:15px; color:black;">Copyright Dapur Mama Ain</footer>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="<?=base_url('public/assets/js/bootstrap.bundle.min.js');?>"></script>
    <script type="text/javascript" src="<?=base_url('public/assets/js/jquery.js');?>"></script>
    <script type="text/javascript" src="<?=base_url('public/assets/js/slick.min.js');?>"></script>
    
     <script type="text/javascript">
    $(document).ready(function(){
    $('.menus').slick({
        slidesToShow: 1,
        infinite: true,
        dots: true,
        slidesToScroll: 1
      });

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