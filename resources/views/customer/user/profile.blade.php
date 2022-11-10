@extends("customer.layout.master")
@section('page_name', __('page_name.personal_profile'))
@section('css')
    <style>
        .theloading {
            position: fixed;
            z-index: 999;
            display: block;
            width: 100vw;
            height: 100vh;
            background-color: rgba(0, 0, 0, .7);
            top: 0;
            right: 0;
            color: #fff;
            display: flex;
            justify-content: center;
            align-items: center
        }
    </style>
@endsection
@section("content")
    @include('customer.user.header-your-manager')
    <section class="profile update">
        <div class="container">
            <div id="loading" class="theloading" style="display: none;">
                <i class="fa fa-cog fa-spin fa-3x fa-fw"></i>
            </div>
            <form action="{{route('customer.user.update_profile')}}" method="post" accept-charset="utf-8"
                  enctype='multipart/form-data'>
                @csrf
                <div class="row">
                    <div class="col-lg-4 mb-lg-0 mb-2 wow fadeInUp">
                        <p class="title_lg">{{__('profile.photo')}}</p>
                        <label for="upload-avatar" class="upload-avatar">
                            <input type="file" name="file" id="upload-avatar" class="d-none" accept="image/*"
                                   onchange="document.getElementById('avatar').src = window.URL.createObjectURL(this.files[0])"/>
                            <img src="{{asset('frontend/images/pl.jpg')}}" id="avatar" class="img-fluid" alt=""/>
                        </label>
                    </div>
                    @if( isset($error) && $error )
                        <div class="mb-3">
                            <div class="alert alert-danger" role="alert">
                                <h4 class="alert-title">{{ $error }}</h4>
                            </div>
                        </div>
                    @endif
                    <div class="col-lg-4 col-md-6 mb-lg-0 mb-0 wow fadeInUp">
                        <p class="title_lg">{{__('profile.personal_information')}}</p>
                        <label for="" class="d-block mb-2">
                            {{__('profile.full_name')}}<span class="text-danger">*</span>
                        </label>
                        <input type="text" name="full_name" placeholder="Họ tên của bạn" class="form-control mb-3"
                               value="{{$detail->full_name}}"/>
                        @if($errors->has('full_name'))
                            <p class="text-danger" style="padding-bottom: 10px;">{{ $errors->first('full_name') }}</p>
                        @endif
                        <label for="" class="d-block mb-2">
                            {{__('profile.date_of_birth')}}<span class="text-danger">*</span>
                        </label>
                        <input type="date" name="birthday" placeholder="Chọn ngày" class="form-control mb-3"
                               value="{{$detail->birthday}}"/>
                        @if($errors->has('birthday'))
                            <p class="text-danger" style="padding-bottom: 10px;">{{ $errors->first('birthday') }}</p>
                        @endif
                        <label for="" class="d-block mb-2">
                            {{__('profile.gender')}}<span class="text-danger">*</span>
                        </label>
                        <div class="radios mb-3">
                            <label class="gender-choose" for="male">

                                @php
                                    if($detail->gender == 1) {
                                        $check = " checked";
                                    }
                                    else
                                    {
                                        $check = "";
                                    }
                                @endphp
                                <input type="radio" value="1" {{$check}} name="gender"/>
                                Nam
                            </label>
                            <label class="gender-choose" for="female">
                                @php
                                    if($detail->gender == 2) {
                                        $check = " checked";
                                    }
                                    else
                                    {
                                        $check = "";
                                    }
                                @endphp
                                <input type="radio" value="2" {{$check}} name="gender"/>
                                Nữ
                            </label>
                        </div>
                        @if($errors->has('gender'))
                            <p class="text-danger" style="padding-bottom: 10px;">{{ $errors->first('gender') }}</p>
                        @endif
                        <label for="" class="d-block mb-2">
                            {{__('profile.phone_number')}}<span class="text-danger">*</span>
                        </label>
                        <input type="text" name="phone_number" placeholder="{{__('profile.phone_number')}}"
                               class="form-control mb-3" value="{{$detail->phone}}"/>
                        @if($errors->has('phone_number'))
                            <p class="text-danger"
                               style="padding-bottom: 10px;">{{ $errors->first('phone_number') }}</p>
                        @endif
                        <label for="" class="d-block mb-2">
                            {{__('profile.identity')}}<span class="text-danger">*</span>
                        </label>
                        <input type="text" name="identity" placeholder="{{__('profile.identity')}}"
                               class="form-control mb-3" value="{{$detail->identity}}"/>
                        @if($errors->has('identity'))
                            <p class="text-danger" style="padding-bottom: 10px;">{{ $errors->first('identity') }}</p>
                        @endif
                        <label for="" class="d-block mb-2">
                            {{__('profile.date_identity')}}<span class="text-danger">*</span>
                        </label>
                        <input type="date" name="date_identity" placeholder="{{__('profile.date_identity')}}"
                               class="form-control mb-3" value="{{$detail->date_identity}}"/>
                        @if($errors->has('date_identity'))
                            <p class="text-danger"
                               style="padding-bottom: 10px;">{{ $errors->first('date_identity') }}</p>
                        @endif
                        <label for="" class="d-block mb-2">
                            {{__('profile.address_identity')}}<span class="text-danger">*</span>
                        </label>
                        <input type="text" name="address_identity" placeholder="{{__('profile.address_identity')}}"
                               class="form-control mb-3" value="{{$detail->address_identity}}"/>
                        @if($errors->has('address_identity'))
                            <p class="text-danger"
                               style="padding-bottom: 10px;">{{ $errors->first('address_identity') }}</p>
                        @endif
                        <label for="" class="d-block mb-2"> {{__('profile.email')}}<span
                                class="text-danger">*</span></label>
                        <input readonly="readonly" type="text" name="email" value="{{$detail->email}}"
                               class="form-control mb-3"/>
                        @if($errors->has('email'))
                            <p class="text-danger" style="padding-bottom: 10px;">{{ $errors->first('email') }}</p>
                        @endif
                        <div class="ping-alert-note mb-lg-4 mb-3 pb-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                      d="M12 3C7.02944 3 3 7.02944 3 12C3 16.9706 7.02944 21 12 21C16.9706 21 21 16.9706 21 12C21 7.02944 16.9706 3 12 3ZM1 12C1 5.92487 5.92487 1 12 1C18.0751 1 23 5.92487 23 12C23 18.0751 18.0751 23 12 23C5.92487 23 1 18.0751 1 12Z"
                                      fill="#C70404"/>
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                      d="M12 7C12.5523 7 13 7.44772 13 8V12C13 12.5523 12.5523 13 12 13C11.4477 13 11 12.5523 11 12V8C11 7.44772 11.4477 7 12 7Z"
                                      fill="#C70404"/>
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                      d="M11 16C11 15.4477 11.4477 15 12 15H12.01C12.5623 15 13.01 15.4477 13.01 16C13.01 16.5523 12.5623 17 12.01 17H12C11.4477 17 11 16.5523 11 16Z"
                                      fill="#C70404"/>
                            </svg>
                            {{__('profile.warning_info')}}
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 mb-lg-0 mb-2 wow fadeInUp">
                        <p class="title_lg">{{__('profile.bank_account')}}</p>
                        <label for="bank_name" class="d-block mb-2">
                            {{__('profile.bank_name')}}<span class="text-danger">*</span>
                        </label>
                        <select name="bank_name" class="e-select nice-select mb-3" id="banks" data-text="Chọn ngân hàng"
                                data-default="Chọn">
                            @if(isset($banks))
                                @foreach ($banks as $bank)
                                    <option value="{{$bank->code}}"
                                            @if($detail->bank_name == $bank->code) selected @endif>{{$bank->name}}</option>
                                @endforeach
                            @endif
                        </select>
                        @if($errors->has('bank_name'))
                            <p class="text-danger" style="padding-bottom: 10px;">{{ $errors->first('bank_name') }}</p>
                        @endif
                        <label for="account_number" class="d-block mb-2">
                            {{__('profile.account_number')}}<span class="text-danger">*</span>
                        </label>
                        <input type="text" name="account_number" placeholder="Nhập số tài khoản"
                               class="form-control mb-3" value="{{$detail->account_number}}"/>
                        @if($errors->has('account_number'))
                            <p class="text-danger"
                               style="padding-bottom: 10px;">{{ $errors->first('account_number') }}</p>
                        @endif
                        <label for="" class="d-block mb-2">
                            {{__('profile.account holder')}}<span class="text-danger">*</span>
                        </label>
                        <input type="text" name="account_name" placeholder="Nhập tên chủ tài khoản"
                               class="form-control mb-3" value="{{$detail->account_name}}"/>
                        @if($errors->has('account_name'))
                            <p class="text-danger"
                               style="padding-bottom: 10px;">{{ $errors->first('account_name') }}</p>
                        @endif
                        <div class="ping-alert-note mb-lg-4 mb-3 pb-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                      d="M12 3C7.02944 3 3 7.02944 3 12C3 16.9706 7.02944 21 12 21C16.9706 21 21 16.9706 21 12C21 7.02944 16.9706 3 12 3ZM1 12C1 5.92487 5.92487 1 12 1C18.0751 1 23 5.92487 23 12C23 18.0751 18.0751 23 12 23C5.92487 23 1 18.0751 1 12Z"
                                      fill="#C70404"/>
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                      d="M12 7C12.5523 7 13 7.44772 13 8V12C13 12.5523 12.5523 13 12 13C11.4477 13 11 12.5523 11 12V8C11 7.44772 11.4477 7 12 7Z"
                                      fill="#C70404"/>
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                      d="M11 16C11 15.4477 11.4477 15 12 15H12.01C12.5623 15 13.01 15.4477 13.01 16C13.01 16.5523 12.5623 17 12.01 17H12C11.4477 17 11 16.5523 11 16Z"
                                      fill="#C70404"/>
                            </svg>
                            {{__('profile.warning_account')}}
                        </div>
                        <p class="title_lg">Địa chỉ</p>
                        <label for="province" class="d-block mb-2">
                            {{__('profile.province')}}<span class="text-danger">*</span>
                        </label>
                        <select name="province" class="e-select nice-select mb-3" id="city" data-text="Chọn thành phố"
                                data-default="Chọn">
                            <option value="">
                                Chọn thành phố
                            </option>
                            @if(isset($province))
                                @foreach($province as $i)
                                    <option value="{{$i->code}}"
                                            @if($detail->city == $i->code) selected @endif>{{$i->name}}</option>
                                @endforeach
                            @endif
                        </select>
                        @if($errors->has('province'))
                            <p class="text-danger" style="padding-bottom: 10px;">{{ $errors->first('province') }}</p>
                        @endif
                        <label for="district" class="d-block mb-2">
                            {{__('profile.district')}}<span class="text-danger">*</span>
                        </label>
                        <select name="district" class="nice-select mb-3 district" id="district"
                                data-text="Chọn quận/ huyện"
                                data-default="Chọn">
                            <option value="">
                                Chọn quận/ huyện
                            </option>
                            @if(isset($district))
                                @foreach($district as $k)
                                    <option value="{{$k->code}}"
                                            @if($detail->district == $k->code) selected @endif>{{$k->name}}</option>
                                @endforeach
                            @endif
                        </select>
                        @if($errors->has('district'))
                            <p class="text-danger" style="padding-bottom: 10px;">{{ $errors->first('district') }}</p>
                        @endif
                        <label for="ward" class="d-block mb-2">
                            {{__('profile.ward')}}<span class="text-danger">*</span>
                        </label>
                        <select name="ward" class="nice-select mb-3" id="ward"
                                data-text="Chọn xã/ phường/ thị trấn" data-default="Chọn">
                            <option value="">
                                Chọn xã/ phường/ thị trấn
                            </option>
                            @if(isset($ward))
                                @foreach($ward as $j)
                                    <option value="{{$j->code}}"
                                            @if($detail->ward == $j->code) selected @endif>{{$j->name}}</option>
                                @endforeach
                            @endif
                        </select>
                        @if($errors->has('ward'))
                            <p class="text-danger" style="padding-bottom: 10px;">{{ $errors->first('ward') }}</p>
                        @endif
                        <label for="specific_address" class="d-block mb-2">
                            {{__('profile.specific_address')}}
                        </label>
                        <input type="text" name="specific_address" placeholder="Nhập địa chỉ cụ thể"
                               class="form-control mb-3" value="{{$detail->address}}"/>
                    </div>
                </div>
                <div class="text-center mt-2 pt-2 wow fadeInUp">
                    <a href='{{route('customer.user.manager').'?main_tab=profile'}}' title="{{__('button.cancel')}}"
                       class="btn_all cancle d-inline-block">{{__('button.cancel')}}</a>
                    <button type="submit" class="btn_all">{{__('button.save')}}</button>
                    @if(session()->get('customer')['accuracy'] == 0)
                        <a type="button" id="auth" class="btn_all">{{__('button.auth')}}</a>
                    @endif
                </div>
            </form>
        </div>
    </section>

@section('js')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            toastr.options.timeOut = 10000;
            @if (Session::has('error'))
            toastr.error('{{ Session::get('error') }}');
            @elseif(Session::has('success'))
            toastr.success('{{ Session::get('success') }}');
            @endif
        });
        $(document).ajaxStart(function () {
            $("#loading").show();
            var loadingHeight = window.screen.height;
            $("#loading, .right-col iframe").css('height', loadingHeight);
        }).ajaxStop(function () {
            $("#loading").hide();
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function () {
            $("#city").on('change', function () {
                let province = $(this).val();
                let data = {code: province};
                $.ajax({
                    type: "POST",
                    url: "{{route('customer.user.district')}}",
                    datatype: "JSON",
                    data: data,
                    success: function (data) {
                        $('#district').html('');
                        $('#ward').html('');
                        if (data.status == 200) {
                            $('#district').append('<option value="">' + '--Chọn quận/huyện--' + '</option>')
                            $('#ward').append('<option value="">' + '--Chọn phường/xã--' + '</option>')
                            $.each(data.data, function (key, value) {
                                $('#district').append('<option value="' + value.code + '">' + value.name + '</option>');
                            });
                        }
                    }
                });
            });

            $("#district").on('change', function () {
                let district = $(this).val();
                let data = {code: district};
                $.ajax({
                    type: "POST",
                    url: "{{route('customer.user.ward')}}",
                    datatype: "JSON",
                    data: data,
                    success: function (data) {
                        $('#ward').html('');
                        if (data.status == 200) {
                            $('#ward').append('<option value="">' + '--Chọn phường/xã--' + '</option>')
                            $.each(data.data, function (key, value) {
                                $('#ward').append('<option value="' + value.code + '">' + value.name + '</option>');
                            });
                        }
                    }
                });
            });

            $("#auth").on('click', function () {
                let auth = $(this).val();
                Swal.fire({
                    title: "{{__('message.send_auth')}}",
                    text: "{{__('message.are_you_sure')}}",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: "{{__('message.yes')}}",
                    cancelButtonText: "{{__('message.no')}}",
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            type: "POST",
                            url: "{{route('customer.user.auth')}}",
                            datatype: "JSON",
                            success: function (data) {
                                if (data.status == 200) {
                                    Swal.fire(
                                        "{{__('message.success')}}",
                                        "{{__('message.send_auth_success')}}",
                                        'success'
                                    )
                                } else {
                                    Swal.fire(
                                        "{{__('message.fail')}}",
                                        "{{__('message.send_auth_fail')}}",
                                        'error'
                                    )
                                }
                            }
                        });
                    }
                })
            });
        });
    </script>
@endsection
@stop
