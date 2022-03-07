<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>


    <!-- Styles -->
    <link href="{{ asset('frontend/css/bootstarp.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/custom.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">

    
    <!-- Owl  carousel -->
    <link href="{{ asset('frontend/css/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/owl.theme.default.min.css') }}" rel="stylesheet">

    <!--Google Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&family=Raleway&display=swap" rel="stylesheet">

    <!-- Logo Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script&family=Moon+Dance&family=Open+Sans&family=Ralewa

    <!-- FontAwesome -->
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css"
        integrity="sha384-jLKHWM3JRmfMU0A5x5AkjWkw/EYfGUAGagvnfryNV3F9VqM98XiIH7VBGVoxVSc7" crossorigin="anonymous">

    <!-- Material Icons -->
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css"
        integrity="sha384-jLKHWM3JRmfMU0A5x5AkjWkw/EYfGUAGagvnfryNV3F9VqM98XiIH7VBGVoxVSc7" crossorigin="anonymous">

        <link href="{{ asset('frontend/css/all.min.css') }}" rel="stylesheet">

    <style>
        a {
            text-decoration: none !important;
            color: #0e0c0c;
        }
    </style>
</head>

<body class="g-sidenav-show  bg-gray-200">

    @include('layouts.inc.frontnavbar')

    <div class="content">
        @yield('content')
    </div>


    <!-- Scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="{{ asset('frontend/js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('frontend/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('frontend/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('frontend/js/checkout.js') }}"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://kit.fontawesome.com/c08774ac71.js" crossorigin="anonymous"></script>

    @yield('scripts')

    @if (session('status'))
    <script>
        swal("Done","{{ session('status') }}", "success");
    </script>
    @endif
    <script>
        $(document).ready(function () {
           loadcart();
           loadwishlist();
          $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  }
                  });
          function loadcart()
          {
            $.ajax({
              method: "GET",
              url: "/load-cart-count",
              success: function (response) {
                $('.cart-count').html('');
                $('.cart-count').html(response.count);
              }
            });
          }
    
        function loadwishlist()
          {
            $.ajax({
              method: "GET",
              url: "/load-wishlist-count",
              success: function (response) {
                $('.wishlist-count').html('');
                $('.wishlist-count').html(response.count);
              }
            });
          }
        });
      </script>

</body>

</html>