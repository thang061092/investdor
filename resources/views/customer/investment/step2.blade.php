@extends("customer.layout.master")
@section('page_name', __('page_name.investment'))
@section("content")
    @include('customer.investment.header')
    <section class="invest mt-lg-3 pt-5">
        <div class="container">
            <form action="" method="" class="frm-set-invest invest-step-2 wow fadeInUp">
                <div class="wrapper-set-invest mx-auto">
                    <p class="title_lg">Số tiền bạn muốn đầu tư</p>
                    <label for="" class="d-block mb-2">
                        Số phần đầu tư
                    </label>
                    <input type="text" name="" placeholder="Nhập số phần bạn muốn đầu tư" class="form-control" />
                    <p class="c-note mb-3 mt-1">
                        Giá bán: 50.000vnđ / phần, Bạn cầu đầu tư tối thiểu
                        10 phần
                    </p>
                    <label for="" class="d-block mb-2">
                        Số tiền đầu tư
                    </label>
                    <input disabled type="text" name="" placeholder="Hiển thị số tiền đầu tư theo số phần" class="form-control" />
                </div>
                <button type="submit" class="btn_all mt-xl-5 mt-lg-4 mt-3">
                    Tiếp tục
                </button>
            </form>
        </div>
    </section>
@stop
