@extends("customer.layout.master")
@section('page_name', __('page_name.personal_profile'))
@section("content")
    @include('customer.user.header-your-manager')
    <section class="profile update">
        <div class="container">
            <form action="" method="" accept-charset="utf-8">
                <div class="row">
                    <div class="col-lg-4 mb-lg-0 mb-2 wow fadeInUp">
                        <p class="title_lg">{{__('profile.photo')}}</p>
                        <label for="upload-avatar" class="upload-avatar">
                            <input type="file" name="avatar" id="upload-avatar" class="d-none" accept="image/*"
                                   onchange="document.getElementById('avatar').src = window.URL.createObjectURL(this.files[0])"/>
                            <img src="{{asset('frontend/images/pl.jpg')}}" id="avatar" class="img-fluid" alt=""/>
                        </label>
                    </div>
                    <div class="col-lg-4 col-md-6 mb-lg-0 mb-0 wow fadeInUp">
                        <p class="title_lg">{{__('profile.personal_information')}}</p>
                        <label for="" class="d-block mb-2">
                            {{__('profile.full_name')}}
                        </label>
                        <input type="text" name="" placeholder="Nguyễn Phúc Vĩnh Thuỵ" class="form-control mb-3"/>
                        <label for="" class="d-block mb-2">
                            {{__('profile.date_of_birth')}}
                        </label>
                        <input type="date" name="" placeholder="Chọn ngày" class="form-control mb-3"/>
                        <label for="" class="d-block mb-2">
                            {{__('profile.gender')}}
                        </label>
                        <div class="radios mb-3">
                            <label class="gender-choose" for="male">
                                <input type="radio" value="1" name="gender"/>
                                Nam
                            </label>
                            <label class="gender-choose" for="female">
                                <input type="radio" value="2" name="gender"/>
                                Nữ
                            </label>
                        </div>
                        <label for="" class="d-block mb-2">
                            {{__('profile.phone_number')}}
                        </label>
                        <input type="text" name="" placeholder="{{__('profile.phone_number')}}" class="form-control mb-3"/>
                        <label for="" class="d-block mb-2"> {{__('profile.email')}} </label>
                        <input disabled type="text" name="" placeholder="nguyenvtp2342@gmail.com"
                               class="form-control mb-3"/>
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
                        <label for="" class="d-block mb-2">
                            {{__('profile.bank_name')}}
                        </label>
                        <select name="" class="e-select nice-select mb-3" id="banks" data-text="Chọn ngân hàng"
                                data-default="Chọn">
                            <option value="">Vietcombank</option>
                            <option value="">Agribank</option>
                        </select>
                        <label for="" class="d-block mb-2">
                            {{__('profile.account_number')}}
                        </label>
                        <input type="text" name="" placeholder="Nhập số tài khoản" class="form-control mb-3"/>
                        <label for="" class="d-block mb-2">
                            {{__('profile.account holder')}}
                        </label>
                        <input type="text" name="" placeholder="Nhập tên chủ tài khoản" class="form-control mb-3"/>
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
                        <label for="" class="d-block mb-2">
                            {{__('profile.province')}}
                        </label>
                        <select name="" class="e-select nice-select mb-3" id="city" data-text="Chọn thành phố"
                                data-default="Chọn">
                            <option selected value="">
                                Chọn thành phố
                            </option>
                        </select>
                        <label for="" class="d-block mb-2">
                            {{__('profile.district')}}
                        </label>
                        <select name="" class="e-select nice-select mb-3" id="province" data-text="Chọn quận/ huyện"
                                data-default="Chọn">
                            <option selected value="">
                                Chọn quận/ huyện
                            </option>
                        </select>
                        <label for="" class="d-block mb-2">
                            {{__('profile.ward')}}
                        </label>
                        <select name="" class="e-select nice-select mb-3" id="ward"
                                data-text="Chọn xã/ phường/ thị trấn" data-default="Chọn">
                            <option selected value="">
                                Chọn xã/ phường/ thị trấn
                            </option>
                        </select>
                        <label for="" class="d-block mb-2">
                            {{__('profile.specific_address')}}
                        </label>
                        <input type="text" name="" placeholder="Nhập địa chỉ cụ thể" class="form-control mb-3"/>
                    </div>
                </div>
                <div class="text-center mt-2 pt-2 wow fadeInUp">
                    <a href="" title="{{__('button.cancel')}}" class="btn_all cancle d-inline-block">{{__('button.cancel')}}</a>
                    <button type="submit" class="btn_all">{{__('button.save')}}</button>
                </div>
            </form>
        </div>
    </section>
@stop