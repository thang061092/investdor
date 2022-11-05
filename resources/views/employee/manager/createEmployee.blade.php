@extends("employee.layout.master")
@section('page_name', '- Thêm tài khoản mới')
@section("content")
    <div class="row mb-3">
        <div class="col-12">
            <ol class="breadcrumb" aria-label="breadcrumbs">
                <li class="breadcrumb-item"><a href="">Dashboard</a></li>
                <li class="breadcrumb-item" aria-current="page"><a href=""
                                                                   class="text-info">Tạo mới tài khoản</a>
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
                            <div class="card-header">
                                Thông tin chi tiết
                            </div>
                            <div class="card-body ">
                                <div class="row">
                                    <div class="col-md-8 col-sm-12">
                                        <div class="form-group mb-3">
                                            <label for="full_name">{{__('profile.full_name')}}<span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="full_name" id="full_name"
                                                    placeholder="{{__('profile.enter_name')}}">
                                        </div>
                                        @if($errors->has('full_name'))
                                            <p class="text-danger" style="padding-bottom: 10px;">{{ $errors->first('full_name') }}</p>
                                        @endif
                                    </div>
                                    <div class="col-md-8 col-sm-12 email">
                                        <div class="form-group mb-3">
                                            <label for="email">{{__('profile.email')}}<span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="email" id="email"
                                                    placeholder="{{__('profile.enter_email')}}">
                                        </div>
                                        @if($errors->has('email'))
                                            <p class="text-danger" style="padding-bottom: 10px;">{{ $errors->first('email') }}</p>
                                        @endif
                                    </div>
                                    <div class="col-md-8 col-sm-12 password">
                                        <div class="form-group mb-3">
                                            <label for="password">{{__('profile.password')}}<span
                                                    class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="password" id="password"
                                                    placeholder="{{__('profile.enter_password')}}">
                                        </div>
                                        @if($errors->has('password'))
                                            <p class="text-danger" style="padding-bottom: 10px;">{{ $errors->first('password') }}</p>
                                        @endif
                                    </div>
                                    
                                    <div class="text-center" style="text-align: right !important;">
                                        <div class="btnadmin">
                                            <button type="submit" id="create" class="btn btn-success action">
                                                Thêm mới &nbsp;
                                                <i class="fa fa-plus" aria-hidden="true"></i>
                                            </button>
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
    <script src="{{asset('js/address/select.js')}}"></script>
@endsection
@section('js')
    <script type="text/javascript">
        $(document).ready(function() {
            $("#create").click(function() {
                let name = $("#full_name").val();
                let email = $("#email").val();
                let password = $("#password").val();
                let form = new FormData();
                if (name = "") {
                    $( "div.name" ).html( "<p>Họ tên không được để trống</p>" );
                }
                form.append('full_name', name);
                form.append('email', email);
                form.append('password', password);
                $.ajax({
                    type: "POST",
                    url: "{{route('customer.employee.create_employee')}}",
                    data: form, // serializes the form's elements.
                    processData: false,
                    contentType: false,
                    success: function(data) {
                        console.log(data);
                        if (data['status'] == 200) {
                            $("#modal-success").modal('show');
                        } else {
                            $("#modal-danger").modal('show');
                        }
                    },
                });
            });
        })
    </script>
@endsection
