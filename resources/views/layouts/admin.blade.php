<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Laravel') }}</title>





  <!-- Styles -->
  <link rel="stylesheet" type="text/css"
    href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
  <!-- Nucleo Icons -->
  <link href="frontend/admin/css/nucleo-icons.css" rel="stylesheet" />
  <link href="frontend/admin/css/nucleo-svg.css" rel="stylesheet" />
  <link href="frontend/admin/css/custom.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <!-- Material Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
  <link href="{{ asset('frontend/admin/css/material-dashboard.css?v=3.0.0') }}" rel="stylesheet">
</head>

<body class="g-sidenav-show  bg-gray-200">

  @include('layouts.inc.sidebar')
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    @include('layouts.inc.adminnav')
    <div class="content">
      @yield('content')
    </div>

    @include('layouts.inc.adminfooter')
 

  </main>


  <!-- Scripts -->
  <script src="frontend/admin/js/popper.min.js"></script>
  <script src="frontend/admin/js/bootstrap.min.js"></script>
  <script src="frontend/admin/js/perfect-scrollbar.min.js"></script>
  <script src="frontend/admin/js/smooth-scrollbar.min.js"></script>
  <script src="frontend/admin/js/chartjs.min.js"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  @if (session('status'))
  <script>
    // swal("{{ session('status') }}");
    swal("Done","{{ session('status') }}", "success");
  </script>

  @endif
  @yield('scripts')

  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="frontend/admin/js/material-dashboard.min.js?v=3.0.0"></script>

</body>

</html>