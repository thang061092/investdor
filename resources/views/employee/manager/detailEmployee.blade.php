@extends("employee.layout.master")
@section('page_name', '- Thêm tài khoản mới')
@section("content")
    <div class="row mb-3">
        <div class="col-12">
            <ol class="breadcrumb" aria-label="breadcrumbs">
                <li class="breadcrumb-item"><a href="">Dashboard</a></li>
                <li class="breadcrumb-item" aria-current="page"><a href=""
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
                                                <label for="email">{{__('profile.identity')}}<span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" name="identity" id="identity"
                                                    disabled value="{{$user->identity}}">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12 ">
                                            <div class="form-group mb-3">
                                                <label for="email">{{__('profile.date_identity')}}<span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" name="date_identity" id="date_identity"
                                                    disabled value="{{$user->date_identity}}">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12 ">
                                            <div class="form-group mb-3">
                                                <label for="email">{{__('profile.address_identity')}}<span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" name="address_identity" id="address_identity"
                                                    disabled value="{{$user->address_identity}}">
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
                                                <label class="gender-choose" for="male">
                                                    @php
                                                        if($user->gender == 1) {
                                                            $check = " checked";
                                                        }
                                                        else
                                                        {
                                                            $check = "";
                                                        }
                                                    @endphp
                                                        <input  type="radio" value="1" {{$check}} name="gender" />
                                                        Nam
                                                    </label>
                                                    <label class="gender-choose" for="female">
                                                    @php
                                                        if($user->gender == 2) {
                                                            $check = " checked";
                                                        }
                                                        else
                                                        {
                                                            $check = "";
                                                        }
                                                    @endphp
                                                        <input  type="radio" value="2" {{$check}} name="gender" />
                                                        Nữ
                                                    </label>
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-sm-12 ">
                                            <div class="form-group mb-3">
                                                <label for="email">{{__('profile.bank_name')}}<span class="text-danger">*</span></label>
                                                <select disabled name="bank_name" class="form-control mb-3" id="banks" data-text="Chọn ngân hàng"
                                                    data-default="Chọn">
                                                @if(isset($banks))
                                                    @foreach ($banks as $bank)
                                                        <option value="{{$bank->code}}"
                                                                @if($user->bank_name == $bank->code) selected @endif>{{$bank->name}}</option>
                                                    @endforeach
                                                @endif
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group mb-3">
                                                <label for="email">{{__('profile.account_number')}}<span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" name="account_number" id="account_number"
                                                    disabled value="{{$user->account_number}}">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12 ">
                                            <div class="form-group mb-3">
                                                <label for="email">{{__('profile.account_holder')}}<span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" name="account_name" id="account_name"
                                                    disabled value="{{$user->account_name}}">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12 wow fadeInUp">
                                                <label for="img_category">{{__('profile.photo')}}<span class="text-danger">*</span></label>
                                                @if (!empty($user->avatar))
                                                <img class="form-control" style="width: 200px; height: auto" src='{{asset("$user->avatar")}}'>
                                                @else
                                                <p class="text-danger">{{__('table.no_data')}}</p>
                                                @endif
                                        </div>
                                        <div class="col-md-6 mb-md-0 mb-3">
                                            <label for="img_before" class="img-cmt">{{__('profile.facede')}}</label>

                                                    @if ($user->front_facing_card)
                                                    <img class="form-control" src='{{asset("$user->front_facing_card")}}' style="width: 200px; height: auto">
                                                    @else
                                                    <p class="text-danger">{{__('table.no_data')}}</p>
                                                    @endif

                                            @if($errors->has('img_before'))
                                            <p class="text-danger" style="padding-bottom: 10px;">{{ $errors->first('img_before') }}</p>
                                            @endif
                                        </div>
                                        <div class="col-md-6 mb-md-0 mb-3">
                                            <label for="img_after" class="img-cmt">{{__('profile.backside')}}</label>

                                                    @if ($user->card_back)
                                                    <img class="form-control" src='{{asset("$user->card_back")}}' style="width: 200px; height: auto">
                                                    @else
                                                    <p class="text-danger">{{__('table.no_data')}}</p>
                                                    @endif

                                            @if($errors->has('img_after'))
                                            <p class="text-danger" style="padding-bottom: 10px;">{{ $errors->first('img_after') }}</p>
                                            @endif
                                        </div>
                                        <div class="text-center" style="text-align: right !important;">
                                            <div class="btnadmin">
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
@endsection
@section('js')

@endsection
