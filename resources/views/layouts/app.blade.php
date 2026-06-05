<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>IReport</title>

  <!-- Favicon -->
  <link rel="shortcut icon" type="image/png" href="{{ asset('logoIREPORT.png') }}">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700&display=swap" rel="stylesheet">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('template2/plugins/fontawesome-free/css/all.min.css') }}">

  <!-- Bootstrap 4 (AdminLTE) -->
  <link rel="stylesheet" href="{{ asset('template2/dist/css/adminlte.min.css') }}">

  <!-- IReport Custom CSS -->
  <link href="{{ asset('css/ireport.css') }}" rel="stylesheet">
</head>
<body class="auth-page">

  @yield('content')

  <!-- jQuery + Bootstrap 4 -->
  <script src="{{ asset('template2/plugins/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('template2/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('template2/dist/js/adminlte.min.js') }}"></script>
</body>
</html>
