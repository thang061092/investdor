@extends("frontend::template.index")
@section("content")
    <section class="notification mt-lg-4 mt-3 pt-2">
        <div class="container">
            <div class="wrapper-notification mx-auto">
                <p class="title_lg wow fadeInUp">Thông báo</p>
                <div
                    class="item-notification position-relative has-view p-lg-3 p-2 shadow-lg mb-lg-4 mb-3 wow fadeInUp">
                    <div class="row">
                        <div class="col-2">
                            <div class="img">
                                <img src="{{asset('frontend/images/logo.png')}}" class="img-fluid" alt=""/>
                            </div>
                        </div>
                        <div class="col-10">
                            <p class="title pr-3">
                                InvestDor đã nhận được khoản đầu tư của bạn
                            </p>
                            <div class="time-notification mb-2">
                                06/09/2022 12:00:00
                            </div>
                            <div class="content">
                                Xin chúc mừng! Bạn vừa đầu tư thành công
                                1000 phần dự án Intercontinatal Mega Mall.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop
