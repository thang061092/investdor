@extends("customer.layout.master")
@section('page_name', __('page_name.login'))
@section("content")
    <div class="box-full d-flex align-items-center justify-content-between"
         style="background-image: url({{asset('frontend/images/bg-login.png')}})">
        <div class="container">
            <div class="wrapper center mx-auto">
                <a href="" title="" class="big-logo d-block img text-center">
                    <img src="{{asset('frontend/images/logo.png')}}" class="img-fluid" alt=""/>
                </a>
                <form action="{{route('customer.login_submit')}}" method="post" class="frm auth__frm p-xl-4 p-3">
                    @csrf
                    <p class="title auth__tit mb-2">{{__('auth.login')}}</p>
                    <div class="desc auth__note"><span
                            class="note d-inline-block text-bdy">{{__('auth.not_have_account')}}</span>
                        <a href="{{route('customer.register')}}" title=""
                           class="d-inline-block ml-2 auth__reg-now">{{__('auth.register_now')}}</a>
                    </div>
                    @if( isset($error) && $error )
                        <div class="mb-3">
                            <div class="alert alert-danger" role="alert">
                                <h4 class="alert-title">{{ $error }}</h4>
                            </div>
                        </div>
                    @endif
                    <label for="" class="label w-100 auth__lbl mb-2 d-block">
                        {{__('auth.email')}} <span class="require">*</span>
                    </label>
                    <div class="form-group auth__wrap d-flex align-items-center px-md-3 px-2">
                        <input type="email"
                               class="form-control auth__inp border-0 p-0 @if($errors->has('email'))is-invalid @endif"
                               placeholder="{{__('auth.enter_email')}}" name="email" value="{{old('email')}}"/>
                        <div class="auth__ico">
                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                      d="M2.6665 3.33333C2.30136 3.33333 1.99984 3.63486 1.99984 4V12C1.99984 12.3651 2.30136 12.6667 2.6665 12.6667H13.3332C13.6983 12.6667 13.9998 12.3651 13.9998 12V4C13.9998 3.63486 13.6983 3.33333 13.3332 3.33333H2.6665ZM0.666504 4C0.666504 2.89848 1.56498 2 2.6665 2H13.3332C14.4347 2 15.3332 2.89848 15.3332 4V12C15.3332 13.1015 14.4347 14 13.3332 14H2.6665C1.56498 14 0.666504 13.1015 0.666504 12V4Z"
                                      fill="#676767"/>
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                      d="M0.787073 3.61742C0.998216 3.31579 1.4139 3.24243 1.71554 3.45358L7.99989 7.85263L14.2843 3.45358C14.5859 3.24243 15.0016 3.31579 15.2127 3.61742C15.4239 3.91906 15.3505 4.33474 15.0489 4.54589L8.3822 9.21255C8.15266 9.37324 7.84713 9.37324 7.61759 9.21255L0.95092 4.54589C0.649287 4.33474 0.57593 3.91906 0.787073 3.61742Z"
                                      fill="#676767"/>
                            </svg>
                        </div>
                    </div>
                    @if($errors->has('email'))
                        <p class="text-danger" style="padding-bottom: 10px;">{{ $errors->first('email') }}</p>
                    @endif
                    <label for="" class="label w-100 auth__lbl mb-2 d-block">
                        {{__('auth.password')}} <span class="require">*</span>
                    </label>
                    <div class="form-group auth__wrap d-flex align-items-center px-md-3 px-2">
                        <input type="password"
                               class="form-control auth__inp frm-pwd border-0 p-0 @if($errors->has('password'))is-invalid @endif"
                               placeholder="{{__('auth.enter_password')}}" name="password" value="{{old('password')}}"/>
                        <div class="auth__ico show-ico">
                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                      d="M1.42716 8C1.50002 8.12591 1.59662 8.28637 1.71628 8.47165C2.02362 8.94754 2.47878 9.5804 3.06969 10.2107C4.26368 11.4843 5.933 12.6667 8 12.6667C10.067 12.6667 11.7363 11.4843 12.9303 10.2107C13.5212 9.5804 13.9764 8.94754 14.2837 8.47165C14.4034 8.28637 14.5 8.12591 14.5728 8C14.5 7.87409 14.4034 7.71363 14.2837 7.52835C13.9764 7.05246 13.5212 6.4196 12.9303 5.78929C11.7363 4.51571 10.067 3.33333 8 3.33333C5.933 3.33333 4.26368 4.51571 3.06969 5.78929C2.47878 6.4196 2.02362 7.05246 1.71628 7.52835C1.59662 7.71363 1.50002 7.87409 1.42716 8ZM15.3333 8C15.9296 7.70186 15.9295 7.70163 15.9294 7.70139L15.9283 7.69925L15.926 7.69469L15.9184 7.67988C15.9121 7.66752 15.9031 7.65021 15.8915 7.62829C15.8683 7.58447 15.8347 7.52215 15.7907 7.44399C15.7028 7.28776 15.5734 7.06768 15.4038 6.80498C15.0653 6.28088 14.5621 5.5804 13.903 4.87737C12.597 3.48429 10.5997 2 8 2C5.40033 2 3.40299 3.48429 2.09698 4.87737C1.43789 5.5804 0.93471 6.28088 0.596224 6.80498C0.426567 7.06768 0.297195 7.28776 0.209314 7.44399C0.165349 7.52215 0.131693 7.58447 0.108502 7.62829C0.0969045 7.65021 0.0879168 7.66752 0.0815586 7.67988L0.0739933 7.69469L0.0716926 7.69925L0.0709134 7.7008C0.0707909 7.70104 0.0703819 7.70186 0.666667 8L0.0703819 7.70186C-0.0234606 7.88954 -0.0234606 8.11046 0.0703819 8.29814L0.666667 8C0.0703819 8.29814 0.0702594 8.2979 0.0703819 8.29814L0.0716926 8.30075L0.0739933 8.30531L0.0815586 8.32012C0.0879168 8.33248 0.0969045 8.34979 0.108502 8.37171C0.131693 8.41553 0.165349 8.47785 0.209314 8.55601C0.297195 8.71224 0.426567 8.93232 0.596224 9.19502C0.93471 9.71913 1.43789 10.4196 2.09698 11.1226C3.40299 12.5157 5.40033 14 8 14C10.5997 14 12.597 12.5157 13.903 11.1226C14.5621 10.4196 15.0653 9.71913 15.4038 9.19502C15.5734 8.93232 15.7028 8.71224 15.7907 8.55601C15.8347 8.47785 15.8683 8.41553 15.8915 8.37171C15.9031 8.34979 15.9121 8.33248 15.9184 8.32012L15.926 8.30531L15.9283 8.30075L15.9291 8.2992C15.9292 8.29896 15.9296 8.29814 15.3333 8ZM15.3333 8L15.9296 8.29814C16.0235 8.11046 16.0232 7.88907 15.9294 7.70139L15.3333 8Z"
                                      fill="#676767"/>
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                      d="M8.00016 6.66634C7.26378 6.66634 6.66683 7.26329 6.66683 7.99967C6.66683 8.73605 7.26378 9.33301 8.00016 9.33301C8.73654 9.33301 9.3335 8.73605 9.3335 7.99967C9.3335 7.26329 8.73654 6.66634 8.00016 6.66634ZM5.3335 7.99967C5.3335 6.52692 6.5274 5.33301 8.00016 5.33301C9.47292 5.33301 10.6668 6.52692 10.6668 7.99967C10.6668 9.47243 9.47292 10.6663 8.00016 10.6663C6.5274 10.6663 5.3335 9.47243 5.3335 7.99967Z"
                                      fill="#676767"/>
                            </svg>

                        </div>
                    </div>
                    @if($errors->has('password'))
                        <p class="text-danger" style="padding-bottom: 10px;">{{ $errors->first('password') }}</p>
                    @endif
                    <div class="d-flex flex-wrap align-items-center justify-content-between my-4">
                        <label for="remember" class="remember my-checkbox d-inline-flex align-items-center">
                            <input type="checkbox" class="my-checkbox__inp" id="remember"/>
                            <span class="checkbox auth__checkbox my-checkbox__lbl mr-2"></span>
                            <span class="text text-bdy my-checkbox__txt">{{__('auth.save_password')}}</span>
                        </label>
                        <a href="{{route('customer.re_password')}}" title="{{__('auth.forgot_password')}}"
                           class="forgot_password auth__forgot d-inline-block">
                            {{__('auth.forgot_password')}}
                        </a>
                    </div>
                    <button type="submit" class="btn_all submit auth__submit btn-block mb-xl-4 mb-sm-3 mb-4">
                        {{__('auth.login')}}
                    </button>
                    <div
                        class="note-other-login auth__others position-relative text-bdy mb-3 mb-xl-4 d-flex align-items-center justify-content-center">
                        <span class="auth__others__lbl px-2">{{__('auth.or')}}</span>
                    </div>
                    <div class="d-flex flex-nowrap justify-content-center">
                        {{--                        <a href="" title=""--}}
                        {{--                           class="social auth__social btn_all fb d-block w-100 text-center mr-lg-3 mr-2">--}}
                        {{--                            {{__('auth.facebook')}}--}}
                        {{--                            <svg class="ml-2" width="21" height="20" viewBox="0 0 21 20" fill="none"--}}
                        {{--                                 xmlns="http://www.w3.org/2000/svg">--}}
                        {{--                                <path fill-rule="evenodd" clip-rule="evenodd"--}}
                        {{--                                      d="M9.46447 2.29747C10.4021 1.35979 11.6739 0.833008 13 0.833008H15.5C15.9602 0.833008 16.3333 1.2061 16.3333 1.66634V4.99967C16.3333 5.45991 15.9602 5.83301 15.5 5.83301H13V7.49967H15.5C15.7566 7.49967 15.9989 7.6179 16.1568 7.82016C16.3148 8.02243 16.3707 8.28617 16.3085 8.53512L15.4751 11.8685C15.3824 12.2394 15.0491 12.4997 14.6667 12.4997H13V18.333C13 18.7932 12.6269 19.1663 12.1667 19.1663H8.83333C8.3731 19.1663 8 18.7932 8 18.333V12.4997H6.33333C5.8731 12.4997 5.5 12.1266 5.5 11.6663V8.33301C5.5 7.87277 5.8731 7.49967 6.33333 7.49967H8V5.83301C8 4.50692 8.52678 3.23516 9.46447 2.29747ZM13 2.49967C12.1159 2.49967 11.2681 2.85086 10.643 3.47598C10.0179 4.10111 9.66667 4.94895 9.66667 5.83301V8.33301C9.66667 8.79324 9.29357 9.16634 8.83333 9.16634H7.16667V10.833H8.83333C9.29357 10.833 9.66667 11.2061 9.66667 11.6663V17.4997H11.3333V11.6663C11.3333 11.2061 11.7064 10.833 12.1667 10.833H14.016L14.4327 9.16634H12.1667C11.7064 9.16634 11.3333 8.79324 11.3333 8.33301V5.83301C11.3333 5.39098 11.5089 4.96706 11.8215 4.6545C12.134 4.34194 12.558 4.16634 13 4.16634H14.6667V2.49967H13Z"--}}
                        {{--                                      fill="#03204C"/>--}}
                        {{--                            </svg>--}}
                        {{--                        </a>--}}
                        <a href="{{route('customer.google_redirect')}}" title=""
                           class="social auth__social btn_all gg d-block w-100 text-center">
                            {{__('auth.google')}}
                            <svg class="ml-2" width="21" height="20" viewBox="0 0 21 20" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                      d="M11.1051 3.77912C9.66397 3.6373 8.21827 3.99965 7.01441 4.80442C5.81056 5.60918 4.92306 6.80655 4.50319 8.19242C4.08333 9.57829 4.15709 11.0669 4.71191 12.4045C5.26672 13.742 6.26824 14.8458 7.54576 15.5276C8.82328 16.2094 10.2977 16.4271 11.7178 16.1435C13.1378 15.8599 14.4155 15.0926 15.3331 13.9724C16.1182 13.014 16.5981 11.8482 16.7194 10.6246H10.5C10.1548 10.6246 9.875 10.3448 9.875 9.99964C9.875 9.65446 10.1548 9.37464 10.5 9.37464H17.375C17.7199 9.37464 17.9996 9.65406 18 9.99899C18.0018 11.7363 17.4011 13.4205 16.3001 14.7645C15.1992 16.1085 13.6662 17.029 11.9626 17.3693C10.2589 17.7095 8.48992 17.4484 6.95721 16.6304C5.42451 15.8124 4.22293 14.4881 3.55729 12.8834C2.89165 11.2786 2.80316 9.49269 3.30689 7.82999C3.81062 6.16729 4.8754 4.73075 6.31973 3.76523C7.76406 2.79971 9.49853 2.36498 11.2275 2.53513C12.9565 2.70529 14.5729 3.4698 15.8013 4.69835C16.0454 4.94244 16.0454 5.33817 15.8013 5.58223C15.5572 5.8263 15.1615 5.82627 14.9174 5.58218C13.8935 4.55817 12.5462 3.92095 11.1051 3.77912Z"
                                      fill="#C70404"/>
                            </svg>
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop
