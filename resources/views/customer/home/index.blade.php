@extends("customer.layout.master")
@section('page_name', __('page_name.home_page'))
@section("content")
    <section class="banners banners_home position-relative">
        <div class="swiper">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <div class="banner">
                        <img src="{{asset('frontend/images/banner.jpg')}}" class="img-fluid" alt=""/>
                        <div class="box-banner">
                            <h2 class="banner_title">{{__('page_name.investment_and_real_estate')}}</h2>
                            <div class="banner_short">
                                {{__('page_name.BUILD_THE_FUTURE_YOU_WANT')}}
                            </div>
                            <div class="banner_desc">
                                {{__('page_name.quick_access_investments')}}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="banner">
                        <img src="{{asset('frontend/images/banner.jpg')}}" class="img-fluid" alt=""/>
                        <div class="box-banner">
                            <h2 class="banner_title">{{__('page_name.investment_and_real_estate')}}</h2>
                            <div class="banner_short">
                                {{__('page_name.BUILD_THE_FUTURE_YOU_WANT')}}
                            </div>
                            <div class="banner_desc">
                                {{__('page_name.quick_access_investments')}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section-introduction">
        <div class="container">
            <div class="box-maxw mx-auto bg-white">
                <div class="s-content">
                    (giới thiệu về công ty) Ipsum is simply dummy text of the
                    printing and typesetting industry. Lorem Ipsum has been the
                    industry's standard dummy text ever since the 1500s, when an
                    unknown printer took a galley of type and scrambled it to make a
                    type specimen book. It has survived not only five centuries, but
                    also the leap into electronic typesetting, remaining essentially
                    unchanged. It was popularised in the 1960s with the release of
                    Letraset sheets containing Lorem Ipsum passages, and more
                    recently with desktop publishing software like Aldus PageMaker
                    including versions of Lorem Ipsum.
                </div>
            </div>
        </div>
    </section>
    <section class="section-package-invest">
        <div class="container">
            <div class="row">
                <div
                    class="col-lg-6 max-w mb-lg-0 mb-4 mt-lg-0 mt-4 d-lg-flex flex-column justify-content-between wow fadeInLeft">
                    <div class="box">
                        <p class="title_small">25 YEARS OF EXPERIENCE</p>
                        <p class="title_lg">Lợi ích đầu tư bất động sản</p>
                        <div class="s-content mb-lg-4 mb-3">
                            Lorem Ipsum is simply dummy text of the printing and
                            typesetting industry. Lorem Ipsum has been the
                            industry's standard dummy text ever since the 1500s,
                            when an unknown printer
                        </div>
                        <div class="ls-benefit">
                            <div class="item benefit">
                                <p class="sub_title mb-1">Lợi ích 1</p>
                                <p class="main_content">
                                    Lorem Ipsum is simply dummy text of the printing
                                    and
                                </p>
                            </div>
                            <div class="item benefit">
                                <p class="sub_title mb-1">Lợi ích 1</p>
                                <p class="main_content">
                                    Lorem Ipsum is simply dummy text of the printing
                                    and
                                </p>
                            </div>
                            <div class="item benefit">
                                <p class="sub_title mb-1">Lợi ích 1</p>
                                <p class="main_content">
                                    Lorem Ipsum is simply dummy text of the printing
                                    and
                                </p>
                            </div>
                            <div class="item benefit">
                                <p class="sub_title mb-1">Lợi ích 1</p>
                                <p class="main_content">
                                    Lorem Ipsum is simply dummy text of the printing
                                    and
                                </p>
                            </div>
                        </div>
                    </div>
                    <a href="{{route('customer.home_page')}}" title="" class="btn_all lg mt-lg-4 mt-4 mb-lg-0 mb-4">Xem
                        ngay các khoản đầu tư</a>
                </div>
                <div class="col-lg-6 max-w wow fadeInRight">
                    <p class="title_small">OUR GROWTH BUSINESS</p>
                    <p class="title_lg">Giá trị đầu tư bất động sản</p>
                    <div class="ls-char">
                        <canvas id="char_invest" style="height: 600px;"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="numbers section_all" style="
        background-image: url('{{asset('frontend/images/number.jpg')}}');
        background-position: center;
        background-size: cover;
        background-repeat: no-repeat;
        ">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-lg-auto col-md-6 col-sm-6 mb-lg-0 mb-3 wow fadeInUp" data-wow-duration="0.5s"
                     data-wow-delay="0.5s">
                    <div class="number">10.200</div>
                    <div class="text">Khách hàng</div>
                </div>
                <div class="col-lg-auto col-md-6 col-sm-6 mb-lg-0 mb-3 wow fadeInUp" data-wow-duration="0.5s"
                     data-wow-delay="0.6s">
                    <div class="number">100.200.000$</div>
                    <div class="text">Đầu tư</div>
                </div>
                <div class="col-lg-auto col-md-6 col-sm-6 mb-lg-0 mb-3 wow fadeInUp" data-wow-duration="0.5s"
                     data-wow-delay="0.7s">
                    <div class="number">100.200.000$</div>
                    <div class="text">Lợi nhuận</div>
                </div>
                <div class="col-lg-auto col-md-6 col-sm-6 mb-lg-0 mb-3 wow fadeInUp" data-wow-duration="0.5s"
                     data-wow-delay="0.8s">
                    <div class="number">2000$</div>
                    <div class="text">Dự án</div>
                </div>
            </div>
        </div>
    </section>

    <section class="testimonial section_all">
        <div class="container">
            <p class="title_small wow fadeInUp">TESTIMONIAL</p>
            <p class="title_lg wow fadeInUp">Đầu tư ngay chỉ với ba bước</p>
            <ul class="nav steps row mb-lg-4 pb-1 mb-3" role="tablist">
                <li class="nav-item col-md-4 mb-md-0 mb-3 toggle-content wow fadeInLeft" data-wow-delay="0.1s"
                    data-wow-duration="0.5s">
                    <div class="item-step d-flex align-items-center btn_toggle active" data-toggle="tab" href="#step-1">
                        <span class="step d-block mr-2">1</span>
                        <p class="text">Đăng ký và xác thực tài khoản</p>
                        <span class="linek"></span>
                    </div>
                    <div class="guide-step content mt-4 d-md-none" style="display:block;">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <div class="ls-intro max-w">
                                    <p class="item-intro position-relative mb-3">
                                        ( giới thiệu về đự án)Lorem Ipsum is simply dummy text
                                        of the printing and
                                    </p>
                                    <p class="item-intro position-relative mb-3">
                                        ( giới thiệu về đự án)Lorem Ipsum is simply dummy text
                                        of the printing and
                                    </p>
                                    <p class="item-intro position-relative mb-3">
                                        ( giới thiệu về đự án)Lorem Ipsum is simply dummy text
                                        of the printing and
                                    </p>
                                    <p class="item-intro position-relative mb-3">
                                        ( giới thiệu về đự án)Lorem Ipsum is simply dummy text
                                        of the printing and
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="img d-block">
                                    <img src="{{asset('frontend/images/inter.jpg')}}" class="img-fluid" alt=""/>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="nav-item col-md-4 mb-md-0 mb-3 toggle-content wow fadeInLeft" data-wow-delay="0.3s"
                    data-wow-duration="0.6s">
                    <div class="item-step d-flex align-items-center btn_toggle" data-toggle="tab" href="#step-2">
                        <span class="step d-block mr-2">2</span>
                        <p class="text">Lựa chọn sản phẩm</p>
                        <span class="linek"></span>
                    </div>
                    <div class="guide-step content mt-4 d-md-none" style="display:none;">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <div class="ls-intro max-w">
                                    <p class="item-intro position-relative mb-3">
                                        ( giới thiệu về đự án)Lorem Ipsum is simply dummy text
                                        of the printing and
                                    </p>
                                    <p class="item-intro position-relative mb-3">
                                        ( giới thiệu về đự án)Lorem Ipsum is simply dummy text
                                        of the printing and
                                    </p>
                                    <p class="item-intro position-relative mb-3">
                                        ( giới thiệu về đự án)Lorem Ipsum is simply dummy text
                                        of the printing and
                                    </p>
                                    <p class="item-intro position-relative mb-3">
                                        ( giới thiệu về đự án)Lorem Ipsum is simply dummy text
                                        of the printing and
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="img d-block">
                                    <img src="{{asset('frontend/images/inter.jpg')}}" class="img-fluid" alt=""/>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <!--Chú ý index cuối không có mb-md-0 mb-3-->
                <li class="nav-item col-md-4 toggle-content wow fadeInLeft" data-wow-delay="0.5s"
                    data-wow-duration="0.5s">
                    <div class="item-step d-flex align-items-center btn_toggle" data-toggle="tab" href="#step-3">
                        <span class="step d-block mr-2">3</span>
                        <p class="text">Nạp tiền và trải nghiệm</p>
                        <span class="linek"></span>
                    </div>
                    <div class="guide-step content mt-4 d-md-none" style="display:none;">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <div class="ls-intro max-w">
                                    <p class="item-intro position-relative mb-3">
                                        ( giới thiệu về đự án)Lorem Ipsum is simply dummy text
                                        of the printing and
                                    </p>
                                    <p class="item-intro position-relative mb-3">
                                        ( giới thiệu về đự án)Lorem Ipsum is simply dummy text
                                        of the printing and
                                    </p>
                                    <p class="item-intro position-relative mb-3">
                                        ( giới thiệu về đự án)Lorem Ipsum is simply dummy text
                                        of the printing and
                                    </p>
                                    <p class="item-intro position-relative mb-3">
                                        ( giới thiệu về đự án)Lorem Ipsum is simply dummy text
                                        of the printing and
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="img d-block">
                                    <img src="{{asset('frontend/images/inter.jpg')}}" class="img-fluid" alt=""/>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
            <div class="tab-content wow fadeInUp d-md-block d-none">
                <div class="tab-pane active" id="step-1">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <div class="ls-intro max-w">
                                <p class="item-intro position-relative mb-3">
                                    ( giới thiệu về đự án)Lorem Ipsum is simply dummy text
                                    of the printing and
                                </p>
                                <p class="item-intro position-relative mb-3">
                                    ( giới thiệu về đự án)Lorem Ipsum is simply dummy text
                                    of the printing and
                                </p>
                                <p class="item-intro position-relative mb-3">
                                    ( giới thiệu về đự án)Lorem Ipsum is simply dummy text
                                    of the printing and
                                </p>
                                <p class="item-intro position-relative mb-3">
                                    ( giới thiệu về đự án)Lorem Ipsum is simply dummy text
                                    of the printing and
                                </p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="img d-block">
                                <img src="{{asset('frontend/images/inter.jpg')}}" class="img-fluid" alt=""/>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="step-2">
                    <div class="row ">
                        <div class="col-md-6 mb-3">
                            <div class="ls-intro max-w">
                                <p class="item-intro position-relative mb-3">
                                    ( giới thiệu về đự án)Lorem Ipsum is simply dummy text
                                    of the printing and
                                </p>
                                <p class="item-intro position-relative mb-3">
                                    ( giới thiệu về đự án)Lorem Ipsum is simply dummy text
                                    of the printing and
                                </p>
                                <p class="item-intro position-relative mb-3">
                                    ( giới thiệu về đự án)Lorem Ipsum is simply dummy text
                                    of the printing and
                                </p>
                                <p class="item-intro position-relative mb-3">
                                    ( giới thiệu về đự án)Lorem Ipsum is simply dummy text
                                    of the printing and
                                </p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="img d-block">
                                <img src="{{asset('frontend/images/inter.jpg')}}" class="img-fluid" alt=""/>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="step-3">
                    <div class="row ">
                        <div class="col-md-6 mb-3">
                            <div class="ls-intro max-w">
                                <p class="item-intro position-relative mb-3">
                                    ( giới thiệu về đự án)Lorem Ipsum is simply dummy text
                                    of the printing and
                                </p>
                                <p class="item-intro position-relative mb-3">
                                    ( giới thiệu về đự án)Lorem Ipsum is simply dummy text
                                    of the printing and
                                </p>
                                <p class="item-intro position-relative mb-3">
                                    ( giới thiệu về đự án)Lorem Ipsum is simply dummy text
                                    of the printing and
                                </p>
                                <p class="item-intro position-relative mb-3">
                                    ( giới thiệu về đự án)Lorem Ipsum is simply dummy text
                                    of the printing and
                                </p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="img d-block">
                                <img src="{{asset('frontend/images/inter.jpg')}}" class="img-fluid" alt=""/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="recent_project section_all position-relative">
        <div class="container">
            <p class="title_small wow fadeInUp">RECENT PROJECTS</p>
            <p class="title_lg mb-lg-3 mb-2 wow fadeInUp">
                Các khoản đầu tư gần đây
            </p>
            <div class="s-content mb-lg-4 mb-3 wow fadeInUp">
                Lorem Ipsum is simply dummy text of the printing and typesetting
                industry. Lorem Ipsum has been the industry's standard dummy text
                ever since the 1500s, when an unknown printer Lorem Ipsum is simply
                dummy text of the printing and typesetting industry. Lorem Ipsum has
                been the industry's standard dummy text ever since the 1500s, when
                an unknown printer
            </div>
        </div>
        <div class="container-fluid">
            <div class="swiper-prev swiper_btn">
                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                          d="M3.3335 10.0003C3.3335 9.54009 3.70659 9.16699 4.16683 9.16699H15.8335C16.2937 9.16699 16.6668 9.54009 16.6668 10.0003C16.6668 10.4606 16.2937 10.8337 15.8335 10.8337H4.16683C3.70659 10.8337 3.3335 10.4606 3.3335 10.0003Z"
                          fill="white"/>
                    <path fill-rule="evenodd" clip-rule="evenodd"
                          d="M10.5894 3.57709C10.9149 3.90252 10.9149 4.43016 10.5894 4.7556L5.34534 9.99967L10.5894 15.2438C10.9149 15.5692 10.9149 16.0968 10.5894 16.4223C10.264 16.7477 9.73634 16.7477 9.41091 16.4223L3.57757 10.5889C3.25214 10.2635 3.25214 9.73586 3.57757 9.41042L9.41091 3.57709C9.73634 3.25165 10.264 3.25165 10.5894 3.57709Z"
                          fill="white"/>
                </svg>
            </div>
            <div class="swiper-next swiper_btn">
                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                          d="M3.3335 10.0003C3.3335 9.54009 3.70659 9.16699 4.16683 9.16699H15.8335C16.2937 9.16699 16.6668 9.54009 16.6668 10.0003C16.6668 10.4606 16.2937 10.8337 15.8335 10.8337H4.16683C3.70659 10.8337 3.3335 10.4606 3.3335 10.0003Z"
                          fill="white"/>
                    <path fill-rule="evenodd" clip-rule="evenodd"
                          d="M9.41058 3.57709C9.73602 3.25165 10.2637 3.25165 10.5891 3.57709L16.4224 9.41042C16.7479 9.73586 16.7479 10.2635 16.4224 10.5889L10.5891 16.4223C10.2637 16.7477 9.73602 16.7477 9.41058 16.4223C9.08514 16.0968 9.08514 15.5692 9.41058 15.2438L14.6547 9.99967L9.41058 4.7556C9.08514 4.43016 9.08514 3.90252 9.41058 3.57709Z"
                          fill="white"/>
                </svg>
            </div>

            <div class="swiper swiper_project wow fadeInUp">
                <div class="swiper-wrapper">
                    @empty($projects[0])
                        <div class="text-danger" style="text-align: center">{{__('table.no_data')}}</div>
                    @else
                        @foreach($projects as $k => $v)
                            <div class="swiper-slide pb-lg-4 pb-3">
                                <div class="item_project">
                        <span class="status d-block w-100">
                             {{ status_project($v->status) }}
                        </span>
                                    <a href="{{route('customer.detail_project',session()->get('lang') == \App\Http\Controllers\BaseController::LANG_EN ? $v->slug_en : $v->slug_vi)}}"
                                       title="" class="d-block img">
                                        <img src="{{!empty($v->image) ? $v->image : asset('frontend/images/img1.jpg')}}"
                                             class="img-fluid" alt=""/>
                                        <span class="category inline-block text-white">{{type_project($v->type)}}</span>
                                    </a>
                                    <div class="p-3 pb-lg-4">
                                        <h3>
                                            <a href="{{route('customer.detail_project',session()->get('lang') == \App\Http\Controllers\BaseController::LANG_EN ? $v->slug_en : $v->slug_vi)}}"
                                               title="" class="name d-block mb-2">
                                                {{session()->get('lang') == \App\Http\Controllers\BaseController::LANG_EN ? $v->name_en : $v->name_vi}}
                                            </a>
                                        </h3>
                                        <div class="desc mb-2">
                                            {{$v->address_vi. ', '. $v->ward->name.', '. $v->district->name .', '. $v->city->name}}
                                        </div>
                                        <div class="line_share mb-2">
                                            <div class="text mb-1">
                                                {{__('project.total_investment')}}
                                                <span class="number ml-3">{{number_format_vn($v->total_value)}}</span>
                                            </div>
                                            <div class="process d-flex flex-nowrap">
                                                <span class="d-block text-center"
                                                      style="width: {{($v->part - $v->current_part)/ $v->part * 100}}%">{{number_format_vn($v->part - $v->current_part)}}</span>
                                                <span class="d-block text-center"
                                                      style="width: {{$v->current_part / $v->part * 100}}%">{{number_format_vn($v->current_part)}}</span>
                                            </div>
                                        </div>
                                        <div class="ls-profit">
                                            <p class="profit mb-2 d-flex align-items-center">
                                                <svg class="mr-2" width="16" height="16" viewBox="0 0 16 16" fill="none"
                                                     xmlns="http://www.w3.org/2000/svg">
                                                    <g clip-path="url(#clip0_422_4855)">
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                              d="M10.4418 2.51585C9.26 1.98926 7.93959 1.8588 6.67755 2.14394C5.41551 2.42908 4.27945 3.11455 3.43881 4.0981C2.59816 5.08165 2.09798 6.31059 2.01284 7.60164C1.92771 8.89269 2.2622 10.1767 2.96641 11.2621C3.67063 12.3475 4.70685 13.1762 5.92052 13.6246C7.13419 14.073 8.4603 14.117 9.70105 13.7502C10.9418 13.3833 12.0307 12.6252 12.8054 11.589C13.5801 10.5527 13.9991 9.29371 13.9998 7.99985V7.3869C13.9998 7.01871 14.2983 6.72024 14.6665 6.72024C15.0347 6.72024 15.3332 7.01871 15.3332 7.3869V8.00024C15.3323 9.58161 14.8202 11.1207 13.8733 12.3873C12.9265 13.6539 11.5956 14.5804 10.0791 15.0288C8.56262 15.4772 6.94183 15.4233 5.45845 14.8753C3.97507 14.3273 2.70858 13.3144 1.84787 11.9878C0.987166 10.6612 0.578351 9.09186 0.6824 7.51391C0.78645 5.93596 1.39779 4.43392 2.42524 3.2318C3.4527 2.02968 4.84121 1.1919 6.38371 0.84339C7.92621 0.494884 9.54003 0.65433 10.9845 1.29795C11.3208 1.4478 11.472 1.84192 11.3221 2.17824C11.1723 2.51455 10.7782 2.66571 10.4418 2.51585Z"
                                                              fill="#03204C"/>
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                              d="M15.138 2.19503C15.3985 2.45525 15.3987 2.87736 15.1385 3.13784L8.4718 9.81117C8.3468 9.9363 8.1772 10.0066 8.00033 10.0067C7.82346 10.0067 7.65382 9.93647 7.52876 9.8114L5.52876 7.8114C5.26841 7.55105 5.26841 7.12894 5.52876 6.8686C5.78911 6.60825 6.21122 6.60825 6.47157 6.8686L7.99993 8.39696L14.1952 2.1955C14.4554 1.93502 14.8775 1.93481 15.138 2.19503Z"
                                                              fill="#03204C"/>
                                                    </g>
                                                    <defs>
                                                        <clipPath id="clip0_422_4855">
                                                            <rect width="16" height="16" fill="white"/>
                                                        </clipPath>
                                                    </defs>
                                                </svg>
                                                {{__('project.expected_profit')}}
                                                <span class="num-profit ml-3 text-danger">{{$v->interests()->where('status', 'active')->first()->interest ?? 12}}%</span>
                                            </p>
                                        </div>
                                        <div class="project_desc mb-lg-3 mb-2">
                                            @if(session()->get('lang') == \App\Http\Controllers\BaseController::LANG_EN)
                                                {!! \Illuminate\Support\Str::limit($v->description_en, 150) !!}
                                            @else
                                                {!! \Illuminate\Support\Str::limit($v->description_vi, 150) !!}
                                            @endif
                                            <a href="{{route('customer.detail_project',session()->get('lang') == \App\Http\Controllers\BaseController::LANG_EN ? $v->slug_en : $v->slug_vi)}}"
                                               title="{{__('project.see_more')}}"
                                               class="d-inline-block view_more">{{__('project.see_more')}}</a>
                                        </div>
                                    </div>
                                </div>
                                <a href="{{route('customer.detail_project',session()->get('lang') == \App\Http\Controllers\BaseController::LANG_EN ? $v->slug_en : $v->slug_vi)}}"
                                   title="Xem dự án"
                                   class="btn_all medium d-block">
                                    {{__('project.view_project')}}
                                    <svg class="ml-2" width="21" height="20" viewBox="0 0 21 20" fill="none"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                              d="M3.8335 10.0003C3.8335 9.54009 4.20659 9.16699 4.66683 9.16699H16.3335C16.7937 9.16699 17.1668 9.54009 17.1668 10.0003C17.1668 10.4606 16.7937 10.8337 16.3335 10.8337H4.66683C4.20659 10.8337 3.8335 10.4606 3.8335 10.0003Z"
                                              fill="white"/>
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                              d="M9.91058 3.57709C10.236 3.25165 10.7637 3.25165 11.0891 3.57709L16.9224 9.41042C17.2479 9.73586 17.2479 10.2635 16.9224 10.5889L11.0891 16.4223C10.7637 16.7477 10.236 16.7477 9.91058 16.4223C9.58514 16.0968 9.58514 15.5692 9.91058 15.2438L15.1547 9.99967L9.91058 4.7556C9.58514 4.43016 9.58514 3.90252 9.91058 3.57709Z"
                                              fill="white"/>
                                    </svg>
                                </a>
                            </div>
                        @endforeach
                    @endempty
                </div>
            </div>
        </div>
    </section>
    <section class="section_invest section_all">
        <div class="container">
            <a href="" class="logo-footer d-block img mb-lg-4 mb-4 wow fadeInUp">
                <img src="{{asset('frontend/images/logo.png')}}" class="img-fluid" alt=""/>
            </a>
            <div class="desc mb-lg-4 mb-4 wow fadeInUp">
                “ (giới thiệu về công ty) Ipsum is simply dummy text of the printing
                and typesetting industry. Lorem Ipsum has been the industry's
                standard dummy text ever since the 1500s, when an unknown printer
                took a galley of type and scrambled it to make a type specimen
                book.of Lorem Ipsum. ”
            </div>
            <a href="{{route('customer.home_page')}}" title="Xem ngay các khoản đầu tư" class="btn_all lg wow fadeInUp">Xem
                ngay các khoản đầu tư</a>
        </div>
    </section>
    <section class="feel section_all">
        <div class="container">
            <p class="title_small wow fadeInUp">TESTIMONIAL</p>
            <p class="title_lg mb-lg-3 mb-2 wow fadeInUp">
                Một số phản hồi về chúng tôi
            </p>
            <div class="s-content mb-lg-4 mb-3 wow fadeInUp">
                Lorem Ipsum is simply dummy text of the printing and typesetting
                industry. Lorem Ipsum has been the industry's standard dummy text
                ever since the 1500s, when an unknown printer Lorem Ipsum is simply
                dummy text of the printing and typesetting industry. Lorem Ipsum has
                been the industry's standard dummy text ever since the 1500s, when
                an unknown printer
            </div>
            <div class="swiper swiper-feels wow fadeInUp">
                <div class="swiper-wrapper">
                    <div class="swiper-slide h-auto">
                        <div class="item_fell p-lg-3 p-2 wow fadeInUp" data-wow-delay="0.5s" data-wow-duration="0.3s">
                            <div class="img mx-auto d-block mb-lg-3 mb-2">
                                <img src="{{asset('frontend/images/avatar.jpg')}}" class="img-fluid" alt=""/>
                            </div>
                            <div class="desc mb-lg-3 mb-2">
                                “ (lời phản hồi) Ipsum is simply dummy text of the
                                printing and typesetting industry. Lorem Ipsum has
                                been the industry's standard dummy text ever since
                                type specimencluding versions of Lorem Ipsum. ”
                            </div>
                            <div class="text-center pos">Nhân viên văn phòng</div>
                            <div class="text-center name">Jennifer Shapiro</div>
                        </div>
                    </div>
                    <div class="swiper-slide h-auto">
                        <div class="item_fell p-lg-3 p-2 wow fadeInUp" data-wow-delay="0.7s" data-wow-duration="0.3s">
                            <div class="img mx-auto d-block mb-lg-3 mb-2">
                                <img src="{{asset('frontend/images/avatar.jpg')}}" class="img-fluid" alt=""/>
                            </div>
                            <div class="desc mb-lg-3 mb-2">
                                “ (lời phản hồi) Ipsum is simply dummy text of the
                                printing and typesetting industry. Lorem Ipsum has
                                been the industry's standard dummy text ever since
                                type specimencluding versions of Lorem Ipsum. ”
                            </div>
                            <div class="text-center pos">Nhân viên văn phòng</div>
                            <div class="text-center name">Jennifer Shapiro</div>
                        </div>
                    </div>
                    <div class="swiper-slide h-auto">
                        <div class="item_fell p-lg-3 p-2 wow fadeInUp" data-wow-delay="0.9s" data-wow-duration="0.3s">
                            <div class="img mx-auto d-block mb-lg-3 mb-2">
                                <img src="{{asset('frontend/images/avatar.jpg')}}" class="img-fluid" alt=""/>
                            </div>
                            <div class="desc mb-lg-3 mb-2">
                                “ (lời phản hồi) Ipsum is simply dummy text of the
                                printing and typesetting industry. Lorem Ipsum has
                                been the industry's standard dummy text ever since
                                type specimencluding versions of Lorem Ipsum. ”
                            </div>
                            <div class="text-center pos">Nhân viên văn phòng</div>
                            <div class="text-center name">Jennifer Shapiro</div>
                        </div>
                    </div>
                    <div class="swiper-slide h-auto">
                        <div class="item_fell p-lg-3 p-2 wow fadeInUp" data-wow-delay="1.1s" data-wow-duration="0.3s">
                            <div class="img mx-auto d-block mb-lg-3 mb-2">
                                <img src="{{asset('frontend/images/avatar.jpg')}}" class="img-fluid" alt=""/>
                            </div>
                            <div class="desc mb-lg-3 mb-2">
                                “ (lời phản hồi) Ipsum is simply dummy text of the
                                printing and typesetting industry. Lorem Ipsum has
                                been the industry's standard dummy text ever since
                                type specimencluding versions of Lorem Ipsum. ”
                            </div>
                            <div class="text-center pos">Nhân viên văn phòng</div>
                            <div class="text-center name">Jennifer Shapiro</div>
                        </div>
                    </div>
                    <div class="swiper-slide h-auto">
                        <div class="item_fell p-lg-3 p-2 wow fadeInUp" data-wow-delay="1.3s" data-wow-duration="0.3s">
                            <div class="img mx-auto d-block mb-lg-3 mb-2">
                                <img src="{{asset('frontend/images/avatar.jpg')}}" class="img-fluid" alt=""/>
                            </div>
                            <div class="desc mb-lg-3 mb-2">
                                “ (lời phản hồi) Ipsum is simply dummy text of the
                                printing and typesetting industry. Lorem Ipsum has
                                been the industry's standard dummy text ever since
                                type specimencluding versions of Lorem Ipsum. ”
                            </div>
                            <div class="text-center pos">Nhân viên văn phòng</div>
                            <div class="text-center name">Jennifer Shapiro</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop
