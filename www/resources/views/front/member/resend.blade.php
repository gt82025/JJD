<!DOCTYPE html>
<html lang="zh-Hant">
<head>
<!-- Meta Tags
    ============================================= -->
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="Majesty by creative-wp - Responsive HTML5 template">
<meta name="author" content="creative-wp">
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<!-- Your Title Page
    ============================================= -->
<title>{{$meta->title}}</title>
<!-- Favicon Icons
     ============================================= -->
<link rel="shortcut icon" href="{{ URL::asset('img/favicon/favicon.ico') }}">
<!-- Standard iPhone Touch Icon-->
<link rel="apple-touch-icon" sizes="57x57" href="{{ URL::asset('img/favicon/apple-touch-icon-57x57.png') }}">
<!-- Retina iPhone Touch Icon-->
<link rel="apple-touch-icon" sizes="114x114" href="{{ URL::asset('img/favicon/apple-touch-icon-114x114.png') }}">
<!-- Standard iPad Touch Icon-->
<link rel="apple-touch-icon" sizes="72x72" href="{{ URL::asset('img/favicon/apple-touch-icon-72x72.png') }}">
<!-- Retina iPad Touch Icon-->
<link rel="apple-touch-icon" sizes="144x144" href="{{ URL::asset('img/favicon/apple-touch-icon-144x144.png') }}">
<!-- Bootstrap Links
     ============================================= -->
<!-- Bootstrap CSS  -->
<link rel="stylesheet" href="{{ URL::asset('bootstrap/css/bootstrap.min.css') }}" >
<!-- Plugins
     ============================================= -->
<!-- Owl Carousal -->
<link rel="stylesheet" href="{{ URL::asset('stylesheets/owl.carousel.css') }}">
<link rel="stylesheet" href="{{ URL::asset('stylesheets/owl.theme.css') }}">
<!-- Animate -->
<link rel="stylesheet" href="{{ URL::asset('stylesheets/animate.css') }}">
<!-- Date Picker -->
<link rel="stylesheet" href="{{ URL::asset('stylesheets/jquery.datetimepicker.css') }}">
<!-- Pretty Photo -->
<link rel="stylesheet" href="{{ URL::asset('stylesheets/prettyPhoto.css') }}">
<!-- Font awsome icons -->
<link rel="stylesheet" href="{{ URL::asset('stylesheets/font-awesome.min.css') }}">
<!-- General Stylesheet
    ============================================= -->
<!-- Custom Fonts Setup via Font-face CSS3 -->
<link rel="stylesheet" href="{{ URL::asset('fonts/fonts.css') }}" >
<!-- Main Template Styles -->
<link rel="stylesheet" href="{{ URL::asset('stylesheets/main.css') }}" >
<!-- Main Template Responsive Styles -->
<link rel="stylesheet" href="{{ URL::asset('stylesheets/main-responsive.css') }}" >
<!-- Change your theme color with one edit -->
<link rel="stylesheet" href="{{ URL::asset('stylesheets/themes/bakery.css') }}">
<link rel="stylesheet" href="{{ URL::asset('stylesheets/custom.css') }}">
<!--[if lt IE 9]>
      <script src="javascripts/libs/html5shiv.js"></script>
      <script src="javascripts/libs/respond.min.js"></script>
    <![endif]-->
</head>
<body >
<!-- Loader
    ============================================= -->
<div id="loader">
  <div class="loader-item"> <img src="{{ URL::asset('images/logo.svg') }}" width="150" alt="">
    <div class="spinner">
      <div class="bounce1"></div>
      <div class="bounce2"></div>
      <div class="bounce3"></div>
    </div>
  </div>
</div>
<!-- Document Wrapper
    ============================================= -->
<div id="wrapper">
  <!-- banner 
    ============================================= -->
  <section class="banner dark" >
    <div id="contact-parallax">
      <div class="bcg background39"
                data-center="background-position: 50% 0px;"
                data-bottom-top="background-position: 50% 100px;"
                data-top-bottom="background-position: 50% -100px;"
                data-anchor-target="#contact-parallax"
                style="background:url({{ URL::to('images/member-top.jpg') }});"
              >
        <div class="bg-transparent">
          <div class="banner-content">
            <div class="container" >
              <div class="slider-content"> <i class="icon-home-ico"></i>
                <h1>會員中心</h1>
                <p>Apply your information in few mintues</p>
                <ol class="breadcrumb">
                  <li><a href="index01.html">Home</a></li>
                  <li>Register</li>
                </ol>
              </div>
            </div>
          </div>
          <!-- End Banner content -->
        </div>
        <!-- End bg trnsparent -->
      </div>
    </div>
    <!-- Service parallax -->
  </section>
  <!-- End Banner -->
  <!-- Header
    ============================================= -->
	@extends('front.header')

  <!-- End header -->
  <div id="content">
    <div class="menu_grid our-menu text-center padding-b-70">
      <!-- Menu Bar -->
      <div class="menu-bar dark">
        <!-- menu Filter
                    ============================================= -->
        <ul id="menu-fillter" class="clearfix">
          <li class="activeFilter"><a href="{{url('register')}}">會員註冊</a></li>
          <li><a href="{{url('login')}}">會員登入</a></li>
          <li><a href="{{url('forget')}}">忘記密碼</a></li>
          <li><a href="{{url('resend')}}">重寄驗證碼</a></li>
          <li><a href="{{url('record')}}">訂單紀錄</a></li>
        </ul>
        <!-- #menu-filter end -->
      </div>
    <!-- End Menu Grid -->
    </div>
    <!-- Our Register
    ============================================= -->
    <section class="contact text-center padding-b-100">
      <div class="container">
        <div class="row"> 
        <!-- Head Title -->
            <div class="head_title">
                <i class="icon-intro"></i>
                <h1>重寄驗證碼</h1>
                <span class="welcome">Apply your information</span>
            </div>
            <!-- End# Head Title -->
          <!-- Contact form -->
          <div class="contact-form">
            <form method="post" action="{{ url('/resend') }}">
				      {!! csrf_field() !!}
              <!-- Form Group -->
				
              <div class="form-group">
                
                <div class="min-form">
					@if (session('done'))
					<div class="done mb30" style="display:block;"> 
						{{ session('done') }} 
					</div>
					@endif
					
					@if (session('error'))
					<div class="done alert-danger mb30" style="display:block;"> 
						{{ session('error') }} 
					</div>
					@endif
                  <input name="email" type="text" class="form-control" placeholder="電子郵件">
                  <button type="submit" class="btn form-control btn-black">SUBMIT</button>
                </div>
              </div>
              <!-- End form group -->
              <!-- Element -->
           
              <!-- End Element -->
            </form>
            
          </div>
          <!-- End contact form -->
        </div>
      </div>
    </section>
    <!-- End Register -->
  </div>
  <!-- end of #content -->
  <!-- Footer
    ============================================= -->
  @extends('front.footer')
  <!-- End footer -->
  <!--  scroll to top of the page-->
  <a href="#" id="scroll_up" ><i class="fa fa-angle-up"></i></a> </div>
<!-- End wrapper -->
<!-- Core JS Libraries -->
<script type="text/javascript" src="{{ URL::asset('javascripts/libs/jquery.min.js') }}" ></script>
<script type="text/javascript" src="{{ URL::asset('javascripts/libs/plugins.js') }}"></script>
<!-- JS Plugins -->
<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js"></script>
<script type="text/javascript" src="{{ URL::asset('javascripts/libs/modernizr.js') }}"></script>
<!-- JS Custom Codes -->

<script type="text/javascript" src="{{ URL::asset('javascripts/custom/main.js') }}" ></script>
<script type="text/javascript" src="{{ URL::asset('javascripts/custom/instafeed.min.js') }}" ></script>
<script type="text/javascript" src="{{ URL::asset('javascripts/custom/common.js') }}" ></script>
</body>
</html>