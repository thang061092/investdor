<!DOCTYPE html>
<html itemscope="" itemtype="http://schema.org/WebPage" lang="vi"
      class="{{url()->current() == url('/') ? 'page_home':'page_other'}}">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>InvestDor - @yield('page_name')</title>
    <link type=”image/x-icon” href="{{asset('frontend/images/logo.png')}}" rel="shortcut icon"/>
    <link rel="stylesheet" href="{{asset('frontend/css/bootstrap.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('frontend/css/animation.css')}}"/>
    <link rel="stylesheet" href="{{asset('frontend/css/reset.css')}}"/>
    <link rel="stylesheet" href="{{asset('frontend/css/swiper-bundle.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('frontend/css/nice-select2.css')}}"/>
    <link rel="stylesheet" href="{{asset('frontend/css/font-awesome.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('frontend/css/style.css')}}"/>
    <link rel="stylesheet" href="{{asset('frontend/css/responsive.css')}}"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.css"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet"/>
@yield('css')
@stack('css') // Internal js
<body>
@include('customer.layout.header')
@yield('content')
@include('customer.layout.footer')
<script src="{{asset('frontend/js/jquery.slim.min.js')}}"></script>
<script src="{{asset('frontend/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('frontend/js/swiper-bundle.min.js')}}"></script>
<script src="{{asset('frontend/js/nice-select2.js')}}"></script>
<script src="{{asset('frontend/js/wow.js')}}"></script>
<script src="{{asset('frontend/js/slide.js')}}"></script>
<script src="{{asset('frontend/js/chart.min.js')}}"></script>
<script src="{{asset('frontend/js/fslightbox.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2.0.0"></script>
<script src="{{asset('frontend/js/char.js')}}"></script>
<script src="{{asset('frontend/js/auth.js')}}"></script>
<script src="{{asset('frontend/js/script.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.umd.js"></script>
<script src="{{asset('frontend/js/fslightbox.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
@yield('js')
@stack('js') // Internal js
</body>

</html>
