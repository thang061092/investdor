@extends("employee.layout.master")
@section('page_name', '- Thêm tài khoản mới')
@section("content")
    <div class="row mb-3">
        <div class="col-12">
            <ol class="breadcrumb" aria-label="breadcrumbs">
                <li class="breadcrumb-item"><a href="">Dashboard</a></li>
                <li class="breadcrumb-item" aria-current="page"><a href="{{route('customer.employee.get_all')}}"
                                                                   class="text-info">{{__('page_name.list_employee_account')}}</a>
                <li class="breadcrumb-item" aria-current="page"><a href="{{route('customer.employee.store_employee')}}"
                                                                   class="text-info">{{__('page_name.create_account')}}</a>
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
                            <form action="{{route('customer.employee.create_employee')}}" method="post" accept-charset="utf-8" enctype='multipart/form-data'>
                                @csrf
                                <div class="card-body ">
                                    <div class="row justify-content-center">
                                        <div class="col-md-7 col-sm-12">
                                            <div class="form-group mb-3">
                                                <label for="full_name">{{__('profile.full_name')}}<span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" name="full_name" id="full_name"
                                                        placeholder="{{__('profile.enter_name')}}" value="{{ old('full_name', '') }}">
                                            </div>
                                            @if($errors->has('full_name'))
                                                <p class="text-danger" style="padding-bottom: 10px;">{{ $errors->first('full_name') }}</p>
                                            @endif
                                        </div>
                                        <div class="col-md-7 col-sm-12">
                                            <div class="form-group mb-3">
                                                <label for="email">{{__('profile.email')}}<span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" name="email" id="email"
                                                        placeholder="{{__('profile.enter_email')}}" value="{{ old('email', '') }}">
                                            </div>
                                            @if($errors->has('email'))
                                                <p class="text-danger" style="padding-bottom: 10px;">{{ $errors->first('email') }}</p>
                                            @endif
                                        </div>
                                        <div class="col-md-7 col-sm-12">
                                            <div class="form-group mb-3">
                                                <label for="password">{{__('profile.password')}}<span
                                                        class="text-danger">*</span></label>
                                                <input type="text" class="form-control" name="password" id="password"
                                                        placeholder="{{__('profile.enter_password')}}" value="{{ old('password', '') }}">
                                            </div>
                                            @if($errors->has('password'))
                                                <p class="text-danger" style="padding-bottom: 10px;">{{ $errors->first('password') }}</p>
                                            @endif
                                        </div>
                                        <div class="col-md-7 col-sm-12 wow">
                                                <label for="file">{{__('profile.photo')}}<span class="text-danger">*</span></label>
                                                <input type="file" name="file" class="form-control" id="file" placeholder="{{__('profile.photo')}}">
                                                @if($errors->has('file'))
                                                <p class="text-danger" style="padding-bottom: 10px;">{{ $errors->first('file') }}</p>
                                                @endif
                                                
                                        </div>

                                        <div class="text-center pt-3">
                                            <div class="btnadmin">
                                                <button type="submit" id="create" class="btn btn-success action">
                                                    Thêm mới &nbsp;
                                                    <i class="fa fa-plus" aria-hidden="true"></i>
                                                </button>
                                                <a type="button" href="{{route('customer.employee.get_all')}}" class="btn btn-danger action">
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
