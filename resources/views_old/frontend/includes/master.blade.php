<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Rent Hub</title>
    <link rel="icon" href="{{ asset('public/backend_assets/images/favicon-32x32.png')}}" type="image/png" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
    <!-- Bootstrap core CSS -->
    <link href="{{ asset('frontend_assets/bootstrap-5.3.2/css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend_assets/assets/css/slick.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend_assets/assets/css/animate.min.css') }}" />
    <link href="{{ asset('frontend_assets/assets/css/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend_assets/assets/css/menu.css') }}" rel="stylesheet" />
    <link href="{{ asset('frontend_assets/assets/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend_assets/assets/css/responsive.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend_assets/assets/css/lightbox.min.css') }}" rel="stylesheet">
    <script src="{{ asset('frontend_assets/assets/js/jquery.min.js') }}"></script>
</head>
<body>
    <main>
        @yield('content')
    </main>
    <script src="{{ asset('frontend_assets/assets/js/slick.min.js') }}"></script>
    <script src="{{ asset('frontend_assets/bootstrap-5.3.2/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('frontend_assets/assets/js/aos.js') }}"></script>
    <script src="{{ asset('frontend_assets/assets/js/custom.js') }}"></script>
    <script>
        $('.related').slick({
         dots: false,
         infinite: true,
         arrows: false,

         speed: 300,
         slidesToShow: 3,
         slidesToScroll: 3,
         responsive: [
           {
             breakpoint: 1024,
             settings: {
               slidesToShow: 3,
               slidesToScroll: 3,

             }
           },
           {
             breakpoint: 600,
             settings: {
               slidesToShow: 2,
               slidesToScroll: 2
             }
           },
           {
             breakpoint: 480,
             settings: {
               slidesToShow: 1,
               slidesToScroll: 1
             }
           }
           // You can unslick at a given breakpoint now by adding:
           // settings: "unslick"
           // instead of a settings object
         ]
       });
         </script>
</body>
</html>
