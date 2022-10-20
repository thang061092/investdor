<!DOCTYPE html>
<html lang="en">
@include('employee.layout.header')
<body>
<section class="board-admin">
    <div class="d-flex flex-wrap">
        @include('employee.layout.menu')
        @yield('content')
    </div>
</section>
<script src="{{asset('frontend/employee/js/chart.min.js')}}"></script>
<script src="{{asset('frontend/employee/js/daterangepicker.js')}}"></script>
<script src="{{asset('frontend/employee/js/script.js')}}"></script>
<script src="{{asset('frontend/employee/js/moment.min.js')}}"></script>
<script src="{{asset('frontend/employee/js/jquery.slim.min.js')}}"></script>
@yield('js')
<script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
<script>
    CKEDITOR.replace( 'editor1', {
        filebrowserBrowseUrl: '{{ asset('ckfinder/ckfinder.html') }}',
        filebrowserImageBrowseUrl: '{{ asset('ckfinder/ckfinder.html?type=Images') }}',
        filebrowserFlashBrowseUrl: '{{ asset('ckfinder/ckfinder.html?type=Flash') }}',
        filebrowserUploadUrl: '{{ asset('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files') }}',
        filebrowserImageUploadUrl: '{{ asset('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images') }}',
        filebrowserFlashUploadUrl: '{{ asset('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash') }}'
    } );
</script>
</body>
</html>
