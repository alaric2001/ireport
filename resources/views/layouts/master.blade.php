<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>IReport</title>
  <meta name="description" content="IReport — Platform Pelaporan Infrastruktur Publik">

  <!-- Favicon -->
  <link rel="icon" type="image/png" href="{{ asset('logoIREPORT.png') }}">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700|Poppins:300,400,500,600,700&display=swap" rel="stylesheet">

  <!-- Font Awesome 5 -->
  <link rel="stylesheet" href="{{ asset('template2/plugins/fontawesome-free/css/all.min.css') }}">

  <!-- Bootstrap Icons -->
  <link rel="stylesheet" href="{{ asset('template/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}">

  <!-- Bootstrap 5 (Mentor template vendor) -->
  <link href="{{ asset('template/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

  <!-- AOS -->
  <link href="{{ asset('template/assets/vendor/aos/aos.css') }}" rel="stylesheet">

  <!-- Boxicons -->
  <link href="{{ asset('template/assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">

  <!-- Mentor Template CSS -->
  <link href="{{ asset('template/assets/css/style.css') }}" rel="stylesheet">

  <!-- IReport Custom CSS -->
  <link href="{{ asset('css/ireport.css') }}" rel="stylesheet">

  @stack('styles')
</head>

<body style="background-image:linear-gradient(rgba(0,0,0,.55),rgba(0,0,0,.55)),url({{ asset('image/bgIREPORT.png') }});background-attachment:fixed;background-size:cover;background-position:center;min-height:100vh;display:flex;flex-direction:column;">

  @include('partials.navbar')

  <div class="container" style="padding-top:24px;padding-bottom:32px;flex:1">
    @yield('konten')
  </div>

  @include('partials.footer')

  <!-- Vendor JS -->
  <script src="{{ asset('template/assets/vendor/purecounter/purecounter.js') }}"></script>
  <script src="{{ asset('template/assets/vendor/aos/aos.js') }}"></script>
  <!-- Bootstrap 5 bundle (includes Popper) -->
  <script src="{{ asset('template/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <!-- Swiper (dibutuhkan main.js) -->
  <script src="{{ asset('template/assets/vendor/swiper/swiper-bundle.min.js') }}"></script>

  <!-- Mentor Template JS -->
  <script src="{{ asset('template/assets/js/main.js') }}"></script>

  <!-- AOS Init -->
  <script>AOS.init({ duration: 600, once: true });</script>

  @stack('scripts')
</body>
</html>
