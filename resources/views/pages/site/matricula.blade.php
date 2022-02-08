<!DOCTYPE html>
<!--
Template Name: Vuexy - Vuejs, HTML & Laravel Admin Dashboard Template
Author: PixInvent
Website: http://www.pixinvent.com/
Contact: hello@pixinvent.com
Follow: www.twitter.com/pixinvents
Like: www.facebook.com/pixinvents
Purchase: https://1.envato.market/vuexy_admin
Renew Support: https://1.envato.market/vuexy_admin
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.

-->
<html class="loading" lang="en" data-textdirection="ltr">
  <!-- BEGIN: Head-->
  <head>
    <meta charset="utf-8">
    <!-- <meta content="width=device-width, initial-scale=1.0" name="viewport"> -->
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  
    <title>Matricula - Educação para o Futuro</title>
  
  
  
    <!-- Palavras chave -->
    <meta name="keywords" content="Educação, Futuro" />
      
  
  <!-- Descrição do site -->
  
      <meta name="description" content="Qualquer esforço pela educação é um sonho de sociedade mais justa."/>
      <meta name="theme-color" content="#66619c">
      <meta name="author" content="pitter775@gmail.com">
  
      <meta property="og:site_name" content="Educação para o Futuro">
      <meta property="og:title" content="Instituto Educação para o Futuro">
      <meta property="og:description" content="Matrículas abertas!"/>
      <meta property="og:type" content="website"/>
      <meta property="og:locale" content="pt_BR"/>    
      <meta property="og:type" content="website">
      <meta property="og:url" content="http://educacaofuturo.org.br/">
      <meta property="og:image:type" content="image/jpeg">
      <meta property="og:image" content="https://educacaofuturo.org.br/paper/assets/img/logo_preto3.png" />
      
    <!-- Favicons -->
    <link href="{{ asset('paper') }}/assets/img/icon_logo_ge.png" rel="icon">
    <link href="{{ asset('paper') }}/assets/img/icon_logo_ge.png" rel="apple-touch-icon">
  

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/vendors.min.css">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/bootstrap-extended.min.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/colors.min.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/components.min.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/themes/dark-layout.min.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/themes/bordered-layout.min.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/themes/semi-dark-layout.min.css">

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/core/menu/menu-types/vertical-menu.min.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/plugins/forms/form-validation.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/pages/page-auth.min.css">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="../../../assets/css/style.css">
    <!-- END: Custom CSS-->

  </head>
  <!-- END: Head-->

  <!-- BEGIN: Body-->
  <body class="vertical-layout vertical-menu-modern blank-page navbar-floating footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="blank-page">
    <!-- BEGIN: Content-->
    <div class="app-content content ">
      <div class="content-overlay"></div>
      <div class="header-navbar-shadow"></div>
      <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">
          <div class="auth-wrapper auth-v2">
            <div class="auth-inner row m-0">
              <!-- Brand logo--><a class="brand-logo" href="javascript:void(0);">
                <img src="{{ asset('assets') }}/img/ge_logo.png" alt="" width="80" class="img-fluid">
                </a>
              <!-- /Brand logo-->
              <!-- Left Text-->
              <div class="d-none d-lg-flex col-lg-8 align-items-center p-5">
                <div class="w-100 d-lg-flex align-items-center justify-content-bottom">
                        <img class="img-fluid" src="{{ asset('app-assets') }}/images/register.jpg" alt="Register V2"/>
                </div>
              </div>
              <!-- /Left Text-->
              <!-- Register-->
              <div class="d-flex col-lg-4 align-items-center auth-bg px-2 p-lg-5">
                <div class="col-12 col-sm-8 col-md-6 col-lg-12 px-xl-2 mx-auto">
                        
                  <h2 class="card-title font-weight-bold mb-1">Matrículas Abertas!</h2>
                  <p class="card-text mb-2">Insira seu email para receber o link de cadastro ou continuar uma matrícula em andamento.</p>
                  <form class="auth-register-form mt-2" action="index.html" method="POST">
               
                    <div class="form-group">
                      <label class="form-label" for="register-email">Email</label>
                      <input class="form-control" id="register-email" type="text" name="register-email" placeholder="nome@gmail.com" aria-describedby="register-email" tabindex="2"/>
                    </div>
                   
                    <button class="btn btn-primary btn-block" tabindex="5">Enviar</button>
                  </form>

                  <div style="height: 30px" ></div>

                  <div class="">
                    <div class="card card-profile">
                    <img
                        src="{{asset('app-assets/images/banner-escola.jpg')}}"
                        class="img-fluid card-img-top"
                        alt="Profile Cover Photo"
                    />
                    <div class="card-body">
                        <div class="profile-image-wrapper">
                            <div class="profile-image">
                                <div class="avatar">
                                    <img src="{{asset('app-assets/images/escola-drummond.png')}}" />
                                </div>
                            </div>
                        </div>
                        <h3>Carlos Drummond de Andrade</h3>
                        <h6 class="text-muted">Chácara Solar Jaguari Santana do Parnaíba</h6>

                        <hr class="mb-2" />
                        <div class="d-flex justify-content-between align-items-center">

                        </div>
                    </div>
                    </div>
                </div>

                
  
                  
                </div>
                
              </div>
              <!-- /Register-->
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- END: Content-->


    <!-- BEGIN: Vendor JS-->
    <script src="../../../app-assets/vendors/js/vendors.min.js"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="../../../app-assets/vendors/js/forms/validation/jquery.validate.min.js"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="../../../app-assets/js/core/app-menu.min.js"></script>
    <script src="../../../app-assets/js/core/app.min.js"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="../../../app-assets/js/scripts/pages/page-auth-register.min.js"></script>
    <!-- END: Page JS-->

    <script>
      $(window).on('load',  function(){
        if (feather) {
          feather.replace({ width: 14, height: 14 });
        }
      })
    </script>
  </body>
  <!-- END: Body-->
</html>