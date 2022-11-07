@extends("employee.layout.master")
@section('page_name', '- Thêm tài khoản mới')
@section("content")
    <div class="row mb-3">
        <div class="col-12">
            <ol class="breadcrumb" aria-label="breadcrumbs">
                <li class="breadcrumb-item"><a href="">Dashboard</a></li>
                <li class="breadcrumb-item" aria-current="page"><a href=""
                                                                   class="text-info">{{__('page_name.update_account')}}</a>
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
                            <form action='{{route("customer.customer.update_customer",["id" => $customer->id])}}' method="post" accept-charset="utf-8" enctype='multipart/form-data'> 
                                <div class="card-body ">
                                    <div class="row">
                                        <div class="col-md-7 col-sm-12">
                                            <div class="form-group mb-3">
                                                <label for="full_name">{{__('profile.full_name')}}<span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" name="full_name" id="full_name"
                                                        placeholder="{{__('profile.enter_name')}}" value="{{$customer->full_name}}">
                                            </div>
                                            @if($errors->has('full_name'))
                                                <p class="text-danger" style="padding-bottom: 10px;">{{ $errors->first('full_name') }}</p>
                                            @endif
                                        </div>
                                        <div class="col-md-7 col-sm-12 email">
                                            <div class="form-group mb-3">
                                                <label for="email">{{__('profile.email')}}<span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" name="email" id="email"
                                                        placeholder="{{__('profile.enter_email')}}" value="{{$customer->email}}">
                                            </div>
                                            @if($errors->has('email'))
                                                <p class="text-danger" style="padding-bottom: 10px;">{{ $errors->first('email') }}</p>
                                            @endif
                                        </div>
                                        <div class="col-md-7 col-sm-12 password">
                                            <div class="form-group mb-3">
                                                <label for="password">{{__('profile.new_password')}}<span
                                                        class="text-danger">*</span></label>
                                                <input type="text" class="form-control" name="password" id="password"
                                                        placeholder="{{__('profile.enter_new_password')}}" value="">
                                            </div>
                                            @if($errors->has('password'))
                                                <p class="text-danger" style="padding-bottom: 10px;">{{ $errors->first('password') }}</p>
                                            @endif
                                        </div>
                                        
                                        <div class="text-center" style="text-align: right !important;">
                                            <div class="btnadmin">
                                                <button type="submit" id="update" class="btn btn-success action">
                                                    Cập nhật &nbsp;
                                                    <i class="fa fa-refresh" aria-hidden="true"></i>
                                                </button>
                                                <a type="button" href="{{route('customer.customer.get_all')}}" class="btn btn-danger action">
                                                    Quay lại &nbsp;
                                                    <i class="fa fa-arrow-left" aria-hidden="true"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')

@endsection
