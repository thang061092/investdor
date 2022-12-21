@extends("customer.layout.master")
@section("page_name", " Xác thực tài khoản")
@section("content")
    <div class="box-full d-flex align-items-center justify-content-between"
         style="background-image: url('{{asset('frontend/images/bg-login.png')}}')">
        <div class="container">
            <div class="wrapper center mx-auto">
                <a href="" title="" class="big-logo d-block img text-center">
                    <img src="{{asset('frontend/images/logo.png')}}" class="img-fluid" alt=""/>
                </a>
                <div class="frm auth__frm p-xl-4 p-3">
                    <p class="title auth__tit mb-2">{{__('auth.Confirm_the_confirmation_code')}}</p>
                    <div class="desc auth__note mb-2">
                        <span class="note d-inline-block text-bdy">{{__('auth.not_have_account')}}</span>
                        <a href="{{route('customer.register')}}" title=""
                           class="d-inline-block ml-2 auth__reg-now">{{__('auth.register_now')}}</a>
                    </div>
                    <div class="desc-note auth__otp-note text-bdy">
                        {{__('auth.We_have_sent_you_a_6_digit_confirmation_code_via_email')}} <span
                            class="text-danger">{{$user->email ?? ""}}</span>. {{__('auth.Please_check_your_email_and_enter_the_confirmation_code_to_complete_the_registration')}}
                    </div>
                    <label for="" class="label w-100 auth__lbl mb-2 d-block">
                        {{__('auth.Verification')}} <span class="require">*</span>
                    </label>
                    <div class="form-group auth__wrap d-flex align-items-center px-md-3 px-2 mb-lg-4 mb-3">
                        <input type="number" class="form-control auth__inp border-0 p-0"
                               placeholder="{{__('auth.Enter_the_confirmation_code')}}"
                               name="otp"/>
                    </div>
                    <input type="hidden" name="id" value="{{$user->id}}">
                    <button type="button" class="btn_all submit auth__submit  check_register btn-block mb-xl-4 mb-sm-3 mb-4">
                        {{__('button.confirm')}}
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script src="{{asset('js/auth/index.js')}}"></script>
@endsection
