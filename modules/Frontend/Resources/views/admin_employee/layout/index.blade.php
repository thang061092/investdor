<!DOCTYPE html>
<html lang="en">
@include('frontend::admin_employee.layout.header')
<body>
<section class="board-admin">
    <div class="d-flex flex-wrap">
        @include('frontend::admin_employee.layout.menu')
        @yield('content')
    </div>
</section>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="{{asset('frontend/admin_employee/js/jquery.slim.min.js')}}"></script>
<script src="{{asset('frontend/admin_employee/js/chart.min.js')}}"></script>
<script src="{{asset('frontend/admin_employee/js/char.js')}}"></script>
</body>
</html>
