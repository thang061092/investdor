@extends("customer.layout.master")
@section('page_name', __('page_name.home_page'))
@section("content")
    <section class="category">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 aside mb-lg-0 mb-3 wow fadeInLeft">
                    <div class="filter_mobile d-lg-none d-flex align-items-center justify-content-between">
                        <p class="title">{{__('project.chance_for_you', ['total'=> count($projects)])}}</p>
                        <div class="box">
                        <span class="show-filter mr-2">
                            {{__('project.search')}}
                            <svg class="ml-1" xmlns="http://www.w3.org/2000/svg" width="21" height="20"
                                 viewBox="0 0 21 20" fill="none">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                      d="M10.5 8.75C10.8452 8.75 11.125 9.02982 11.125 9.375V16.875C11.125 17.2202 10.8452 17.5 10.5 17.5C10.1548 17.5 9.875 17.2202 9.875 16.875V9.375C9.875 9.02982 10.1548 8.75 10.5 8.75Z"
                                      fill="#03204C"/>
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                      d="M10.5 2.5C10.8452 2.5 11.125 2.77982 11.125 3.125V6.875C11.125 7.22018 10.8452 7.5 10.5 7.5C10.1548 7.5 9.875 7.22018 9.875 6.875V3.125C9.875 2.77982 10.1548 2.5 10.5 2.5Z"
                                      fill="#03204C"/>
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                      d="M16.125 15C16.4702 15 16.75 15.2798 16.75 15.625V16.875C16.75 17.2202 16.4702 17.5 16.125 17.5C15.7798 17.5 15.5 17.2202 15.5 16.875V15.625C15.5 15.2798 15.7798 15 16.125 15Z"
                                      fill="#03204C"/>
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                      d="M16.125 2.5C16.4702 2.5 16.75 2.77982 16.75 3.125V13.125C16.75 13.4702 16.4702 13.75 16.125 13.75C15.7798 13.75 15.5 13.4702 15.5 13.125V3.125C15.5 2.77982 15.7798 2.5 16.125 2.5Z"
                                      fill="#03204C"/>
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                      d="M13.625 13.125C13.625 12.7798 13.9048 12.5 14.25 12.5H18C18.3452 12.5 18.625 12.7798 18.625 13.125C18.625 13.4702 18.3452 13.75 18 13.75H14.25C13.9048 13.75 13.625 13.4702 13.625 13.125Z"
                                      fill="#03204C"/>
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                      d="M4.875 12.5C5.22018 12.5 5.5 12.7798 5.5 13.125V16.875C5.5 17.2202 5.22018 17.5 4.875 17.5C4.52982 17.5 4.25 17.2202 4.25 16.875V13.125C4.25 12.7798 4.52982 12.5 4.875 12.5Z"
                                      fill="#03204C"/>
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                      d="M4.875 2.5C5.22018 2.5 5.5 2.77982 5.5 3.125V10.625C5.5 10.9702 5.22018 11.25 4.875 11.25C4.52982 11.25 4.25 10.9702 4.25 10.625V3.125C4.25 2.77982 4.52982 2.5 4.875 2.5Z"
                                      fill="#03204C"/>
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                      d="M2.375 10.625C2.375 10.2798 2.65482 10 3 10H6.75C7.09518 10 7.375 10.2798 7.375 10.625C7.375 10.9702 7.09518 11.25 6.75 11.25H3C2.65482 11.25 2.375 10.9702 2.375 10.625Z"
                                      fill="#03204C"/>
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                      d="M8 6.875C8 6.52982 8.27982 6.25 8.625 6.25H12.375C12.7202 6.25 13 6.52982 13 6.875C13 7.22018 12.7202 7.5 12.375 7.5H8.625C8.27982 7.5 8 7.22018 8 6.875Z"
                                      fill="#03204C"/>
                            </svg>
                        </span>
                            <span class="reset-filter">Bỏ lọc</span>
                        </div>
                    </div>
                    <div class="box-filter">
                        <p class="title_lg">{{__('project.chance_for_you', ['total'=> count($projects)])}}</p>
                        <div class="desc font-weight-bold">
                            {{__('project.search')}}
                        </div>
                        <form action="" method="" class="frm_filter" accept-charset="utf-8">
                            <div class="group-filter group-text">
                                <label for="name_project"
                                       class="name_group label">{{__('project.name_project')}}</label>
                                <div class="group position-relative">
                                    <input type="text" placeholder="Nhập tên dự án" class="form-control"/>
                                    <button type="submit">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                             viewBox="0 0 16 16" fill="none">
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
                            @if(!empty(session()->get('customer')))
                                <div class="group-filter group-checkbox">
                                    <div class="name_group desc font-weight-bold">
                                        {{__('project.investment_status')}}
                                    </div>
                                    <label for="state-1" class="check">
                                        <input type="checkbox" id="state-1" name=""/>
                                        <span class="text">{{__('project.not_invested')}}</span>
                                    </label>
                                    <label for="state-2" class="check">
                                        <input type="checkbox" id="state-2" name=""/>
                                        <span class="text">{{__('project.invested')}}</span>
                                    </label>
                                </div>
                            @endif
                            <div class="group-filter group-checkbox">
                                <div class="name_group desc font-weight-bold">
                                    {{__('project.project_status')}}
                                </div>
                                <label for="state-3" class="check">
                                    <input type="checkbox" id="state-3" name=""/>
                                    <span class="text">{{__('project.open')}}</span>
                                </label>
                                <label for="state-4" class="check">
                                    <input type="checkbox" id="state-4" name=""/>
                                    <span class="text">{{__('project.close')}}</span>
                                </label>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-9 wow fadeInRight">
                    <p class="title_lg mb-xl-4 mb-3">{{__('project.open')}}</p>
                    <div class="row">
                        @empty($projects[0])
                            <div class="text-danger" style="text-align: center">{{__('table.no_data')}}</div>
                        @else
                            @foreach($projects as $k => $v)
                                <div class="col-xl-4 col-lg-6 col-sm-6 col-12 mb-lg-4 mb-5 wow fadeInUp"
                                     data-wow-delay="0.3s"
                                     data-wow-duration="0.5s">
                                    <div class="item_project">
                            <span class="status d-block w-100">
                                {{__('project.on_sale')}}
                            </span>
                                        <a href="{{route('customer.detail_project',session()->get('lang') == \App\Http\Controllers\BaseController::LANG_EN ? $v->slug_en : $v->slug_vi)}}"
                                           title="" class="d-block img">
                                            <img
                                                src="{{!empty($v->image) ? $v->image : asset('frontend/images/img1.jpg')}}"
                                                class="img-fluid" alt=""/>
                                            <span
                                                class="category inline-block text-white">{{type_project($v->type)}}</span>
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
                                                    <span
                                                        class="number ml-3">{{number_format_vn($v->part)}}</span>
                                                </div>
                                                <div class="process d-flex flex-nowrap">
                                                    <span class="d-block text-center" style="width: 20%">20.000</span>
                                                    <span class="d-block text-center" style="width: 80%">80.000</span>
                                                </div>
                                            </div>
                                            <div class="ls-profit">
                                                <p class="profit mb-2 d-flex align-items-center">
                                                    <svg class="mr-2" width="16" height="16" viewBox="0 0 16 16"
                                                         fill="none"
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
                                                    <span class="num-profit ml-3">{{$current_interest}}%</span>
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
                    <div class="line my-xl-4 my-lg-3 my-2"></div>
                    <p class="title_lg mb-xl-4 mb-3">{{__('project.open')}}</p>
                    <div class="row">
                        @empty($projects[0])
                            <div class="text-danger" style="text-align: center">{{__('table.no_data')}}</div>
                        @else
                            @foreach($projects as $k => $v)
                                <div class="col-xl-4 col-lg-6 col-sm-6 col-12 mb-lg-4 mb-5 wow fadeInUp"
                                     data-wow-delay="0.3s"
                                     data-wow-duration="0.5s">
                                    <div class="item_project">
                            <span class="status d-block w-100">
                                {{__('project.on_sale')}}
                            </span>
                                        <a href="{{route('customer.detail_project',session()->get('lang') == \App\Http\Controllers\BaseController::LANG_EN ? $v->slug_en : $v->slug_vi)}}"
                                           title="" class="d-block img">
                                            <img
                                                src="{{!empty($v->image) ? $v->image : asset('frontend/images/img1.jpg')}}"
                                                class="img-fluid" alt=""/>
                                            <span
                                                class="category inline-block text-white">{{type_project($v->type)}}</span>
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
                                                    <span
                                                        class="number ml-3">{{number_format_vn($v->part)}}</span>
                                                </div>
                                                <div class="process d-flex flex-nowrap">
                                                    <span class="d-block text-center" style="width: 20%">20.000</span>
                                                    <span class="d-block text-center" style="width: 80%">80.000</span>
                                                </div>
                                            </div>
                                            <div class="ls-profit">
                                                <p class="profit mb-2 d-flex align-items-center">
                                                    <svg class="mr-2" width="16" height="16" viewBox="0 0 16 16"
                                                         fill="none"
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
                                                    <span class="num-profit ml-3">{{$current_interest}}%</span>
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
                    <div class="line my-xl-4 my-lg-3 my-2"></div>
                    <div class="load_more text-center">
                        <a href="" title="{{__('project.view_investments_other')}}"
                           class="btn_all blue mx-auto">{{__('project.view_investments_other')}}</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
