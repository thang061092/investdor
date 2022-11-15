@extends("customer.layout.master")
@section('page_name', __('page_name.investment'))
@section("content")
    @include('customer.investment.header')
    <section class="invest mt-lg-3 pt-5">
        <div class="container">
            <form action="{{route('investment.step2_submit')}}" method="post" class="frm-set-invest invest-step-2 wow fadeInUp">
                @csrf
                <div class="wrapper-set-invest mx-auto">
                    <p class="title_lg">Số tiền bạn muốn đầu tư</p>
                    <label for="" class="d-block mb-2">
                        Số phần đầu tư
                    </label>
                    <input type="text" name="part_investment" placeholder="Nhập số phần bạn muốn đầu tư"
                           class="form-control part_investment"/>
                    <p class="c-note mb-3 mt-1">
                        Giá bán: <span class="text-danger">{{number_format_vn($project->value_part)}}</span>vnđ / phần,
                        Bạn cầu đầu tư tối
                        thiểu
                        10 phần
                    </p>
                    <label for="" class="d-block mb-2">
                        Số tiền đầu tư
                    </label>
                    <input disabled type="text" name="total_value_part"
                           placeholder="Hiển thị số tiền đầu tư theo số phần"
                           class="form-control"/>
                    <input type="hidden" name="checksum" value="{{$checksum}}">
                    <input type="hidden" name="value_part" value="{{$project->value_part}}">
                </div>
                <button type="submit" class="btn_all mt-xl-5 mt-lg-4 mt-3">
                    Tiếp tục
                </button>
            </form>
        </div>
    </section>
@endsection
@section('js')
    <script>
        $(document).ready(function () {
            $('.part_investment').on('keyup', function () {
                let part = $(this).val();
                let value_part = $("input[name='value_part']").val()
                if (part) {
                    $("input[name='total_value_part']").val(addCommas(part * value_part))
                } else {
                    $("input[name='total_value_part']").val(0)
                }
            })
        })

        function addCommas(str) {
            return str.toString().replace(/^0+/, '').replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        }
    </script>
@endsection
