<!DOCTYPE html>
<html data-bs-theme="light" lang="en-US" dir="ltr">

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- ===============================================--><!--    Document Title--><!-- ===============================================-->
    <title>KasirKu</title>

    <!-- ===============================================--><!--    Favicons--><!-- ===============================================-->
 
  
    <link rel="manifest" href="{{ url('public/web') }}/assets/img/favicons/manifest.json">
    <meta name="msapplication-TileImage" content="{{ url('public/web') }}/assets/img/favicons/mstile-150x150.png">
    <meta name="theme-color" content="#ffffff">

    <!-- ===============================================--><!--    Stylesheets--><!-- ===============================================-->
    <link rel="stylesheet" href="vendors/swiper/swiper-bundle.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Figtree:ital,wght@0,300..900;1,300..900&amp;family=Rubik:ital,wght@0,300..900;1,300..900family=Rubik:ital,wght@0,300..900;1,300..900&amp;display=swap" rel="stylesheet">
    <link href="{{ url('public/web') }}/assets/css/theme.min.css" rel="stylesheet" id="style-default">
    <link href="{{ url('public/web') }}/assets/css/user-rtl.min.css" rel="stylesheet" id="user-style-rtl">
    <link href="{{ url('public/web') }}/assets/css/user.min.css" rel="stylesheet" id="user-style-default">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
  </head>

  <body>
    <!-- ===============================================--><!--    Main Content--><!-- ===============================================-->
    <main class="main" id="top">
      <div class="content">
       <x-layout.front.header />
       {{ $slot }}
     <x-layout.front.footer />
      </div>
    </main><!-- ===============================================--><!--    End of Main Content--><!-- ===============================================-->



    <!-- ===============================================--><!--    JavaScripts--><!-- ===============================================-->
    <script src="vendors/popper/popper.min.js"></script>
    <script src="vendors/bootstrap/bootstrap.min.js"></script>
    <script src="vendors/is/is.min.js"></script>
    <script src="vendors/countup/countUp.umd.js"></script>
    <script src="vendors/swiper/swiper-bundle.min.js"></script>
    <script src="vendors/lodash/lodash.min.js"></script>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=window.scroll"></script>
    <script src="{{ url('public/web') }}/assets/js/theme.js"></script>
  </body>

</html>