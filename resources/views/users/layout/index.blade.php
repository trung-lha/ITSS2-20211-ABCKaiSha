<!doctype html>
<html lang="en">

<head>
  <title>なにぬね会社</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
  <!-- <link rel="stylesheet" href="{{ asset('css/app.css') }}"> -->
  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="{{ asset('js/app.js') }}"></script>
  <script src="{{ asset('js/jquery.multi-select.js') }}"></script>
  {{-- font-awesome --}}
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  {{-- style for user page --}}
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  <link rel="stylesheet" href="{{ asset('css/example-styles.css') }} ">
  <style>
    body {
      margin: 0;
      font-weight: 400;
      line-height: 1.5;
      color: #212529;
      text-align: left;
      background-color: #fff;
    }

    a {
      color: #007bff;
      text-decoration: none !important;
      background-color: transparent;
    }

    /* Header */
    .text-primary {
      color: #82ae46 !important;
    }

    .ftco-navbar-light {
      background: transparent !important;
      z-index: 3;
      padding: 0;
    }

    @media (max-width: 991.98px) {
      .ftco-navbar-light {
        background: #82ae46 !important;
        position: relative;
        top: 0;
        padding: 10px 15px;
      }

      .bg-green {
        background: #ffffff !important;
      }
    }

    .ftco-navbar-light.ftco-navbar-light-2 {
      position: relative;
      top: 0;
    }

    .ftco-navbar-light .navbar-brand {
      color: #82ae46;
    }

    .ftco-navbar-light .navbar-brand:hover,
    .ftco-navbar-light .navbar-brand:focus {
      color: #000000;
    }

    @media (max-width: 991.98px) {
      .ftco-navbar-light .navbar-brand {
        color: #fff;
      }
    }

    @media (max-width: 991.98px) {
      .ftco-navbar-light .navbar-nav {
        padding-bottom: 10px;
      }
    }

    .ftco-navbar-light .navbar-nav>.nav-item>.nav-link {
      font-size: 0.8rem;
      padding-top: 1.5rem;
      padding-bottom: 1.5rem;
      padding-left: 20px;
      padding-right: 20px;
      font-weight: 400;
      color: #000000;
      text-transform: uppercase;
      letter-spacing: 2px;
      opacity: 1 !important;
    }

    .ftco-navbar-light .navbar-nav>.nav-item>.nav-link:hover {
      color: #000000;
    }

    @media (max-width: 991.98px) {
      .ftco-navbar-light .navbar-nav>.nav-item>.nav-link {
        padding-left: 0;
        padding-right: 0;
        padding-top: .9rem;
        padding-bottom: .9rem;
        color: rgba(255, 255, 255, 0.7);
      }

      .ftco-navbar-light .navbar-nav>.nav-item>.nav-link:hover {
        color: #fff;
      }
    }

    .ftco-navbar-light .navbar-nav>.nav-item .dropdown-menu {
      border: none;
      background: #fff;
      -webkit-box-shadow: 0px 10px 34px -20px rgba(0, 0, 0, 0.41);
      -moz-box-shadow: 0px 10px 34px -20px rgba(0, 0, 0, 0.41);
      box-shadow: 0px 10px 34px -20px rgba(0, 0, 0, 0.41);
      -webkit-border-radius: 0;
      -moz-border-radius: 0;
      -ms-border-radius: 0;
      border-radius: 0;
    }

    .ftco-navbar-light .navbar-nav>.nav-item .dropdown-menu .dropdown-item {
      font-size: 14px;
    }

    .ftco-navbar-light .navbar-nav>.nav-item .dropdown-menu .dropdown-item:hover,
    .ftco-navbar-light .navbar-nav>.nav-item .dropdown-menu .dropdown-item:focus {
      background: transparent;
      color: #000000;
    }

    .ftco-navbar-light .navbar-nav>.nav-item.ftco-seperator {
      position: relative;
      margin-left: 20px;
      padding-left: 20px;
    }

    @media (max-width: 991.98px) {
      .ftco-navbar-light .navbar-nav>.nav-item.ftco-seperator {
        padding-left: 0;
        margin-left: 0;
      }
    }

    .ftco-navbar-light .navbar-nav>.nav-item.ftco-seperator:before {
      position: absolute;
      content: "";
      top: 10px;
      bottom: 10px;
      left: 0;
      width: 2px;
      background: rgba(255, 255, 255, 0.05);
    }

    @media (max-width: 991.98px) {
      .ftco-navbar-light .navbar-nav>.nav-item.ftco-seperator:before {
        display: none;
      }
    }

    .ftco-navbar-light .navbar-nav>.nav-item.cta>a {
      color: #000000;
    }

    @media (max-width: 767.98px) {
      .ftco-navbar-light .navbar-nav>.nav-item.cta>a {
        padding-left: 15px;
        padding-right: 15px;
      }
    }

    @media (max-width: 991.98px) {
      .ftco-navbar-light .navbar-nav>.nav-item.cta>a {
        color: #fff;
        background: #82ae46;
      }
    }

    .ftco-navbar-light .navbar-nav>.nav-item.active>a {
      color: #000000;
    }

    @media (max-width: 991.98px) {
      .ftco-navbar-light .navbar-nav>.nav-item.active>a {
        color: #fff;
      }
    }

    .ftco-navbar-light .navbar-toggler {
      border: none;
      color: rgba(255, 255, 255, 0.5) !important;
      cursor: pointer;
      padding-right: 0;
      text-transform: uppercase;
      font-size: 16px;
      letter-spacing: .1em;
    }

    .ftco-navbar-light .navbar-toggler:focus {
      outline: none !important;
    }

    .ftco-navbar-light.scrolled {
      position: fixed !important;
      right: 0;
      left: 0;
      top: 0;
      margin-top: -130px;
      background: #fff !important;
      -webkit-box-shadow: 0 0 10px 0 rgba(0, 0, 0, 0.1);
      box-shadow: 0 0 10px 0 rgba(0, 0, 0, 0.1);
    }

    .ftco-navbar-light.scrolled .nav-item.active>a {
      color: #82ae46 !important;
    }

    .ftco-navbar-light.scrolled .nav-item.cta>a {
      color: #fff !important;
      background: #82ae46;
      border: none !important;
    }

    .ftco-navbar-light.scrolled .nav-item.cta>a span {
      display: inline-block;
      color: #fff !important;
    }

    .ftco-navbar-light.scrolled .nav-item.cta.cta-colored span {
      border-color: #82ae46;
    }

    @media (max-width: 991.98px) {
      .ftco-navbar-light.scrolled .navbar-nav {
        background: none;
        border-radius: 0px;
        padding-left: 0rem !important;
        padding-right: 0rem !important;
      }
    }

    @media (max-width: 767.98px) {
      .ftco-navbar-light.scrolled .navbar-nav {
        background: none;
        padding-left: 0 !important;
        padding-right: 0 !important;
      }
    }

    .ftco-navbar-light.scrolled .navbar-toggler {
      border: none;
      color: rgba(0, 0, 0, 0.5) !important;
      border-color: rgba(0, 0, 0, 0.5) !important;
      cursor: pointer;
      padding-right: 0;
      text-transform: uppercase;
      font-size: 16px;
      letter-spacing: .1em;
    }

    .ftco-navbar-light.scrolled .nav-link {
      padding-top: 0.9rem !important;
      padding-bottom: 0.9rem !important;
      color: #000000 !important;
    }

    .ftco-navbar-light.scrolled .nav-link.active {
      color: #82ae46 !important;
    }

    .ftco-navbar-light.scrolled.awake {
      margin-top: 0px;
      -webkit-transition: .3s all ease-out;
      -o-transition: .3s all ease-out;
      transition: .3s all ease-out;
    }

    .ftco-navbar-light.scrolled.sleep {
      -webkit-transition: .3s all ease-out;
      -o-transition: .3s all ease-out;
      transition: .3s all ease-out;
    }

    .ftco-navbar-light.scrolled .navbar-brand {
      color: #000000;
    }

    .navbar-brand {
      font-weight: 800;
      font-size: 20px;
      text-transform: uppercase;
    }

    .bg-green {
      background: #82ae46;
    }

    /* Heading */
    .heading-section {
      position: relative;
    }

    .heading-section .subheading {
      font-size: 18px;
      display: block;
      margin-bottom: 10px;
      font-family: "Lora", Georgia, serif;
      color: #82ae46;
    }

    .heading-section h2 {
      position: relative;
      font-size: 40px;
      font-weight: 550;
      color: #000000;
      font-family: "Poppins", Arial, sans-serif;
    }

    @media (max-width: 767.98px) {
      .heading-section h2 {
        font-size: 28px;
      }
    }

    .heading-section.heading-section-white .subheading {
      color: rgba(255, 255, 255, 0.9);
    }

    .heading-section.heading-section-white h2 {
      font-size: 30px;
      color: #fff;
    }

    .heading-section.heading-section-white h2:after,
    .heading-section.heading-section-white h2:before {
      display: none;
    }

    .heading-section.heading-section-white p {
      color: rgba(255, 255, 255, 0.9);
    }

    /* Slider */
    .home-banner {
      position: relative;
      height: 400px;
      z-index: 0;
    }

    .home-banner .slider-item {
      background-size: cover;
      background-repeat: no-repeat;
      background-position: center center;
      height: 400px;
      position: relative;
      z-index: 0;
    }

    @media (max-width: 1199.98px) {
      .home-banner .slider-item {
        background-position: center center !important;
      }
    }

    .home-banner .slider-item .overlay {
      position: absolute;
      top: 0;
      bottom: 0;
      left: 0;
      right: 0;
      background: #000000;
      opacity: .2;
    }

    .home-banner .slider-item .slider-text {
      height: 400px;
      z-index: 0;
    }

    @media (max-width: 991.98px) {
      .home-banner .slider-item .slider-text {
        text-align: center;
      }
    }

    .home-banner .slider-item .slider-text h1 {
      font-size: 6vw;
      color: #fff;
      line-height: 1.3;
      font-weight: 400;
      font-family: "Amatic SC", cursive;
    }

    @media (max-width: 767.98px) {
      .home-banner .slider-item .slider-text h1 {
        font-size: 40px;
      }
    }

    #carouselBanner .carousel-item .overlay {
      position: absolute;
      top: 0;
      bottom: 0;
      left: 0;
      right: 0;
      background: #000000;
      opacity: .2;
    }

    #carouselBanner .carousel-inner img {
      height: 200px;
      object-fit: cover;
    }

    /* Product List */
    .ftco-section {
      padding: 6em 0;
      position: relative;
    }

    .product-category li {
      display: inline-block;
      font-weight: 400;
      font-size: 16px;
    }

    .product-category li a {
      color: #82ae46;
      padding: 5px 20px;
      -webkit-border-radius: 5px;
      -moz-border-radius: 5px;
      -ms-border-radius: 5px;
      border-radius: 5px;
    }

    .product-category li a.active {
      background: #82ae46;
      color: #fff;
    }

    .product {
      display: block;
      width: 100%;
      margin-bottom: 30px;
      position: relative;
      -moz-transition: all 0.3s ease;
      -o-transition: all 0.3s ease;
      -webkit-transition: all 0.3s ease;
      -ms-transition: all 0.3s ease;
      transition: all 0.3s ease;
      border: 1px solid #f0f0f0;
    }

    @media (max-width: 991.98px) {
      .product {
        margin-bottom: 30px;
      }
    }

    .product .img-prod {
      position: relative;
      display: block;
      overflow: hidden;
    }

    .product .img-prod .overlay {
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      content: '';
      opacity: 0;
      background: #82ae46;
      -moz-transition: all 0.3s ease;
      -o-transition: all 0.3s ease;
      -webkit-transition: all 0.3s ease;
      -ms-transition: all 0.3s ease;
      transition: all 0.3s ease;
    }

    .product .img-prod span.status {
      position: absolute;
      top: 0;
      left: 0;
      padding: 2px 10px;
      color: #fff;
      font-weight: 300;
      background: #82ae46;
      font-size: 12px;
    }

    .product .img-prod img {
      -webkit-transform: scale(1);
      -moz-transform: scale(1);
      -ms-transform: scale(1);
      -o-transform: scale(1);
      transform: scale(1);
      -moz-transition: all 0.3s ease;
      -o-transition: all 0.3s ease;
      -webkit-transition: all 0.3s ease;
      -ms-transition: all 0.3s ease;
      transition: all 0.3s ease;
    }

    .product .img-prod:hover img,
    .product .img-prod:focus img {
      -webkit-transform: scale(1.1);
      -moz-transform: scale(1.1);
      -ms-transform: scale(1.1);
      -o-transform: scale(1.1);
      transform: scale(1.1);
    }

    .product .img {
      display: block;
      height: 500px;
    }

    .product .icon {
      width: 60px;
      height: 60px;
      background: #fff;
      opacity: 0;
      -webkit-border-radius: 50%;
      -moz-border-radius: 50%;
      -ms-border-radius: 50%;
      border-radius: 50%;
      -moz-transition: all 0.3s ease;
      -o-transition: all 0.3s ease;
      -webkit-transition: all 0.3s ease;
      -ms-transition: all 0.3s ease;
      transition: all 0.3s ease;
    }

    .product .icon span {
      color: #000000;
    }

    .product:hover .icon {
      opacity: 1;
    }

    .product:hover .img-prod .overlay {
      opacity: 0;
    }

    .product .text {
      background: #fff;
      position: relative;
      width: 100%;
    }

    .product .text h3 {
      font-size: 14px;
      margin-bottom: 5px;
      font-weight: 300;
      text-transform: uppercase;
      letter-spacing: 1px;
      font-family: "Poppins", Arial, sans-serif;
    }

    .product .text h3 a {
      color: #000000;
    }

    .product:hover {
      -webkit-box-shadow: 0px 7px 15px -5px rgba(0, 0, 0, 0.07);
      -moz-box-shadow: 0px 7px 15px -5px rgba(0, 0, 0, 0.07);
      box-shadow: 0px 7px 15px -5px rgba(0, 0, 0, 0.07);
    }

    .block-27 ul {
      padding: 0;
      margin: 0;
    }

    ul.pagination {
      display: flex !important;
      justify-content: center;
    }

    .block-27 ul li {
      margin-bottom: 4px;
      font-weight: 400;
    }

    .block-27 ul li a,
    .block-27 ul li span {
      color: #000000;
      text-align: center;
      width: 40px;
      height: 40px;
      border-radius: 50% !important;
      border: 1px solid #e6e6e6 !important;
      background: #fff;
    }

    .block-27 ul li a:hover,
    .block-27 ul li span:hover {
      color: #82ae46;
    }

    .block-27 ul li.active a,
    .block-27 ul li.active span {
      background: #82ae46 !important;
      color: #fff;
      border: 1px solid transparent !important;
    }

    .ftco-footer {
      font-size: 14px;
      padding: 7em 0;
      color: #000000;
      background: whitesmoke;
    }

    .mouse {
      position: absolute;
      left: 0;
      right: 0;
      top: -30px;
      z-index: 99;
    }

    .mouse-icon {
      color: white;
      width: 60px;
      height: 60px;
      border: 1px solid rgba(255, 255, 255, 0.7);
      -webkit-border-radius: 50%;
      -moz-border-radius: 50%;
      -ms-border-radius: 50%;
      border-radius: 50%;
      background: #82ae46;
      cursor: pointer;
      position: relative;
      text-align: center;
      margin: 0 auto;
      display: block;
    }

    .mouse-wheel {
      height: 30px;
      margin: 2px auto 0;
      display: block;
      width: 30px;
      background: transparent;
      -webkit-border-radius: 50%;
      -moz-border-radius: 50%;
      -ms-border-radius: 50%;
      border-radius: 50%;
      -webkit-animation: 1.6s ease infinite wheel-up-down;
      -moz-animation: 1.6s ease infinite wheel-up-down;
      animation: 1.6s ease infinite wheel-up-down;
      color: #fff;
      font-size: 25px;
    }

    @-webkit-keyframes wheel-up-down {
      100% {
        margin-top: 2px;
        opacity: 1;
      }

      30% {
        opacity: 1;
      }

      0% {
        margin-top: 20px;
        opacity: 0;
      }
    }

    @-moz-keyframes wheel-up-down {
      100% {
        margin-top: 2px;
        opacity: 1;
      }

      30% {
        opacity: 1;
      }

      0% {
        margin-top: 20px;
        opacity: 0;
      }
    }

    @keyframes wheel-up-down {
      100% {
        margin-top: 2px;
        opacity: 1;
      }

      30% {
        opacity: 1;
      }

      0% {
        margin-top: 20px;
        opacity: 0;
      }
    }

    /* Detail Page */
    .detail .image {
      padding: 0;
    }

    .product-details h3 {
      font-size: 30px;
      font-weight: 400;
    }

    .other .title {
      padding: 0;
    }

    .image-popup {
      cursor: -webkit-zoom-in;
      cursor: -moz-zoom-in;
      cursor: zoom-in;
    }

    @media (min-width: 768px) {
      .blog-entry {
        margin-bottom: 60px;
      }
    }

    @media (max-width: 767.98px) {
      .blog-entry {
        margin-bottom: 30px;
      }
    }

    .blog-entry .text {
      position: relative;
      border-top: 0;
      border-radius: 2px;
      width: 100%;
    }

    .blog-entry .text .tag {
      color: #b3b3b3;
    }

    .blog-entry .text .heading {
      font-size: 20px;
      margin-bottom: 16px;
    }

    .blog-entry .text .heading a {
      color: #000000;
    }

    .blog-entry .text .heading a:hover,
    .blog-entry .text .heading a:focus,
    .blog-entry .text .heading a:active {
      color: #82ae46;
    }

    .blog-entry .text .meta-chat {
      color: #b3b3b3;
    }

    .blog-entry .text .read {
      color: #000000;
      font-size: 14px;
    }

    .blog-entry .meta>div {
      display: inline-block;
      margin-right: 5px;
      margin-bottom: 5px;
      font-size: 12px;
      font-weight: 400;
    }

    .blog-entry .meta>div a {
      color: black;
      font-size: 12px;
    }

    .blog-entry .meta>div a:hover {
      color: black;
    }

    .align-self-stretch {
      -ms-flex-item-align: stretch !important;
      -ms-grid-row-align: stretch !important;
      align-self: stretch !important;
    }

    .block-20 {
      overflow: hidden;
      background-size: cover;
      background-repeat: no-repeat;
      background-position: top center;
      height: 250px;
      width: 100%;
      position: relative;
      display: block;
      margin-bottom: 20px;
    }

    @media (min-width: 768px) {
      .block-20 {
        width: 450px;
      }
    }

    .d-block {
      display: block !important;
    }

    @media (min-width: 768px) {
      .d-md-block {
        display: block !important;
      }
    }
  </style>
    {{-- Sweetalert2 --}}
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body class="goto-here">
  @yield('header')
  @yield('content')
  @include('users.layout.footer')
  <script>
    $(document).ready(function() {
      $('.toast').toast('show');
      var scrollWindow = function() {
        $(window).scroll(function() {
          var $w = $(this),
            st = $w.scrollTop(),
            navbar = $('.ftco_navbar'),
            sd = $('.js-scroll-wrap');

          if (st > 150) {
            if (!navbar.hasClass('scrolled')) {
              navbar.addClass('scrolled');
            }
          }
          if (st < 150) {
            if (navbar.hasClass('scrolled')) {
              navbar.removeClass('scrolled sleep');
            }
          }
          if (st > 350) {
            if (!navbar.hasClass('awake')) {
              navbar.addClass('awake');
            }

            if (sd.length > 0) {
              sd.addClass('sleep');
            }
          }
          if (st < 350) {
            if (navbar.hasClass('awake')) {
              navbar.removeClass('awake');
              navbar.addClass('sleep');
            }
            if (sd.length > 0) {
              sd.removeClass('sleep');
            }
          }
        });
      };
      scrollWindow();

      var goHere = function() {
        $('.mouse-icon').on('click', function(event) {

          event.preventDefault();

          $('html,body').animate({
            scrollTop: $('.goto-here').offset().top
          }, 500);

          return false;
        });
      };
      goHere();
    });
  </script>
</body>

</html>