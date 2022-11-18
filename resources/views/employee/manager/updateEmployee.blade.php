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
                            <form action='{{route("customer.employee.update_employee",["id" => $user->id])}}' method="post" accept-charset="utf-8" enctype='multipart/form-data'> 
                                <div class="card-body ">
                                    <div class="row">
                                        <div class="col-md-7 col-sm-12">
                                            <div class="form-group mb-3">
                                                <label for="full_name">{{__('profile.full_name')}}<span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" name="full_name" id="full_name"
                                                        placeholder="{{__('profile.enter_name')}}" value="{{$user->full_name}}">
                                            </div>
                                            @if($errors->has('full_name'))
                                                <p class="text-danger" style="padding-bottom: 10px;">{{ $errors->first('full_name') }}</p>
                                            @endif
                                        </div>
                                        <div class="col-md-7 col-sm-12 email">
                                            <div class="form-group mb-3">
                                                <label for="email">{{__('profile.email')}}<span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" name="email" id="email"
                                                        placeholder="{{__('profile.enter_email')}}" value="{{$user->email}}">
                                            </div>
                                            @if($errors->has('email'))
                                                <p class="text-danger" style="padding-bottom: 10px;">{{ $errors->first('email') }}</p>
                                            @endif
                                        </div>
                                        <div class="col-md-7 col-sm-12 email">
                                            <div class="form-group mb-3">
                                                <label for="phone_number">{{__('profile.phone_number')}}<span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" name="phone_number" id="phone_number"
                                                     value="{{$user->phone}}">
                                            </div>
                                        </div>
                                        @if($errors->has('phone_number'))
                                                <p class="text-danger" style="padding-bottom: 10px;">{{ $errors->first('phone_number') }}</p>
                                            @endif
                                        <div class="col-md-7 col-sm-12 email">
                                            <div class="form-group mb-3">
                                                <label for="identity">{{__('profile.identity')}}<span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" name="identity" id="identity"
                                                     value="{{$user->identity}}">
                                            </div>
                                        </div>
                                        @if($errors->has('identity'))
                                                <p class="text-danger" style="padding-bottom: 10px;">{{ $errors->first('identity') }}</p>
                                            @endif
                                        <div class="col-md-7 col-sm-12 email">
                                            <div class="form-group mb-3">
                                                <label for="date_identity">{{__('profile.date_identity')}}<span class="text-danger">*</span></label>
                                                <input type="date" class="form-control" name="date_identity" id="date_identity"
                                                     value="{{$user->date_identity}}">
                                            </div>
                                        </div>
                                        @if($errors->has('date_identity'))
                                                <p class="text-danger" style="padding-bottom: 10px;">{{ $errors->first('date_identity') }}</p>
                                            @endif
                                        <div class="col-md-7 col-sm-12 email">
                                            <div class="form-group mb-3">
                                                <label for="address_identity">{{__('profile.address_identity')}}<span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" name="address_identity" id="address_identity"
                                                     value="{{$user->address_identity}}">
                                            </div>
                                        </div>
                                        @if($errors->has('address_identity'))
                                                <p class="text-danger" style="padding-bottom: 10px;">{{ $errors->first('address_identity') }}</p>
                                            @endif
                                        <div class="col-md-7 col-sm-12 email">
                                            <div class="form-group mb-3">
                                                <label for="birthday">{{__('profile.date_of_birth')}}<span class="text-danger">*</span></label>
                                                <input type="date" class="form-control" name="birthday" id="birthday"
                                                     value="{{$user->birthday}}">
                                            </div>
                                        </div>
                                        @if($errors->has('birthday'))
                                                <p class="text-danger" style="padding-bottom: 10px;">{{ $errors->first('birthday') }}</p>
                                            @endif
                                        <div class="col-md-7 col-sm-12 email">
                                            <div class="form-group mb-3">
                                                <label for="gender">{{__('profile.gender')}}<span class="text-danger">*</span></label>
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
                                        @if($errors->has('gender'))
                                                <p class="text-danger" style="padding-bottom: 10px;">{{ $errors->first('gender') }}</p>
                                            @endif
                                        <div class="col-md-7 col-sm-12 email">
                                            <div class="form-group mb-3">
                                                <label for="bank_name">{{__('profile.bank_name')}}<span class="text-danger">*</span></label>
                                                <select name="bank_name" class="form-control mb-3" id="banks" data-text="Chọn ngân hàng"
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
                                        @if($errors->has('bank_name'))
                                                <p class="text-danger" style="padding-bottom: 10px;">{{ $errors->first('bank_name') }}</p>
                                        @endif
                                        <div class="col-md-7 col-sm-12 email">
                                            <div class="form-group mb-3">
                                                <label for="account_number">{{__('profile.account_number')}}<span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" name="account_number" id="account_number"
                                                     value="{{$user->account_number}}">
                                            </div>
                                        </div>
                                        @if($errors->has('account_number'))
                                                <p class="text-danger" style="padding-bottom: 10px;">{{ $errors->first('account_number') }}</p>
                                        @endif
                                        <div class="col-md-7 col-sm-12 email">
                                            <div class="form-group mb-3">
                                                <label for="account_name">{{__('profile.account_holder')}}<span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" name="account_name" id="account_name"
                                                     value="{{$user->account_name}}">
                                            </div>
                                        </div>
                                        @if($errors->has('account_name'))
                                                <p class="text-danger" style="padding-bottom: 10px;">{{ $errors->first('account_name') }}</p>
                                        @endif
 
                                        <div class="col-md-7 col-sm-12">
                                            <div class="mb-3">
                                                <label for="avatar" class="img-ct">
                                                <label class="form-label"><strong>{{__('profile.photo')}}</strong><span
                                                                class="text-danger">*</span></label>
                                                    <input type="file" name="avatar" accept="image/*" class="d-none"
                                                            id="avatar" value="{{!empty($user->avatar) ? $user->avatar : ''}}"
                                                            onchange="document.getElementById('img-avatar').src = window.URL.createObjectURL(this.files[0])"/>
                                                        <img id="img-avatar" src="{{!empty($user->avatar) ? $user->avatar : asset('frontend/images/default.png')}}"
                                                            class="img-fluid" alt="" width="250px" height="250px"/>
                                                </label>
  
                                            </div>
                                        </div>

                                        <div class="col-md-7 col-sm-12">
                                            <div class="mb-3">
                                                <label for="img_before" class="img-ct">
                                                <label class="form-label"><strong>{{__('profile.facede')}}</strong><span
                                                                class="text-danger">*</span></label>
                                                    <input type="file" name="img_before" accept="image/*" class="d-none"
                                                            id="img_before" value="{{!empty($user->front_facing_card) ? $user->front_facing_card : ''}}"
                                                            onchange="document.getElementById('img-before').src = window.URL.createObjectURL(this.files[0])"/>
                                                        <img id="img-before" src="{{!empty($user->front_facing_card) ? $user->front_facing_card : asset('frontend/images/default.png')}}"
                                                            class="img-fluid" alt="" width="250px" height="250px"/>
                                                </label>
                                            </div>
                                        </div>
                                                
                                        <div class="col-md-7 col-sm-12">
                                            <div class="mb-3">
                                                <label for="img_after" class="img-ct">
                                                <label class="form-label"><strong>{{__('profile.backside')}}</strong><span
                                                                class="text-danger">*</span></label>
                                                    <input type="file" name="img_after" accept="image/*" class="d-none"
                                                            id="img_after" value="{{!empty($user->card_back) ? $user->card_back : ''}}"
                                                            onchange="document.getElementById('img-after').src = window.URL.createObjectURL(this.files[0])"/>
                                                        <img id="img-after" src="{{!empty($user->card_back) ? $user->card_back : asset('frontend/images/default.png')}}"
                                                            class="img-fluid" alt="" width="250px" height="250px"/>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="text-center" style="text-align: right !important;">
                                            <div class="btnadmin">
                                                <button type="submit" id="update" class="btn btn-success action">
                                                    Cập nhật &nbsp;
                                                    <i class="fa fa-refresh" aria-hidden="true"></i>
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
