@extends("customer.layout.master")
@section("content")
    <div class="banner banner-invest mb-3">
        <img src="{{asset('frontend/images/banner-x.jpg')}}" class="img-fluid" alt=""/>
        <div class="box-banner">
            <h2 class="banner_title text-center wow fadeInUp">Intercontinatal</h2>
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 mb-lg-0 mb-3 wow fadeInLeft">
                        <p class="c-label-invest mb-1 d-block text-left">
                            Tổng giá trị đầu tư
                        </p>
                        <div class="c-value-invest mb-3 text-left">
                            Chỉ số
                        </div>
                        <p class="c-label-invest mb-1 d-block text-left">
                            Estimated Hold Period
                        </p>
                        <div class="c-value-invest mb-3 text-left">
                            Chỉ số
                        </div>
                        <p class="c-label-invest mb-1 d-block text-left">
                            Minimum Investment
                        </p>
                        <div class="c-value-invest mb-3 text-left">
                            Chỉ số
                        </div>
                        <p class="c-label-invest mb-1 d-block text-left">
                            Lợi nhuận kỳ vọng
                        </p>
                        <div class="c-value-invest mb-3 text-left">
                            Chỉ số
                        </div>
                    </div>
                    <div class="col-lg-6 wow fadeInRight">
                        <div class="s-content text-justify">
                            <p>
                                ( giới thiệu về đự án)Lorem Ipsum is simply
                                dummy text of the printing and typesetting
                                industry. Lorem Ipsum has been the
                                industry's standard dummy text ever since
                                the 1500s, when an unknown printer Lorem
                                Ipsum is simply dummy text of the printing
                                and typesetting industry. Lorem Ipsum has
                                been the industry's standard dummy text ever
                                since the 1500s, when an unknown
                                printerLorem Ipsum is simply dummy text of
                                the printing and typesetting industry. Lorem
                                Ipsum has been the industry's standard dummy
                                text ever since the 1500s, when an unknown
                                printerLorem Ipsum is simply dummy text of
                                the printing and typesetting industry. Lorem
                                Ipsum has been the industry's standard dummy
                                text ever since the 1500s, when an unknown
                                printer dummy text ever since the 1500s,
                                when an unknown and typesetting industry.
                                Lorem Ipsum has been the industry's standard
                                dummy text ever since the 1500s, when an
                                unknown printer
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="invest mt-lg-3 pt-2">
        <div class="container">
            <form action="" method="" class="frm-set-invest invest-step-1 wow fadeInUp">
                <div class="wrapper-set-invest mx-auto">
                    <p class="title_lg">Thông tin cá nhân</p>
                    <label for="" class="d-block mb-2"> Họ và tên </label>
                    <input type="text" name="" placeholder="Nguyễn Phúc Vĩnh Thuỵ" class="form-control mb-3"/>
                    <label for="" class="d-block mb-2"> Ngày sinh </label>
                    <input type="date" name="" placeholder="Chọn ngày" class="form-control mb-3"/>
                    <label for="" class="d-block mb-2"> Giới tính </label>
                    <div class="radios mb-3">
                        <label class="gender-choose" for="male">
                            <input type="radio" checked value="1" name="gender"/>
                            Nam
                        </label>
                        <label class="gender-choose" for="female">
                            <input type="radio" value="2" name="gender"/>
                            Nữ
                        </label>
                    </div>
                    <label for="" class="d-block mb-2">
                        Số điện thoại
                    </label>
                    <input type="text" name="" placeholder="Số điện thoại" class="form-control mb-3"/>
                    <label for="" class="d-block mb-2"> Email </label>
                    <input disabled type="text" name="" placeholder="nguyenvtp2342@gmail.com"
                           class="form-control mb-3"/>
                    <p class="title_lg">Tài khoản ngân hàng</p>
                    <label for="" class="d-block mb-2">
                        Tên ngân hàng
                    </label>
                    <select name="" class="e-select nice-select mb-3" id="banks" data-text="Chọn ngân hàng"
                            data-default="Chọn">
                        <option value="">Vietcombank</option>
                        <option value="">Agribank</option>
                    </select>
                    <label for="" class="d-block mb-2">
                        Số tài khoản
                    </label>
                    <input type="text" name="" placeholder="Nhập số tài khoản" class="form-control mb-3"/>
                    <label for="" class="d-block mb-2">
                        Chủ tài khoản
                    </label>
                    <input type="text" name="" placeholder="Nhập tên chủ tài khoản" class="form-control mb-3"/>
                    <div class="ping-alert-note">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
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
                        Bạn hãy đảm bảo nhập đúng số tài khoản của mình.
                        InvestDor không chịu trách nghiêm khi bạn nhập sai
                        số tài khoản.
                    </div>
                </div>
                <button type="submit" class="btn_all mt-xl-5 mt-lg-4 mt-3">
                    Tiếp tục
                </button>
            </form>
        </div>
    </section>
@stop
