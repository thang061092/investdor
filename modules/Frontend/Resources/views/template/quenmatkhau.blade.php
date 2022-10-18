@extends("frontend::template.index")
@section("content")
    <div class="box-full d-flex align-items-center justify-content-between"
         style="background-image: url('{{asset('frontend/images/bg-login.png')}}')">
        <div class="container">
            <div class="wrapper center mx-auto">
                <a href="" title="" class="big-logo d-block img text-center"> <img src="{{asset('frontend/images/logo.png')}}"
                                                                                   class="img-fluid" alt=""/> </a>
                <form action="" method="" class="frm auth__frm p-xl-4 p-3">
                    <p class="title auth__tit mb-2">Lấy lại mật khẩu</p>
                    <div class="desc auth__note"><span
                            class="note d-inline-block text-bdy">Bạn chưa có tài khoản?</span> <a href="" title=""
                                                                                                  class="d-inline-block ml-2 auth__reg-now">Đăng
                            kí ngay</a>
                    </div>
                    <label for="" class="label w-100 auth__lbl mb-2 d-block">
                        Email <span class="require">*</span>
                    </label>
                    <div class="form-group auth__wrap d-flex align-items-center px-md-3 px-2 mb-lg-4 mb-3">
                        <input type="text" class="form-control auth__inp border-0 p-0" placeholder="Nhập email"/>
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
                    <button type="submit" class="btn_all submit auth__submit btn-block mb-xl-4 mb-sm-3 mb-4">
                        Gửi xác nhận
                    </button>
                </form>
            </div>
        </div>
    </div>
@stop
