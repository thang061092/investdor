@extends("customer.layout.master")
@section('page_name', __('page_name.investment'))
@section("content")
    @include('customer.investment.header')
    <section class="invest mt-lg-3 pt-5">
        <div class="container">
            <div class="frm-set-invest invest-step-2 wow fadeInUp">
                <div class="wrapper-set-invest mx-auto">
                    <p class="title_lg">{{__('project.Amount_you_want_to_invest')}}</p>
                    <label for="" class="d-block mb-2">
                        {{__('project.Investment_part_number')}}
                    </label>
                    <input type="number" name="part_investment"
                           placeholder="{{__('project.Enter_the_part_number_you_want_to_invest')}}"
                           class="form-control part_investment"/>
                    <p class="c-note mb-3 mt-1">
                        {{__('project.price')}}: <span
                            class="text-danger">{{number_format_vn($project->value_part)}}</span>VND /
                        {{__('project.part')}}, &nbsp;
                        {{__('project.You_need_to_invest_in_the_evening_minimum_10_parts')}}
                    </p>
                    <label for="" class="d-block mb-2">
                        {{__('project.total_investment')}}
                    </label>
                    <input disabled type="text" name="total_value_part"
                           placeholder="0"
                           class="form-control"/>
                    <input type="hidden" name="checksum" value="{{$checksum}}">
                    <input type="hidden" name="value_part" value="{{$project->value_part}}">
                </div>
                <button type="button" class="btn_all mt-xl-5 mt-lg-4 mt-3 step2">
                    {{__('button.continue')}}
                </button>
            </div>
        </div>
    </section>
@endsection
@section('js')
    <script src="{{asset('js/investment/step1.js')}}"></script>
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
