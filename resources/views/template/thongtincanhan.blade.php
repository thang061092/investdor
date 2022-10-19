@extends("template.index")
@section("content")
    <div class="banner_no_image mb-3">
        <h2 class="banner_title text-center wow fadeInUp">Quản lý của bạn</h2>
    </div>
    <section class="manager">
        <div class="container">
            <div class="text-center tabs-main mb-xl-4 mb-3 wow fadeInUp">
                <a href="" title="" class="d-inline-block tab">Quản lý đầu tư</a>
                <a href="" title="" class="d-inline-block tab">Lịch sử đầu từ</a>
                <a href="" title="" class="current-tab d-inline-block tab">Profile cá nhân</a>
            </div>
        </div>
    </section>
    <section class="profile">
        <div class="container mb-xl-4 pb-lg-2 mb-3">
            <div class="box-profile" style="
                background-image: url('{{asset('frontend/images/bg.jpg')}}');
                background-size: cover;
                background-repeat: no-repeat;
            ">
                <div class="row">
                    <div
                        class="col-md-9 mb-md-0 mb-5 d-flex flex-wrap align-items-center justify-content-lg-start justify-content-center wow fadeInUp">
                        <div class="img mr-3 pr-1 mb-sm-0 mb-3">
                            <img src="{{asset('frontend/images/sep.jpg')}}" class="img-fluid" alt=""/>
                        </div>
                        <div class="content text-lg-left text-center">
                            <p class="title_lg">Nguyễn Phúc Vĩnh Thuỵ</p>
                            <div class="desc">
                                Số 12, phố Quan Hoa, quận Tây Hồ, thành phố Hà Nội
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 align-items-end justify-content-end d-flex">
                        <a href="" title="Chỉnh sửa Profile" class="edit_profile btn_all">
                            Chỉnh sửa Profile
                            <svg class="ml-2" xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                 viewBox="0 0 20 20" fill="none">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                      d="M11.0777 1.07733C11.4032 0.751893 11.9308 0.751893 12.2562 1.07733L15.5896 4.41066C15.915 4.7361 15.915 5.26374 15.5896 5.58917L6.42291 14.7558C6.26663 14.9121 6.05467 14.9999 5.83366 14.9999H2.50033C2.04009 14.9999 1.66699 14.6268 1.66699 14.1666V10.8333C1.66699 10.6122 1.75479 10.4003 1.91107 10.244L11.0777 1.07733ZM3.33366 11.1784V13.3333H5.48848L13.8218 4.99992L11.667 2.8451L3.33366 11.1784Z"
                                      fill="#03204C"/>
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                      d="M1.66699 18.3333C1.66699 17.8731 2.04009 17.5 2.50033 17.5H17.5003C17.9606 17.5 18.3337 17.8731 18.3337 18.3333C18.3337 18.7936 17.9606 19.1667 17.5003 19.1667H2.50033C2.04009 19.1667 1.66699 18.7936 1.66699 18.3333Z"
                                      fill="#03204C"/>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-5 mb-lg-0 mb-4 wow fadeInUp">
                    <div class="ping-alert-note mb-4 pb-2">
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
                        Thông tin cá nhân của bạn chưa được xác thực, vui lòng xác
                        thực tài khoản trước khi tiến hành đầu tư.
                    </div>
                    <div class="group-box mb-xl-4 mb-3">
                        <p class="title_lg">Thông tin cá nhân</p>
                        <p class="c-label mb-1">Họ và tên</p>
                        <div class="c-value mb-lg-3 mb-2">
                            Nguyễn Phúc Vĩnh Thuỵ
                        </div>
                        <p class="c-label mb-1">Ngày sinh</p>
                        <div class="c-value mb-lg-3 mb-2">12/11/1989</div>
                        <p class="c-label mb-1">Giới tính</p>
                        <div class="c-value mb-lg-3 mb-2">Nam</div>
                        <p class="c-label mb-1">Số điện thoại</p>
                        <div class="c-value mb-lg-3 mb-2">096678596</div>
                        <p class="c-label mb-1">Email</p>
                        <div class="c-value mb-lg-3 mb-2">
                            thuyvtp2342@gmail.com
                        </div>
                    </div>
                    <div class="group-box">
                        <p class="title_lg">Tài khoản ngân hàng</p>
                        <p class="c-label mb-1">Tên ngân hàng</p>
                        <div class="c-value mb-lg-3 mb-2">
                            ViettinBank - Ngân hàng Công thương Việt Nam
                        </div>
                        <p class="c-label mb-1">Số tài khoản</p>
                        <div class="c-value mb-lg-3 mb-2">272110603</div>
                        <p class="c-label mb-1">Chủ tài khoản</p>
                        <div class="c-value">Nguyễn Phúc Vĩnh Thuỵ</div>
                    </div>
                </div>
                <div class="col-lg-7 wow fadeInUp">
                    <div class="group-box cmt">
                        <p class="title_lg">Thông tin chứng từ</p>
                        <div class="alert-note">
                            <svg class="mx-auto d-block mb-2" xmlns="http://www.w3.org/2000/svg" width="40" height="40"
                                 viewBox="0 0 40 40" fill="none">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                      d="M17.547 3.80518C18.2958 3.38359 19.1406 3.16211 20 3.16211C20.8593 3.16211 21.7041 3.38359 22.4529 3.80518C23.2018 4.22677 23.8293 4.83424 24.275 5.56897L24.2798 5.57688L38.3964 29.1436L38.4099 29.1666C38.8465 29.9226 39.0775 30.7798 39.08 31.6529C39.0824 32.5259 38.8562 33.3844 38.4239 34.1429C37.9915 34.9014 37.3681 35.5335 36.6157 35.9762C35.8632 36.419 35.0079 36.657 34.1349 36.6666L34.1166 36.6668L5.86497 36.6667C4.99196 36.6571 4.13669 36.419 3.38424 35.9762C2.63178 35.5335 2.00837 34.9014 1.57604 34.1429C1.1437 33.3844 0.917497 32.5259 0.919941 31.6529C0.922386 30.7798 1.15339 29.9226 1.58997 29.1666L1.60351 29.1436L15.7202 5.5769L17.1499 6.43333L15.725 5.56897C16.1706 4.83424 16.7982 4.22677 17.547 3.80518ZM18.577 7.29441L4.4711 30.8431C4.32914 31.0927 4.25407 31.3749 4.25326 31.6622C4.25245 31.9532 4.32785 32.2394 4.47196 32.4922C4.61607 32.7451 4.82388 32.9557 5.07469 33.1033C5.32332 33.2496 5.60561 33.3289 5.89395 33.3334H34.106C34.3943 33.3289 34.6766 33.2496 34.9252 33.1033C35.176 32.9557 35.3838 32.745 35.5279 32.4922C35.6721 32.2394 35.7475 31.9532 35.7466 31.6622C35.7458 31.3749 35.6708 31.0928 35.5289 30.8431L21.425 7.29773C21.4243 7.29662 21.4236 7.29552 21.4229 7.29441C21.2745 7.05099 21.0661 6.84969 20.8176 6.7098C20.568 6.56927 20.2864 6.49544 20 6.49544C19.7135 6.49544 19.4319 6.56927 19.1823 6.7098C18.9338 6.84969 18.7254 7.05099 18.577 7.29441Z"
                                      fill="#FFC107"/>
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                      d="M18.333 28.3334C18.333 27.4129 19.0792 26.6667 19.9997 26.6667H20.0163C20.9368 26.6667 21.683 27.4129 21.683 28.3334C21.683 29.2539 20.9368 30.0001 20.0163 30.0001H19.9997C19.0792 30.0001 18.333 29.2539 18.333 28.3334Z"
                                      fill="#FFC107"/>
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                      d="M19.9997 13.3333C20.9201 13.3333 21.6663 14.0794 21.6663 14.9999V21.6666C21.6663 22.5871 20.9201 23.3333 19.9997 23.3333C19.0792 23.3333 18.333 22.5871 18.333 21.6666V14.9999C18.333 14.0794 19.0792 13.3333 19.9997 13.3333Z"
                                      fill="#FFC107"/>
                            </svg>
                            <p class="desc text-center mb-3 pb-2">
                                Cập nhập thông tin chứng từ để xác thực tài khoản
                            </p>
                            <div class="row">
                                <div class="col-md-6 mb-md-0 mb-3">
                                    <label for="img-cmt-before" class="img-cmt">
                                        <input type="file" name="cmt-before" accept="image/*" class="d-none"
                                               id="img-cmt-before"
                                               onchange="document.getElementById('img-before').src = window.URL.createObjectURL(this.files[0])"/>
                                        <img id="img-before" src="{{asset('frontend/images/before-cmt.png')}}" class="img-fluid" alt=""/>
                                    </label>
                                    <p class="c-cmt mt-3">Mặt trước chứng từ</p>
                                </div>
                                <div class="col-md-6 mb-md-0 mb-3">
                                    <label for="img-cmt-after" class="img-cmt">
                                        <input type="file" name="cmt-after" accept="image/*" class="d-none"
                                               id="img-cmt-after"
                                               onchange="document.getElementById('img-after').src = window.URL.createObjectURL(this.files[0])"/>
                                        <img id="img-after" src="{{asset('frontend/images/after-cmt.png')}}" class="img-fluid" alt=""/>
                                    </label>
                                    <p class="c-cmt mt-3">Mặt trước chứng từ</p>
                                </div>
                            </div>
                            <div class="text-right mt-xl-4 mt-3">
                                <button type="button" class="btn_all reset mr-2">
                                    Chọn lại
                                </button>
                                <button type="button" class="btn_all accept">
                                    Xác nhận chứng từ
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop
