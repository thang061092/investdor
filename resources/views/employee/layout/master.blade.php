<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1"/>
    <link type=”image/x-icon” href="{{asset('frontend/images/logo.png')}}" rel="shortcut icon"/>
    <title>InvestDor @yield('page_name')</title>
    <script src="{{ asset('js/tabler.min.js') }}"></script>
    {{--    <script src="https://www.google.com/recaptcha/api.js"></script>--}}
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/selectize/js/standalone/selectize.min.js') }}"></script>
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;0,800;1,300;1,400;1,600;1,700;1,800&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/fontawesome/css/all.css') }}">
    <link rel="stylesheet" href="{{ asset('css/tabler.min.css') }}">
    <link rel="stylesheet" href="{{ asset('js/selectize/css/selectize.bootstrap3.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('css/selectize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
{{--    <link rel="stylesheet" href="{{ asset('css/toastr.css') }}">--}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet"/>
    @yield('css')
</head>
<body class="antialiased right_col">
@include('employee.layout.modal_dang_xu_ly')
<div class="wrapper">
    @include('employee.layout.modal_success')
    @include('employee.layout.model_fail')
    @include('employee.layout.sidebar')
    @include('employee.layout.header')
    @include('employee.layout.modal_alert')
    <div class="page-wrapper">
        <div class="container-fluid">
            @include('employee.layout.alert_error')
            @include('employee.layout.alert_success')
            @yield('content')
            @include('employee.layout.footer')
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
<script src="{{asset('js/toastr.js')}}"></script>
@yield('js')
</body>
</html>

