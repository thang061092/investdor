@extends("customer.layout.master")
@section('page_name', __('page_name.investment_management'))
@section("content")
    @include('customer.user.header-your-manager')
    <div class="manager-panel">
        <div class="container">
            <div class="row ls-index mb-xl-4 mb-3 justify-content-center wow fadeInUp">
                <div class="col-lg-auto col-md-6 col-12 mb-lg-0 mb-3">
                    <div class="box-index">
                        <p class="title mb-2">{{__('project.total_investment')}}</p>
                        <div
                            class="index">{{!empty($report['total_money_invest'])  ? number_format_vn($report['total_money_invest']) : 0}}
                            VND
                        </div>
                    </div>
                </div>
                <div class="col-lg-auto col-md-6 col-12 mb-lg-0 mb-3">
                    <div class="box-index">
                        <p class="title mb-2">{{__('project.total_project')}}</p>
                        <div
                            class="index">{{!empty($report['total_invest'])  ? number_format_vn($report['total_invest']) : 0}}</div>
                    </div>
                </div>
            </div>
            <div class="d-flex flex-wrap align-items-center justify-content-between">
                <p class="title_lg pt-2 wow fadeInUp">{{__('project.waiting_approval')}}</p>
                <form action="{{route('customer.user.manager')}}" method="get" accept-charset="utf-8" class="frm-filter">
                    <div class="group-filter group-text wow fadeInUp">
                        <div class="group position-relative">
                            <input type="text" placeholder="{{__('project.enter_name_project')}}" class="form-control"
                                   name="name_project" value="{{request()->get('name_project')}}"/>
                            <input type="hidden" name="main_tab" value="manager">
                            <input type="hidden" name="tab" value="warning">
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
            </div>
            <div class="row mx-0 item-project-invest complete d-lg-flex d-none wow fadeInUp">
                <div class="col-lg-auto px-0">
                    <p class="c-label">{{__('table.project')}}</p>
                </div>
                <div class="col-lg-auto px-0">
                    <p class="c-label">{{__('table.project_investment_amount')}}</p>
                </div>
            </div>
            @foreach($bills as $bill)
                <div class="row mx-0 item-project-invest complete">
                    <div class="col-lg-auto px-0">
                        <a data-title="Tên dự án"
                           href="{{route('customer.detail_project',['slug'=>$bill->realEstateProject->slug_vi])}}"
                           title="" class="name-project c-value">
                            {{session()->get('lang') == 'en' ? $bill->realEstateProject->name_en : $bill->realEstateProject->name_vi}}</a>
                    </div>
                    <div class="col-lg-auto px-0">
                        <p class="c-value" data-title="{{__('table.project_investment_amount')}}">
                            {{number_format_vn($bill->amount_money)}} VND
                        </p>
                    </div>
                </div>
            @endforeach
            <div class="pagi text-center wow fadeInUp">
                {{$bills->appends(request()->query())}}
            </div>
        </div>
    </div>
    <style>
        /*.page-link {*/
        /*    background-color: #03204c !important;*/
        /*    border-color: #03204c;*/
        /*}*/
    </style>
@stop
