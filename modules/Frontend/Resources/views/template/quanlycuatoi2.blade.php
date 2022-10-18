@extends("frontend::template.index")

@section("content")
    <div class="banner_no_image mb-3">
        <h2 class="banner_title text-center wow fadeInUp">Quản lý của bạn</h2>
    </div>
    <section class="manager">
        <div class="container">
            <div class="text-center tabs-main mb-xl-4 mb-3 wow fadeInUp">
                <a href="" title="" class="current-tab d-inline-block tab">Quản lý đầu tư</a>
                <a href="" title="" class="d-inline-block tab">Lịch sử đầu từ</a>
                <a href="" title="" class="d-inline-block tab">Profile cá nhân</a>
            </div>
            <div class="text-center tabs-child mb-xl-4 mb-3 wow fadeInUp">
                <a href="" title="" class="current-tab d-inline-block tab">Đang đầu tư</a>
                <a href="" title="" class="d-inline-block tab">Đã hoàn thành</a>
                <a href="" title="" class="d-inline-block tab">Chờ xác nhận</a>
            </div>
        </div>
    </section>
    <div class="manager-panel">
        <div class="container">
            <div class="row ls-index mb-xl-4 mb-3 wow fadeInUp">
                <div class="col-lg-auto col-md-6 col-12 mb-lg-0 mb-3">
                    <div class="box-index">
                        <p class="title mb-2">Tổng số tiền đầu tư</p>
                        <div class="index">XX.000.000$</div>
                    </div>
                </div>
                <div class="col-lg-auto col-md-6 col-12 mb-lg-0 mb-3">
                    <div class="box-index">
                        <p class="title mb-2">Tổng số Thời gian đầu tư</p>
                        <div class="index">XX.000.000$</div>
                    </div>
                </div>
                <div class="col-lg-auto col-md-6 col-12 mb-lg-0 mb-3">
                    <div class="box-index">
                        <p class="title mb-2">
                            Giá trị khoản đầu tư tạm tính
                        </p>
                        <div class="index">XX.000.000$</div>
                    </div>
                </div>
                <div class="col-lg-auto col-md-6 col-12 mb-lg-0 mb-3">
                    <div class="box-index">
                        <p class="title mb-2">Lợi nhuận tạm tính</p>
                        <div class="index">XX.000.000$</div>
                    </div>
                </div>
                <div class="col-lg-auto col-md-6 col-12 mb-lg-0 mb-3">
                    <div class="box-index">
                        <p class="title mb-2">Lợi nhuận tạm tính</p>
                        <div class="index">XX.000.000$</div>
                    </div>
                </div>
            </div>
            <p class="title_lg pt-2">Danh sách dự án đã hoàn thành</p>
            <form action="" method="" accept-charset="utf-8">
                <div class="group-filter group-text wow fadeInUp">
                    <div class="group position-relative">
                        <input type="text" placeholder="Nhập tên dự án" class="form-control"/>
                        <button type="submit">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16"
                                 fill="none">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                      d="M7.3335 2.66732C4.75617 2.66732 2.66683 4.75666 2.66683 7.33398C2.66683 9.91131 4.75617 12.0007 7.3335 12.0007C9.91083 12.0007 12.0002 9.91131 12.0002 7.33398C12.0002 4.75666 9.91083 2.66732 7.3335 2.66732ZM1.3335 7.33398C1.3335 4.02028 4.01979 1.33398 7.3335 1.33398C10.6472 1.33398 13.3335 4.02028 13.3335 7.33398C13.3335 10.6477 10.6472 13.334 7.3335 13.334C4.01979 13.334 1.3335 10.6477 1.3335 7.33398Z"
                                      fill="#676767"/>
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                      d="M10.6284 10.6289C10.8887 10.3685 11.3108 10.3685 11.5712 10.6289L14.4712 13.5289C14.7315 13.7892 14.7315 14.2113 14.4712 14.4717C14.2108 14.732 13.7887 14.732 13.5284 14.4717L10.6284 11.5717C10.368 11.3113 10.368 10.8892 10.6284 10.6289Z"
                                      fill="#676767"/>
                            </svg>
                        </button>
                    </div>
                </div>
            </form>
            <div class="row mx-0 item-project-invest d-lg-flex d-none wow fadeInUp">
                <div class="col-lg-auto px-0">
                    <p class="c-label">Dự án</p>
                </div>
                <div class="col-lg-auto px-0">
                    <p class="c-label">Tổng số tiền đầu tư dự án</p>
                </div>
                <div class="col-lg-auto px-0">
                    <p class="c-label">Giá trị khoản đầu tư tạm tính</p>
                </div>
                <div class="col-lg-auto px-0">
                    <p class="c-label">Lợi nhuận tạm tính</p>
                </div>
                <div class="col-lg-auto px-0">
                    <p class="c-label">Lợi nhuận tạm tính</p>
                </div>
                <div class="col-lg-auto px-0">
                    <p class="c-label">Ngày bắt đầu</p>
                </div>
                <div class="col-lg-auto px-0">
                    <p class="c-label">Thời gian đầu tư</p>
                </div>
            </div>
            <div class="row mx-0 item-project-invest wow fadeInUp">
                <div class="col-lg-auto px-0">
                    <a data-title="Tên dự án" href="" title="" class="name-project c-value">
                        Khách sạn Intercontinatal</a>
                </div>
                <div class="col-lg-auto px-0">
                    <p class="c-value" data-title="Tổng số tiền đầu tư dự án">
                        xx.xxx.xxx$
                    </p>
                </div>
                <div class="col-lg-auto px-0">
                    <p class="c-value" data-title="Giá trị khoản đầu tư tạm tính">
                        xx.xxx.xxx$
                    </p>
                </div>
                <div class="col-lg-auto px-0">
                    <p class="c-value" data-title="Lợi nhuận tạm tính">
                        xx.xxx.xxx$
                    </p>
                </div>
                <div class="col-lg-auto px-0">
                    <p class="c-value" data-title="Lợi nhuận tạm tính">
                        xx%
                    </p>
                </div>
                <div class="col-lg-auto px-0">
                    <p class="c-value" data-title="Ngày bắt đầu">
                        12/11/2021
                    </p>
                </div>
                <div class="col-lg-auto px-0">
                    <p class="c-value" data-title="Thời gian đầu tư">
                        12 tháng
                    </p>
                </div>
            </div>
            <div class="pagi text-center wow fadeInUp">
                <a href="">1</a>
                <strong>2</strong>
            </div>
        </div>
    </div>
@stop
