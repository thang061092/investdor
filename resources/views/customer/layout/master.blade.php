<!DOCTYPE html>
<html itemscope="" itemtype="http://schema.org/WebPage" lang="vi"
      class="{{url()->current() == url('/') ? 'page_home':'page_other'}}">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <title>InvestDor - @yield('page_name')</title>
    <link type=”image/x-icon” href="{{asset('frontend/images/logo.png')}}" rel="shortcut icon"/>
    <link rel="stylesheet" href="{{asset('frontend/css/bootstrap.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('frontend/css/animation.css')}}"/>
    <link rel="stylesheet" href="{{asset('frontend/css/reset.css')}}"/>
    <link rel="stylesheet" href="{{asset('frontend/css/swiper-bundle.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('frontend/css/nice-select2.css')}}"/>
    <link rel="stylesheet" href="{{asset('frontend/css/font-awesome.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('frontend/scss/style.css')}}"/>
    <link rel="stylesheet" href="{{asset('frontend/scss/responsive.css')}}"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{asset('frontend/css/style.css')}}"/>
    <link rel="stylesheet" href="{{asset('frontend/css/responsive.css')}}"/>
    @yield('css')
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
<script src="{{asset('frontend/js/char.js')}}"></script>
<script src="{{asset('frontend/js/auth.js')}}"></script>
<script src="{{asset('frontend/js/script.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@yield('js')
</body>

</html>
