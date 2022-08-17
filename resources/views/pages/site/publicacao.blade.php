<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <!-- <meta content="width=device-width, initial-scale=1.0" name="viewport"> -->
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />

  <title>Educação para o Futuro</title>



    <!-- Palavras chave -->
    <meta name="keywords" content="Educação, Futuro" />
    

<!-- Descrição do site -->

    <meta name="description" content="{{$publicacoes->pub_texto}}"/>
    <meta name="theme-color" content="#66619c">
    <meta name="author" content="pitter775@gmail.com">

    <meta property="og:site_name" content="Educação para o Futuro">
    <meta property="og:title" content="{{$publicacoes->pub_titulo}}">
    <meta property="og:description" content="{{$publicacoes->pub_texto}}"/>
    <meta property="og:type" content="website"/>
    <meta property="og:locale" content="pt_BR"/>    
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://educacaofuturo.org.br/">
    <meta property="og:image:type" content="image/jpeg">
    <meta property="og:image" content="https://educacaofuturo.org.br/paper/assets/img/logo_preto3.png" />
    
  <!-- Favicons -->
  <link href="{{ asset('paper') }}/assets/img/icon_logo.png" rel="icon">
  <link href="{{ asset('paper') }}/assets/img/icon_logo.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200&family=Nunito:ital,wght@0,300;0,500;1,200;1,900&family=Quicksand:wght@300&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('paper') }}/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="{{ asset('paper') }}/assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="{{ asset('paper') }}/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="{{ asset('paper') }}/assets/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="{{ asset('paper') }}/assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="{{ asset('paper') }}/assets/vendor/aos/aos.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{ asset('paper') }}/assets/css/style.css" rel="stylesheet">

</head>

<body>


  <style>
    a.linkpub{ color: #777; font-family: "Open Sans", sans-serif !important; font-size: 13px; margin-top: -10px}
    a.linkpub:hover{ color: #fff;}
    .icon-box2{ padding: 10px !important}
    img{ padding: 5px; margin: 10px;     box-shadow: 0 0 29px 0 rgb(68 88 144 / 12%);}
    h3 {   font-family: "Nunito"; font-weight: 500;}
  </style>


  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top header-transparent">
    <div class="container d-flex align-items-center">

      <div class="logo mr-auto">
        <h1 class="text-light"><img src="{{ asset('paper') }}/img/logo_edu.png" alt="" class="img-fluid" style="margin-right: 20px;"><a href="index.html"></a> </h1>
        <!-- Uncomment below if you prefer to use an image logo -->
      </div>
 
      <nav class="nav-menu d-none d-lg-block">
        <ul>
          <li class="active"><a href="https://educacaofuturo.org.br">Home</a></li>
          <li><a href="https://educacaofuturo.org.br##about">Quem Somos</a></li>
          <li><a href="https://educacaofuturo.org.br#publicacao">Publicações</a></li>
          <li><a href="https://educacaofuturo.org.br#services">Projetos</a></li>
          <li><a href="https://educacaofuturo.org.br#portfolio">Fotos</a></li>
          <li><a href="https://educacaofuturo.org.br#contact">Contato</a></li>
          <li><a href="https://educacaofuturo.org.br/login" title="Entrar no sistema" style="padding: 15px 15px" ><i class=" icofont-gnome icofont-2x"></i></a></li>
        </ul>
      </nav><!-- .nav-menu -->
    </div>
  </header><!-- End Header -->



  <main id="main">

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container">

        <div class="row" style="margin-top: -70px">
          <div class="col-md-12" style="background-color: rgba(255, 255, 255, 0.623); box-shadow: 0 0 29px 0 rgb(68 88 144 / 12%); padding: 40px 30px">
            <h3 style="text-align: center">{{$publicacoes->pub_titulo}}</h3>
            <p>{!! $publicacoes->pub_texto ?? '' !!}</p>
          </div>
        </div>

      </div>
    </section><!-- End About Section -->


  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">
          <div class="col-lg-4 col-md-4">            
            <div data-aos="fade-up" data-aos-delay="50">
            <img src="{{ asset('paper') }}/assets/img/lgo-g.png" alt="" class="imgfooter" style="width: 200px; display: inline;">
              <br>
    
            </div>
          </div>

          <div class="col-md-4 footer-links" data-aos="fade-up" data-aos-delay="150">
            <h4>Instituto Educação para o Futuro</h4>
            <p>11 4257-2198<br>
              secretaria@educacaofuturo.org.br<br>
              R: Duque de Caixias - 241<br>
              Centro - Barueri - SP</p>
          </div>

          <div class="col-md-4 footer-links" data-aos="fade-up" data-aos-delay="250">
            <img src="{{ asset('paper') }}/assets/img/logo-pmsp.png" alt="" style="display: inline; width: 80px">
            <img src="{{ asset('paper') }}/assets/img/capa_2_1.gif" alt="" style="display: inline; width: 80px"><br><br>
            <img src="{{ asset('paper') }}/assets/img/objetivo.png" alt="" style="display: inline;width: 180px">
          </div>
        </div>
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{ asset('paper') }}/assets/vendor/jquery/jquery.min.js"></script>
  <script src="{{ asset('paper') }}/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="{{ asset('paper') }}/assets/vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="{{ asset('paper') }}/assets/vendor/php-email-form/validate.js"></script>
  <script src="{{ asset('paper') }}/assets/vendor/waypoints/jquery.waypoints.min.js"></script>
  <script src="{{ asset('paper') }}/assets/vendor/counterup/counterup.min.js"></script>
  <script src="{{ asset('paper') }}/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="{{ asset('paper') }}/assets/vendor/venobox/venobox.min.js"></script>
  <script src="{{ asset('paper') }}/assets/vendor/owl.carousel/owl.carousel.min.js"></script>
  <script src="{{ asset('paper') }}/assets/vendor/aos/aos.js"></script>

  <!-- Template Main JS File -->
  <script src="{{ asset('paper') }}/assets/js/main.js"></script>

</body>

</html>