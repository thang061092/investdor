@extends("employee.layout.master")
@section('page_name', '- Thêm tài khoản mới')
@section("content")
    <div class="row mb-3">
        <div class="col-12">
            <ol class="breadcrumb" aria-label="breadcrumbs">
                <li class="breadcrumb-item"><a href="">Dashboard</a></li>
                <li class="breadcrumb-item" aria-current="page"><a href="{{route('customer.employee.get_all')}}"
                                                                   class="text-info">{{__('page_name.list_employee_account')}}</a>
                <li class="breadcrumb-item" aria-current="page"><a href="{{route('customer.employee.detail_employee',['id' => $user->id])}}"
                                                                   class="text-info">{{__('page_name.detail_employee_account')}}</a>
                </li>
            </ol>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-12">
            <div class="card" style="border-radius: 10px;">
                <div class="card-body">
                    <div class="col-md-12 col-sm-12">
                        <div class="card" style="border-radius: 10px;">
                            <div class="card-header text-primary">
                                Thông tin chi tiết:
                            </div>
                                <div class="card-body ">
                                    <div class="row">
                                    <input type="hidden" class="form-control" name="_token" value="{{ csrf_token() }}">
                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group mb-3">
                                                <label for="full_name">{{__('profile.full_name')}}<span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" name="full_name" id="full_name"
                                                    disabled    value="{{$user->full_name}}">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12 ">
                                            <div class="form-group mb-3">
                                                <label for="email">{{__('profile.email')}}<span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" name="email" id="email"
                                                    disabled value="{{$user->email}}">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12 ">
                                            <div class="form-group mb-3">
                                                <label for="email">{{__('profile.phone_number')}}<span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" name="phone_number" id="phone_number"
                                                    disabled value="{{$user->phone}}">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12 ">
                                            <div class="form-group mb-3">
                                                <label for="email">{{__('profile.date_of_birth')}}<span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" name="gender" id="gender"
                                                    disabled value="{{$user->birthday}}">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12 ">
                                            <div class="form-group mb-3">
                                                <label for="email">{{__('profile.gender')}}<span class="text-danger">*</span></label>
                                                @if($user->gender == 1)
                                                    <input disabled class="form-control" type="text"  value="Nam">
                                                @else
                                                    <input disabled class="form-control" type="text"  value="Nữ">
                                                @endif
                                            </div>
                                        </div>

                                        <div class="text-center" style="text-align: right !important;">
                                            <div class="btnadmin">
                                                <a type="button" href="" class="btn btn-success" data-bs-toggle="modal" 
                                                data-bs-target="#staticBackdrop">
                                                    Đổi mật khẩu &nbsp;
                                                    <i class="fa fa-key" aria-hidden="true"></i>
                                                </a>
                                                <a type="button" href="{{route('customer.employee.get_all')}}" class="btn btn-danger action">
                                                    Quay lại &nbsp;
                                                    <i class="fa fa-arrow-left" aria-hidden="true"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Thay đổi mật khẩu</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- <form action="{{route('change_password',['id' => session()->get('employee')['id']])}}" method="post"> -->
                    <div class="row">
                        <div class="form-group">
                            <label class="form-label"><strong>Mật khẩu mới</strong><span class="text-danger">*</span></label>
                            <input type="password" id="new_pass" name="new_password" class="form-control" value="" autocomplete="off" placeholder="Mật khẩu mới">
                        </div>
                        <div class="form-group">
                            <label class="form-label"><strong>Nhập lại mật khẩu mới</strong><span class="text-danger">*</span></label>
                            <input type="password" id="re_new_pass" name="re_new_password" class="form-control" value="" autocomplete="off" placeholder="Nhập lại mật khẩu mới">
                        </div>
                        <div style="padding-top:10px;" class="modal-footer">
                            <button disabled id="change" type="submit" class="btn btn-primary">Xác nhận</button>
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Đóng</button>
                        </div>
                    </div>
                <!-- </form> -->
            </div>
        </div>
    </div>
@endsection
@section('js')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script type="text/javascript">
        $('input[name="new_password"]').keyup(function(){
        val = $('#new_pass').val(); 
        console.log(val);
        if(val.length >= 6){
          $('#change').attr('disabled', false);
        } else {
          $('#change').attr('disabled', true);
        }
      });
    $("#change").on('click', function() {
        let new_pass = $('#new_pass').val();
        let re_new_pass = $('#re_new_pass').val();
        if (new_pass == "") {
            Swal.fire({
                icon: 'error',
                title: 'Thông báo lỗi',
                text: 'Mật khẩu mới không để trống',
            });
            return;
        }
        if (re_new_pass == "") {
            Swal.fire({
                icon: 'error',
                title: 'Thông báo lỗi',
                text: 'Vui lòng nhập lại mật khẩu mới',
            });
            return;
        }
        if (new_pass != re_new_pass) {
            Swal.fire({
                icon: 'error',
                title: 'Thông báo lỗi',
                text: 'Mật khẩu không khớp',
            });
            return;
        } 
        let form = new FormData();
        form.append('new_password', new_pass);
        form.append('_token', $('[name="_token"]').val());
        $.ajax({
            type: "POST",
            url: "{{route('change_password',['id' => session()->get('employee')['id']])}}",
            datatype: "JSON",
            data: form,
            processData: false,
            contentType: false,
            success: function (data) {
                if (data.status == 200) {
                    Swal.fire(
                        "{{__('message.success')}}",
                        "{{__('message.change_pass_success')}}",
                        'success'
                    );
                    $("#staticBackdrop").modal('hide');
                } else {
                    Swal.fire(
                        "{{__('message.fail')}}",
                        "{{__('message.change_pass_fail')}}",
                        'error'
                    );
                    $("#staticBackdrop").modal('hide');
                }
            }
        });
    });
</script>
@endsection
