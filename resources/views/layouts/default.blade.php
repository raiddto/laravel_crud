<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Sample Sales">
  <meta name="author" content="Ryan Abcede">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="{{ asset('theme/concept/assets/vendor/bootstrap/css/bootstrap.min.css') }}">
  <link href="{{ asset('theme/concept/assets/vendor/fonts/circular-std/style.css') }}" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('theme/concept/assets/libs/css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('theme/concept/assets/vendor/fonts/fontawesome/css/fontawesome-all.css') }}">
  <link rel="stylesheet" href="{{ asset('theme/concept/assets/vendor/fonts/material-design-iconic-font/css/materialdesignicons.min.css') }}">
  <!-- Datatables -->
  <link href="{{ asset('theme/concept/assets/vendor/datatables/css/dataTables.bootstrap4.css') }}" rel="stylesheet">
  <!-- jquery 3.5.1 -->
  <script src="{{ asset('theme/concept/assets/vendor/jquery/jquery-3.5.1.min.js') }}"></script>
  <script src="{{ asset('js/jquery-3.5.1.js') }}"></script>

  <!-- Custom CSS -->
  <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    @yield('styles')

  <title>Sample</title>
  @if (Request::segment(1) == "login" || Request::segment(1) == "register")
    <style type="text/css">
      body {
        display: -ms-flexbox;
        display: grid;
        -ms-flex-align: center;
        align-items: center;
        padding-top: 40px;
        padding-bottom: 40px;
        overflow: hidden;
      }
    </style>
  @endif
</head>

@if (Request::segment(1) == 'login' || 'register')
<body class="center">
@else
<body id="page-top">
@endif
  <!-- <div id="wrapper"> -->
    <div id="page-wrapper">
        @yield('content')
    </div>
  <!-- </div> -->

  <!-- Optional JavaScript -->
  <!-- bootstap bundle js -->
  <script src="{{ asset('theme/concept/assets/vendor/bootstrap/js/bootstrap.bundle.js') }}"></script>
  <!-- slimscroll js -->
  <script src="{{ asset('theme/concept/assets/vendor/slimscroll/jquery.slimscroll.js') }}"></script>
  <!-- main js -->
  <script src="{{ asset('theme/concept/assets/libs/js/main-js.js') }}"></script>
  <!-- Table -->
  <script src="{{ asset('theme/concept/assets/vendor/datatables/js/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('theme/concept/assets/vendor/datatables/js/dataTables.bootstrap4.min.js') }}"></script>
</body>

</html>
