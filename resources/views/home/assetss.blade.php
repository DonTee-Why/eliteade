<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$settings->site_name}} | {{$title}}</title>

   <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.1/dist/alpine.min.js" defer></script>
    <!-- Bootstrap CSS File -->
    <link href="{{ asset ('assets/lib/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Libraries CSS Files -->
        <link href="{{asset('assets/lib/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
        <link href="{{asset('assets/lib/animate/animate.min.css')}}" rel="stylesheet">
        <link href="{{asset('assets/lib/ionicons/css/ionicons.min.css')}}" rel="stylesheet">
        <link href="{{asset('assets/lib/owl.carousel/assets/owl.carousel.min.css')}}" rel="stylesheet">
        <link href="{{asset('assets/lib/icofont/icofont.min.css')}}" rel="stylesheet">
        <link href="{{asset('assets/lib/jquery/magnific-popup.css')}}" rel="stylesheet">
        <link href="{{asset('assets/lib/aos/aos.css')}}" rel="stylesheet">
        <link href="{{asset('assets/lib/venobox/venobox.css')}}" rel="stylesheet">
        <link href="{{asset('assets/lib/icofont/icofont.min.css')}}" rel="stylesheet">
        <script src="https://www.google.com/recaptcha/api.js" async defer></script>
        <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">
        
        <!-- JavaScript Libraries -->
        
        <script src="{{asset('assets/lib/jquery/jquery.min.js')}}"></script>
        <script src="{{asset('assets/lib/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
        <script src="{{asset('assets/lib/jquery.easing/jquery.easing.min.js')}}"></script>
        <script src="{{asset('assets/lib/php-email-form/validate.js')}}"></script>
        <script src="{{asset('assets/lib/waypoints/jquery.waypoints.min.js')}}"></script>
        <script src="{{asset('assets/lib/counterup/counterup.min.js')}}"></script>
        <script src="{{asset('assets/lib/isotope-layout/isotope.pkgd.min.js')}}"></script>
        <script src="{{asset('assets/lib/venobox/venobox.min.js')}}"></script>
        <script src="{{asset('assets/lib/owl.carousel/owl.carousel.min.js')}}"></script>
        <script src="{{asset('assets/lib/aos/aos.js')}}"></script>

        <!-- assetslate Main Javascript File -->
        <script src="{{asset('assets/js/main.js')}}"></script>

</head>