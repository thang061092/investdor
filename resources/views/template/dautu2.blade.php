@extends("template.index")
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
            <form action="" method="" class="frm-set-invest wow fadeInUp">
                <div class="wrapper-set-invest mx-auto">
                    <p class="title_lg">Số tiền bạn muốn đầu tư</p>
                    <label for="" class="d-block mb-2">
                        Số phần đầu tư
                    </label>
                    <input type="text" name="" placeholder="Nhập số phần bạn muốn đầu tư" class="form-control"/>
                    <p class="c-note mb-3 mt-1">
                        Giá bán: 50.000vnđ / phần, Bạn cầu đầu tư tối thiểu
                        10 phần
                    </p>
                    <label for="" class="d-block mb-2">
                        Số tiền đầu tư
                    </label>
                    <input disabled type="text" name="" placeholder="Hiển thị số tiền đầu tư theo số phần"
                           class="form-control"/>
                </div>
                <button type="submit" class="btn_all mt-xl-5 mt-lg-4 mt-3">
                    Tiếp tục
                </button>
            </form>
        </div>
    </section>
@stop
