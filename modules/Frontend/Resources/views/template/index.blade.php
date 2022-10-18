<!--page_home dành cho trang chủ || page_other cho trang con-->
<!DOCTYPE html>
<html itemscope="" itemtype="http://schema.org/WebPage" lang="vi" class="{{url()->current() == url() ? 'page_home':'page_other'}}">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/animation.css" />
    <link rel="stylesheet" href="css/reset.css" />
    <link rel="stylesheet" href="css/swiper-bundle.min.css" />
    <link rel="stylesheet" href="css/nice-select2.css" />
    <link rel="stylesheet" href="css/font-awesome.min.css" />
    <link rel="stylesheet" href="scss/style.css" />
    <link rel="stylesheet" href="scss/responsive.css" />
<body>
    @include('header')
    @yield('main')
    @include('footer')
    <script src="js/jquery.slim.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/swiper-bundle.min.js"></script>
    <script src="js/nice-select2.js"></script>
    <script src="js/wow.js"></script>
    <script src="js/slide.js"></script>
    <script src="js/chart.min.js"></script>
    <script src="js/char.js"></script>
    <script src="js/auth.js"></script>
    <script src="js/script.js"></script>
    @yield('js')
</body>

</html>