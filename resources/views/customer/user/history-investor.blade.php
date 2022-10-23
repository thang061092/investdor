@extends("customer.layout.master")
@section('page_name', __('page_name.investment_history'))
@section("content")
    @include('customer.user.header-your-manager')
    <div class="manager-panel">
        <div class="container">
            <p class="title_lg pt-2 wow fadeInUp">Danh sách dự án đang đầu tư</p>
            <form action="" method="" accept-charset="utf-8" class="wow fadeInUp">
                <div class="group-filter group-text">
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
            <div class="row mx-0 item-project-invest history d-lg-flex d-none wow fadeInUp">
                <div class="col-lg-auto px-0">
                    <p class="c-label">Dự án</p>
                </div>
                <div class="col-lg-auto px-0">
                    <p class="c-label">Tổng số tiền đầu tư dự án</p>
                </div>
                <div class="col-lg-auto px-0">
                    <p class="c-label">Ngày đầu tư</p>
                </div>
                <div class="col-lg-auto px-0">
                    <p class="c-label">Ngày bắt đầu</p>
                </div>
                <div class="col-lg-auto px-0">
                    <p class="c-label">Thời gian đầu tư</p>
                </div>
            </div>
            <div class="row mx-0 item-project-invest history wow fadeInUp">
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
                    <p class="c-value" data-title="Ngày đầu tư">xx%</p>
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