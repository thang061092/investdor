@if($config_view && $config_view['rate'] == 'active')
    @if(!empty($project->evaluaties))
        <section id="danhgia" class="ratting wow fadeInUp">
            <div class="container">
                <p class="title_lg text-center">Đánh giá từ Investdor</p>
                <div class="swiper swiper-rattings">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="item-ratting d-flex flex-wrap">
                                <div class="img">
                                    <img src="{{asset('frontend/images/danh-gia.jpg')}}" class="img-fluid" alt=""/>
                                </div>
                                <div class="content">
                                    <p class="title">Jennifer Shapiro</p>
                                    <div class="pos">
                                        Tổng giám đốc Tổng công ty xây dựng
                                        Thanh Hoa
                                    </div>
                                    <div class="ratting-score">9.5/10</div>
                                    <div class="time-ratting">12/11/2021</div>
                                    <div class="desc">
                                        ( đánh giá về dự dán)Lorem Ipsum is
                                        simply dummy text of the printing and
                                        typesetting industry. Lorem Ipsum has
                                        been the industry's standard dummy text
                                        ever since the 1500s, when an unknown
                                        printer Lorem Ipsum is simply dummy text
                                        of the printing and typesetting
                                        industry. Lorem Ipsum has been the
                                        industry's standard dummy text ever
                                        since the 1500s, when an unknown
                                        printerLorem Ipsum is simply dummy text
                                        of the printing and typesetting
                                        industry. Lorem Ipsum has been the
                                        industry's standard dummy text ever
                                        since the 1500s, when an unknown
                                        printerLorem Ipsum is simply dummy text
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="item-ratting d-flex flex-wrap">
                                <div class="img">
                                    <img src="{{asset('frontend/images/danh-gia.jpg')}}" class="img-fluid" alt=""/>
                                </div>
                                <div class="content">
                                    <p class="title">Jennifer Shapiro</p>
                                    <div class="pos">
                                        Tổng giám đốc Tổng công ty xây dựng
                                        Thanh Hoa
                                    </div>
                                    <div class="ratting-score">9.5/10</div>
                                    <div class="time-ratting">12/11/2021</div>
                                    <div class="desc">
                                        ( đánh giá về dự dán)Lorem Ipsum is
                                        simply dummy text of the printing and
                                        typesetting industry. Lorem Ipsum has
                                        been the industry's standard dummy text
                                        ever since the 1500s, when an unknown
                                        printer Lorem Ipsum is simply dummy text
                                        of the printing and typesetting
                                        industry. Lorem Ipsum has been the
                                        industry's standard dummy text ever
                                        since the 1500s, when an unknown
                                        printerLorem Ipsum is simply dummy text
                                        of the printing and typesetting
                                        industry. Lorem Ipsum has been the
                                        industry's standard dummy text ever
                                        since the 1500s, when an unknown
                                        printerLorem Ipsum is simply dummy text
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif
@endif
