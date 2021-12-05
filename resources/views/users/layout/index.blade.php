<!doctype html>
<html lang="en">

<head>
    <title>ABC会社</title>
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
    {{-- font-awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    {{-- style for user page --}}
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    {{-- Sweetalert2 --}}
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>
<body class="goto-here">
    @yield('header')
    <div class="container">
      @yield('content')
    </div>
    @include('users.layout.footer')
<script>
    $(document).ready(function() {
        $('.toast').toast('show');
        var scrollWindow = function() {
          $(window).scroll(function(){
            var $w = $(this),
                st = $w.scrollTop(),
                navbar = $('.ftco_navbar'),
                sd = $('.js-scroll-wrap');

            if (st > 150) {
              if ( !navbar.hasClass('scrolled') ) {
                navbar.addClass('scrolled');
              }
            }
            if (st < 150) {
              if ( navbar.hasClass('scrolled') ) {
                navbar.removeClass('scrolled sleep');
              }
            }
            if ( st > 350 ) {
              if ( !navbar.hasClass('awake') ) {
                navbar.addClass('awake');
              }

              if(sd.length > 0) {
                sd.addClass('sleep');
              }
            }
            if ( st < 350 ) {
              if ( navbar.hasClass('awake') ) {
                navbar.removeClass('awake');
                navbar.addClass('sleep');
              }
              if(sd.length > 0) {
                sd.removeClass('sleep');
              }
            }
          });
        };
        scrollWindow();

        var goHere = function() {
          $('.mouse-icon').on('click', function(event){

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
