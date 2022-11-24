@extends("customer.layout.master")
@section('page_name', __('page_name.detail_project'))
@section("content")
    <section class="banner-project-detail">
        <img src="{{asset('frontend/images/banner.jpg')}}" class="img-fluid" alt=""/>
        <div class="box-banner">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <p class="state wow fadeInUp">ĐANG MỞ ĐẦU TƯ</p>
                        <div class="category-name wow fadeInUp">{{type_project($project->type)}}</div>
                        <h2 class="banner_title wow fadeInUp">Intercontinatal</h2>
                        <div class="banner_desc wow fadeInUp">
                            {{$project->address_vi. ', '. $project->ward->name.', '. $project->district->name .', '. $project->city->name}}
                        </div>
                        <div class="process d-flex flex-nowrap wow fadeInUp">
                            <span class="d-block text-center" style="width: 20%">20.000</span>
                            <span class="d-block text-center" style="width: 80%">80.000</span>
                        </div>
                        <div class="banner-content wow fadeInUp">
                            @if(session()->get('lang') == \App\Http\Controllers\BaseController::LANG_EN)
                                {!! $project->description_en !!}
                            @else
                                {!! $project->description_vi !!}
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-6 d-lg-block d-none">
                        <div class="infomation-project-invest">
                            <p class="title p-lg-3 p-2 wow fadeInUp wow fadeInUp">
                                {{session()->get('lang') == \App\Http\Controllers\BaseController::LANG_EN ? $project->name_en : $project->name_vi}}
                            </p>
                            <div class="box p-lg-3 p-2 wow fadeInUp wow fadeInUp">
                                <span class="invest-percent d-block w-100 text-center">{{$project->interests()->where('status', 'active')->first()->interest ?? 10}}%</span>
                                <span class="c-label mb-xl-4 mb-3">{{__('project.expected_profit')}}</span>
                                <div class="index index-1">
                                    <span class="c-label">{{__('project.total_investment')}}</span>
                                    <span class="c-value">{{number_format_vn($project->total_value)}}</span>
                                </div>
                                <div class="index index-2">
                                    <span class="c-label">Estimated Hold Period</span>
                                    <span class="c-value">12</span>
                                </div>
                                <div class="index index-3">
                                <span class="c-label">
                                    Minimum Investmen</span>
                                    <span class="c-value">20</span>
                                </div>
                                <div class="index index-4">
                                    <span class="c-label">{{__('project.price')}}</span>
                                    <span
                                        class="c-value">{{number_format_vn($project->value_part)}} VND/{{__('project.part')}}</span>
                                </div>
                            </div>
                            <a href="{{route('investment.step1',['slug'=> $project->slug_vi])}}" title=""
                               class="btn_all lg wow fadeInUp">{{__('project.invest_now')}}
                                <svg class="ml-2" xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                     viewBox="0 0 20 20" fill="none">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                          d="M3.33398 9.99935C3.33398 9.53911 3.70708 9.16602 4.16732 9.16602H15.834C16.2942 9.16602 16.6673 9.53911 16.6673 9.99935C16.6673 10.4596 16.2942 10.8327 15.834 10.8327H4.16732C3.70708 10.8327 3.33398 10.4596 3.33398 9.99935Z"
                                          fill="white"/>
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                          d="M9.41009 3.57806C9.73553 3.25263 10.2632 3.25263 10.5886 3.57806L16.4219 9.4114C16.7474 9.73683 16.7474 10.2645 16.4219 10.5899L10.5886 16.4232C10.2632 16.7487 9.73553 16.7487 9.41009 16.4232C9.08466 16.0978 9.08466 15.5702 9.41009 15.2447L14.6542 10.0007L9.41009 4.75657C9.08466 4.43114 9.08466 3.9035 9.41009 3.57806Z"
                                          fill="white"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="infomation-project d-lg-none d-block">
        <div class="container px-0">
            <div class="infomation-project-invest">
                <p class="title p-lg-3 p-2 wow fadeInUp">
                    {{session()->get('lang') == \App\Http\Controllers\BaseController::LANG_EN ? $project->name_en : $project->name_vi}}
                </p>
                <div class="box p-lg-3 p-2 wow fadeInUp">
                    <span class="invest-percent d-block w-100 text-center">{{$project->interests()->where('status', 'active')->first()->interest ?? 12}}%</span>
                    <span class="c-label mb-xl-4 mb-3">{{__('project.expected_profit')}}</span>
                    <div class="index index-1">
                        <span class="c-label">{{__('project.total_investment')}}</span>
                        <span class="c-value">{{number_format_vn($project->total_value)}}</span>
                    </div>
                    <div class="index index-2">
                        <span class="c-label">Estimated Hold Period</span>
                        <span class="c-value">12</span>
                    </div>
                    <div class="index index-3">
                        <span class="c-label"> Minimum Investmen</span>
                        <span class="c-value">20</span>
                    </div>
                    <div class="index index-4">
                        <span class="c-label">{{__('project.price')}}</span>
                        <span
                            class="c-value">{{number_format_vn($project->value_part)}} VND/{{__('project.part')}}</span>
                    </div>
                </div>
                <a href="" title="" class="btn_all lg">{{__('project.invest_now')}}
                    <svg class="ml-2" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"
                         fill="none">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                              d="M3.33398 9.99935C3.33398 9.53911 3.70708 9.16602 4.16732 9.16602H15.834C16.2942 9.16602 16.6673 9.53911 16.6673 9.99935C16.6673 10.4596 16.2942 10.8327 15.834 10.8327H4.16732C3.70708 10.8327 3.33398 10.4596 3.33398 9.99935Z"
                              fill="white"/>
                        <path fill-rule="evenodd" clip-rule="evenodd"
                              d="M9.41009 3.57806C9.73553 3.25263 10.2632 3.25263 10.5886 3.57806L16.4219 9.4114C16.7474 9.73683 16.7474 10.2645 16.4219 10.5899L10.5886 16.4232C10.2632 16.7487 9.73553 16.7487 9.41009 16.4232C9.08466 16.0978 9.08466 15.5702 9.41009 15.2447L14.6542 10.0007L9.41009 4.75657C9.08466 4.43114 9.08466 3.9035 9.41009 3.57806Z"
                              fill="white"/>
                    </svg>
                </a>
            </div>
        </div>
    </section>

    <section class="images">
        <div class="container">
            <div class="swiper swiper-images">
                <div class="swiper-wrapper">
                    @if($project->imageProjects)
                        @foreach($project->imageProjects as $key => $img)
                            <div class="swiper-slide">
                                <a href="{{$img->path}}" data-fancybox="gallery"
                                   data-caption="{{++$key}}">
                                    <div class="img">
                                        <img src="{{$img->path}}" class="img-fluid" alt=""
                                             style="width: 434px;height: 194px"/>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    @else
                        <div class="swiper-slide">
                            <a href="{{asset('frontend/images/img-1.jpg')}}" data-fancybox="gallery">
                                <div class="img">
                                    <img src="{{asset('frontend/images/img-1.jpg')}}" class="img-fluid" alt=""/>
                                </div>
                            </a>
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </section>
    <section class="tabs-project-detail">
        <div class="container">
            <p class="title_small">Intercontinatal</p>
            <p class="title_lg">{{__('project.project_information')}}</p>
            <div class="navv-tabs p-2">
                @if(!empty($project->overviewProject))
                    <a href="#tongquan" title="{{__('project.project_overview')}}"
                       class="d-inline-block">{{__('project.project_overview')}}</a>
                @endif
                @if(!empty($project->assetProject))
                    <a href="#taisan" title="{{__('project.asset')}}" class="d-inline-block">{{__('project.asset')}}</a>
                @endif
                @if(!empty($project->investorProject))
                    <a href="#chudautu" title="{{__('project.investor')}}"
                       class="d-inline-block">{{__('project.investor')}}</a>
                @endif
                @if(count($project->businessPlanes) > 0)
                    <a href="#kehoachkinhdoanh" title="{{__('project.business_plan')}}"
                       class="d-inline-block">{{__('project.business_plan')}}</a>
                @endif
                @if(!empty($project->financials))
                    <a href="#financial" title="{{__('project.financial')}}"
                       class="d-inline-block">{{__('project.financial')}}</a>
                @endif
                @if(count($project->documentProjects) > 0)
                    <a href="#tailieuduan" title="{{__('project.document')}}"
                       class="d-inline-block">{{__('project.document')}}</a>
                @endif
                @if(!empty($project->evaluaties))
                    <a href="#danhgia" title="{{__('project.evaluate')}}"
                       class="d-inline-block">{{__('project.evaluate')}}</a>
                @endif
            </div>
        </div>
    </section>
    @if(!empty($project->overviewProject))
        <section id="#tongquan" class="project-main wow fadeInUp">
            <div class="container">
                <p class="title_lg text-center">{{__('project.project_overview')}}</p>
                <div class="s-content mb-lg-3 pb-1 mb-3">
                    <p>
                        @if(session()->get('lang') == \App\Http\Controllers\BaseController::LANG_EN)
                            {!! $project->overviewProject->overview_en ?? "" !!}
                        @else
                            {!! $project->overviewProject->overview_vi ?? "" !!}
                        @endif
                    </p>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-md-6 col-12 mb-lg-0 mb-4">
                        <div class="item-main">
                            <div class="title d-flex align-items-center justify-content-between mb-lg-4 mb-3">
                                <p class="c-label">{{__('project.address')}}</p>
                                <div class="c-img">
                                    <img src="{{asset('frontend/images/dc.png')}}" class="img-fluid" alt=""/>
                                </div>
                            </div>
                            <div class="contents">
                                @if(session()->get('lang') == \App\Http\Controllers\BaseController::LANG_EN)
                                    {!! $project->overviewProject->address_en ?? "" !!}
                                @else
                                    {!! $project->overviewProject->address_vi ?? "" !!}
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-12 mb-lg-0 mb-4">
                        <div class="item-main">
                            <div class="title d-flex align-items-center justify-content-between mb-lg-4 mb-3">
                                <p class="c-label">{{__('project.market')}}</p>
                                <div class="c-img">
                                    <img src="{{asset('frontend/images/qua-cau.png')}}" class="img-fluid" alt=""/>
                                </div>
                            </div>
                            <div class="contents">
                                @if(session()->get('lang') == \App\Http\Controllers\BaseController::LANG_EN)
                                    {!! $project->overviewProject->market_en ?? "" !!}
                                @else
                                    {!! $project->overviewProject->market_vi ?? "" !!}
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-12 mb-lg-0 mb-4">
                        <div class="item-main">
                            <div class="title d-flex align-items-center justify-content-between mb-lg-4 mb-3">
                                <p class="c-label">{{__('project.basis')}}</p>
                                <div class="c-img">
                                    <img src="{{asset('frontend/images/ngoi-nha.png')}}" class="img-fluid" alt=""/>
                                </div>
                            </div>
                            <div class="contents">
                                @if(session()->get('lang') == \App\Http\Controllers\BaseController::LANG_EN)
                                    {!! $project->overviewProject->basis_en ?? "" !!}
                                @else
                                    {!! $project->overviewProject->basis_vi ?? "" !!}
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif
    @if(!empty($project->assetProject))
        <section id="taisan" class="project-asset wow fadeInUp">
            <div class="container">
                <p class="title_lg text-center">{{__('project.asset')}}</p>
                <div class="row justify-content-between">
                    <div class="col-lg-5 col-md-6 mb-md-3 mb-4">
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="c-label">{{__('project.year_built')}}</div>
                            <div class="c-value">{{$project->assetProject->year_built ?? ""}}</div>
                        </div>
                    </div>
                    <div class="col-lg-5 col-md-6 mb-md-3 mb-4">
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="c-label">
                                {{__('project.estimated_capacity')}}
                            </div>
                            <div class="c-value">{{$project->assetProject->expected_capacity ?? ""}}</div>
                        </div>
                    </div>
                    <div class="col-lg-5 col-md-6 mb-md-3 mb-4">
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="c-label">{{__('project.total_building_area')}}</div>
                            <div class="c-value">{{$project->assetProject->total_building_area ?? ""}}</div>
                        </div>
                    </div>
                    <div class="col-lg-5 col-md-6 mb-md-3 mb-4">
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="c-label">
                                {{__('project.target_stable_return_on_cost')}}
                            </div>
                            <div class="c-value">{{$project->assetProject->target_table ?? ""}}</div>
                        </div>
                    </div>
                    <div class="col-lg-5 col-md-6 mb-md-3 mb-4">
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="c-label">NRSF</div>
                            <div class="c-value">{{$project->assetProject->nrsf ?? ""}}</div>
                        </div>
                    </div>
                    <div class="col-lg-5 col-md-6 mb-md-3 mb-4">
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="c-label">
                                {{__('project.price_cost_so_far')}}
                            </div>
                            <div class="c-value">{{$project->assetProject->current_price ?? ""}}</div>
                        </div>
                    </div>
                </div>
                <p class="title_small mb-lg-3 mb-2 pb-1">
                    {{__('project.project_highlights')}}
                </p>
                <div class="ls">
                    <p class=" position-relative mb-3">
                        @if(session()->get('lang') == \App\Http\Controllers\BaseController::LANG_EN)
                            {!! $project->assetProject->project_highlights_en ?? "" !!}
                        @else
                            {!! $project->assetProject->project_highlights_vi ?? "" !!}
                        @endif
                    </p>
                </div>
                <div class="toggle-content mb-xl-3 mb-4 pb-1">
                    <p class="btn_toggle d-flex align-items-center">
                        <svg class="mr-2" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"
                             fill="none">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                  d="M9.99935 3.33301C10.4596 3.33301 10.8327 3.7061 10.8327 4.16634V15.833C10.8327 16.2932 10.4596 16.6663 9.99935 16.6663C9.53911 16.6663 9.16602 16.2932 9.16602 15.833V4.16634C9.16602 3.7061 9.53911 3.33301 9.99935 3.33301Z"
                                  fill="#03204C"/>
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                  d="M3.33398 10.0003C3.33398 9.54009 3.70708 9.16699 4.16732 9.16699H15.834C16.2942 9.16699 16.6673 9.54009 16.6673 10.0003C16.6673 10.4606 16.2942 10.8337 15.834 10.8337H4.16732C3.70708 10.8337 3.33398 10.4606 3.33398 10.0003Z"
                                  fill="#03204C"/>
                        </svg>
                        {{__('project.project_location')}}
                    </p>
                    <div class="content mt-3 box-map" style="display: none">
                        <div class="maps mb-lg-3 mb-2">
                            <iframe
                                src="https://www.google.com/maps/embed/v1/place?key=AIzaSyDU6vwuTA_eC2NKb0IuDJpa2XmrypkTSvA&q={{$project->assetProject->latitude ?? ""}},{{$project->assetProject->longitude ?? ""}}"
                                width="600" height="450" style="border: 0" allowfullscreen="" loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif
    @if(!empty($project->investorProject))
        <section id="chudautu" class="auth-invest wow fadeInUp">
            <div class="container">
                <p class="title_lg text-center">{{__('project.investor')}}</p>
                <div class="row mb-xl-3 mb-2 pb-1">
                    <div class="col-lg-6 mb-lg-0 mb-3">
                        <div class="img-invest">
                            <img src="{{asset('frontend/images/logo.png')}}" class="img-fluid" alt=""/>
                        </div>
                        <p class="name_company mb-1">{{__('project.name_company')}}
                            : {{$project->investorProject->name_company_vi ?? ""}}</p>
                        <div class="desc_company mb-4">{{__('project.address_company')}}
                            : {{$project->investorProject->address_vi ?? ""}}</div>
                        <div class="team_company mb-3">{{__('project.administrative_council')}}</div>
                        <div class="swiper swiper-teams">
                            <div class="swiper-wrapper">
                                @if(!empty($project->investorProject->memberCompanies))
                                    @foreach($project->investorProject->memberCompanies as $key => $member)
                                        <div class="swiper-slide">
                                            <div class="human">
                                                <div class="img">
                                                    <img
                                                        src="{{$member->avatar_member ?? asset('frontend/images/hoidong.jpg')}}"
                                                        class="img-fluid"
                                                        alt=""/>
                                                </div>
                                                <div class="box">
                                                    <p class="name">{{$member->name_member}}</p>
                                                    <div class="desc">
                                                        @if(session()->get('lang') == \App\Http\Controllers\BaseController::LANG_EN)
                                                            {{$member->position_member_en}}
                                                        @else
                                                            {{$member->position_member_vi}}
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="s-content">
                            <p>
                                @if(session()->get('lang') == \App\Http\Controllers\BaseController::LANG_EN)
                                    {!! $project->investorProject->description_en ?? "" !!}
                                @else
                                    {!! $project->investorProject->description_vi ?? "" !!}
                                @endif
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif
    @if(count($project->businessPlanes) > 0)
        <section id="kehoachkinhdoanh" class="plan-sale wow fadeInUp">
            <div class="container">
                <p class="title_lg text-center">Kế Hoạch kinh doanh</p>
                <div class="s-content mb-lg-3 mb-2 pb-1">
                    <p>
                        ( giới thiệu về đự án)Lorem Ipsum is simply dummy text
                        of the printing and typesetting industry. Lorem Ipsum
                        has been the industry's standard dummy text ever since
                        the 1500s, when an unknown printer Lorem Ipsum is simply
                        dummy text of the printing and typesetting industry.
                        Lorem Ipsum has been the industry's standard dummy text
                        ever since the 1500s, when an unknown printerLorem Ipsum
                        is simply dummy text of the printing and typesetting
                        industry. Lorem Ipsum has been the industry's standard
                        dummy text ever since the 1500s, when an unknown
                        printerLorem Ipsum is simply dummy text of the printing
                        and typesetting industry. Lorem Ipsum an unknown
                        printer( giới thiệu về đự án)Lorem Ipsum is simply dummy
                        text of the printing and typesetting industry. Lorem
                        Ipsum has been the industry's standard dummy text ever
                        since the 1500s, when an unknown printer Lorem Ipsum is
                        simply dummy text of the printing and typesetting
                        industry. Lorem Ipsum has been the industry's standard
                        dummy text ever since the 1500s, when an unknown
                        printerLorem Ipsum is simply dummy text of the printing
                        and typesetting industry. Lorem Ipsum has been the
                        industry's standard dummy text ever since the 1500s,
                        when an unknown printerLorem Ipsum is simply dummy text
                        of the printing and typesetting industry. Lorem Ipsum an
                        unknown printer( giới thiệu về đự án)Lorem Ipsum is
                        simply dummy text of the printing and typesetting
                        industry. Lorem Ipsum has been the industry's standard
                        dummy text ever since the 1500s, when an unknown printer
                        Lorem Ipsum is simply dummy text of the printing and
                        typesetting industry. Lorem Ipsum has been the
                        industry's standard dummy text ever since the 1500s,
                        when an unknown printerLorem Ipsum is simply dummy text
                        of the printing and typesetting industry. Lorem Ipsum
                        has been the industry's standard dummy text ever since
                        the 1500s, when an unknown printerLorem Ipsum is simply
                        dummy text of the printing and typesetting industry.
                        Lorem Ipsum an unknown printer
                    </p>
                </div>
                <div class="toggle-content mb-xl-3 mb-4 pb-1 box-images">
                    <p class="btn_toggle d-flex align-items-center">
                        <svg class="mr-2" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"
                             fill="none">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                  d="M9.99935 3.33301C10.4596 3.33301 10.8327 3.7061 10.8327 4.16634V15.833C10.8327 16.2932 10.4596 16.6663 9.99935 16.6663C9.53911 16.6663 9.16602 16.2932 9.16602 15.833V4.16634C9.16602 3.7061 9.53911 3.33301 9.99935 3.33301Z"
                                  fill="#03204C"/>
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                  d="M3.33398 10.0003C3.33398 9.54009 3.70708 9.16699 4.16732 9.16699H15.834C16.2942 9.16699 16.6673 9.54009 16.6673 10.0003C16.6673 10.4606 16.2942 10.8337 15.834 10.8337H4.16732C3.70708 10.8337 3.33398 10.4606 3.33398 10.0003Z"
                                  fill="#03204C"/>
                        </svg>
                        Kế hoạch kinh doanh năm 2022
                    </p>
                    <div class="content mt-3" style="display: none">
                        <div class="s-content">
                            <p>
                                Lorem ipsum dolor sit amet consectetur
                                adipisicing elit. Quisquam dolores optio
                                accusamus quidem tenetur velit at animi dolore
                                tempore repellat vero culpa atque a ex,
                                similique recusandae inventore voluptates!
                                Consequuntur!
                            </p>
                        </div>
                    </div>
                </div>
                <div class="toggle-content mb-xl-3 mb-4 pb-1 box-images">
                    <p class="btn_toggle d-flex align-items-center">
                        <svg class="mr-2" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"
                             fill="none">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                  d="M9.99935 3.33301C10.4596 3.33301 10.8327 3.7061 10.8327 4.16634V15.833C10.8327 16.2932 10.4596 16.6663 9.99935 16.6663C9.53911 16.6663 9.16602 16.2932 9.16602 15.833V4.16634C9.16602 3.7061 9.53911 3.33301 9.99935 3.33301Z"
                                  fill="#03204C"/>
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                  d="M3.33398 10.0003C3.33398 9.54009 3.70708 9.16699 4.16732 9.16699H15.834C16.2942 9.16699 16.6673 9.54009 16.6673 10.0003C16.6673 10.4606 16.2942 10.8337 15.834 10.8337H4.16732C3.70708 10.8337 3.33398 10.4606 3.33398 10.0003Z"
                                  fill="#03204C"/>
                        </svg>
                        Kế hoạch phân bổ vốn đầu tư
                    </p>
                    <div class="content mt-3" style="display: none">
                        <div class="s-content">
                            <p>
                                Lorem ipsum dolor sit amet consectetur
                                adipisicing elit. Quisquam dolores optio
                                accusamus quidem tenetur velit at animi dolore
                                tempore repellat vero culpa atque a ex,
                                similique recusandae inventore voluptates!
                                Consequuntur!
                            </p>
                        </div>
                    </div>
                </div>
                <div class="toggle-content mb-xl-3 mb-4 pb-1 box-images">
                    <p class="btn_toggle d-flex align-items-center">
                        <svg class="mr-2" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"
                             fill="none">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                  d="M9.99935 3.33301C10.4596 3.33301 10.8327 3.7061 10.8327 4.16634V15.833C10.8327 16.2932 10.4596 16.6663 9.99935 16.6663C9.53911 16.6663 9.16602 16.2932 9.16602 15.833V4.16634C9.16602 3.7061 9.53911 3.33301 9.99935 3.33301Z"
                                  fill="#03204C"/>
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                  d="M3.33398 10.0003C3.33398 9.54009 3.70708 9.16699 4.16732 9.16699H15.834C16.2942 9.16699 16.6673 9.54009 16.6673 10.0003C16.6673 10.4606 16.2942 10.8337 15.834 10.8337H4.16732C3.70708 10.8337 3.33398 10.4606 3.33398 10.0003Z"
                                  fill="#03204C"/>
                        </svg>
                        Kế hoạch bán căn hộ
                    </p>
                    <div class="content mt-3" style="display: none">
                        <div class="s-content">
                            <p>
                                Lorem ipsum dolor sit amet consectetur
                                adipisicing elit. Quisquam dolores optio
                                accusamus quidem tenetur velit at animi dolore
                                tempore repellat vero culpa atque a ex,
                                similique recusandae inventore voluptates!
                                Consequuntur!
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif
    @if(!empty($project->financials))
        <section id="financial" class="financial wow fadeInUp">
            <div class="container">
                <p class="title_lg text-center">Financial</p>
                <div class="char pb-4">
                    <div class="d-flex justify-content-between">
                        <div class="char-display">
                            <div title="Equity: 60%" class="percent-1 percent" style="height: 60%"></div>
                            <div title="Equity: 40%" class="percent-2 percent" style="height: 40%"></div>
                        </div>
                        <div class="char-detail">
                            <div class="percent-detail percent-detail-1">
                                <p class="title">Equity: $12.000.000</p>
                                <div class="reconds">
                                    <p class="recond">
                                        88.3% LP Investor Equity - $XX.XXX.XXX
                                    </p>
                                    <p class="recond">
                                        88.3% LP Investor Equity - $XX.XXX.XXX
                                    </p>
                                </div>
                            </div>
                            <div class="percent-detail percent-detail-2">
                                <p class="title">Equity: $12.000.000</p>
                                <div class="reconds">
                                    <p class="recond">
                                        88.3% LP Investor Equity - $XX.XXX.XXX
                                    </p>
                                    <p class="recond">
                                        88.3% LP Investor Equity - $XX.XXX.XXX
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="text-center total mt-lg-4 mt-3" id="total">
                    TOTAL: %XX.XXX.XXX
                </div>
                <div class="toggle-content mt-2 mb-xl-3 mb-2 pb-1 box-images">
                    <p class="btn_toggle d-flex align-items-center">
                        <svg class="mr-2" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"
                             fill="none">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                  d="M9.99935 3.33301C10.4596 3.33301 10.8327 3.7061 10.8327 4.16634V15.833C10.8327 16.2932 10.4596 16.6663 9.99935 16.6663C9.53911 16.6663 9.16602 16.2932 9.16602 15.833V4.16634C9.16602 3.7061 9.53911 3.33301 9.99935 3.33301Z"
                                  fill="#03204C"/>
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                  d="M3.33398 10.0003C3.33398 9.54009 3.70708 9.16699 4.16732 9.16699H15.834C16.2942 9.16699 16.6673 9.54009 16.6673 10.0003C16.6673 10.4606 16.2942 10.8337 15.834 10.8337H4.16732C3.70708 10.8337 3.33398 10.4606 3.33398 10.0003Z"
                                  fill="#03204C"/>
                        </svg>
                        Nguồn & Sử dụng
                    </p>
                    <div class="content mt-3" style="display: none">
                        <div class="s-content">
                            <p>
                                Lorem ipsum dolor sit amet consectetur
                                adipisicing elit. Quisquam dolores optio
                                accusamus quidem tenetur velit at animi dolore
                                tempore repellat vero culpa atque a ex,
                                similique recusandae inventore voluptates!
                                Consequuntur!
                            </p>
                        </div>
                    </div>
                </div>
                <div class="toggle-content mb-xl-3 mb-4 pb-1 box-images">
                    <p class="btn_toggle d-flex align-items-center">
                        <svg class="mr-2" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"
                             fill="none">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                  d="M9.99935 3.33301C10.4596 3.33301 10.8327 3.7061 10.8327 4.16634V15.833C10.8327 16.2932 10.4596 16.6663 9.99935 16.6663C9.53911 16.6663 9.16602 16.2932 9.16602 15.833V4.16634C9.16602 3.7061 9.53911 3.33301 9.99935 3.33301Z"
                                  fill="#03204C"/>
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                  d="M3.33398 10.0003C3.33398 9.54009 3.70708 9.16699 4.16732 9.16699H15.834C16.2942 9.16699 16.6673 9.54009 16.6673 10.0003C16.6673 10.4606 16.2942 10.8337 15.834 10.8337H4.16732C3.70708 10.8337 3.33398 10.4606 3.33398 10.0003Z"
                                  fill="#03204C"/>
                        </svg>
                        Các giả định về Nợ
                    </p>
                    <div class="content mt-3" style="display: none">
                        <div class="s-content">
                            <p>
                                Lorem ipsum dolor sit amet consectetur
                                adipisicing elit. Quisquam dolores optio
                                accusamus quidem tenetur velit at animi dolore
                                tempore repellat vero culpa atque a ex,
                                similique recusandae inventore voluptates!
                                Consequuntur!
                            </p>
                        </div>
                    </div>
                </div>
                <div class="toggle-content mb-xl-3 mb-4 pb-1 box-images">
                    <p class="btn_toggle d-flex align-items-center">
                        <svg class="mr-2" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"
                             fill="none">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                  d="M9.99935 3.33301C10.4596 3.33301 10.8327 3.7061 10.8327 4.16634V15.833C10.8327 16.2932 10.4596 16.6663 9.99935 16.6663C9.53911 16.6663 9.16602 16.2932 9.16602 15.833V4.16634C9.16602 3.7061 9.53911 3.33301 9.99935 3.33301Z"
                                  fill="#03204C"/>
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                  d="M3.33398 10.0003C3.33398 9.54009 3.70708 9.16699 4.16732 9.16699H15.834C16.2942 9.16699 16.6673 9.54009 16.6673 10.0003C16.6673 10.4606 16.2942 10.8337 15.834 10.8337H4.16732C3.70708 10.8337 3.33398 10.4606 3.33398 10.0003Z"
                                  fill="#03204C"/>
                        </svg>
                        Phân phối
                    </p>
                    <div class="content mt-3" style="display: none">
                        <div class="s-content">
                            <p>
                                Lorem ipsum dolor sit amet consectetur
                                adipisicing elit. Quisquam dolores optio
                                accusamus quidem tenetur velit at animi dolore
                                tempore repellat vero culpa atque a ex,
                                similique recusandae inventore voluptates!
                                Consequuntur!
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif
    {{--    <section id="tiendothanhtoan" class="progress-payment wow fadeInUp">--}}
    {{--        <div class="container">--}}
    {{--            <p class="title_lg text-center">Tiến độ thanh toán</p>--}}
    {{--            <div class="toggle-content mb-xl-3 mb-4 pb-1 box-images">--}}
    {{--                <p class="btn_toggle d-flex align-items-center">--}}
    {{--                    <svg class="mr-2" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"--}}
    {{--                         fill="none">--}}
    {{--                        <path fill-rule="evenodd" clip-rule="evenodd"--}}
    {{--                              d="M9.99935 3.33301C10.4596 3.33301 10.8327 3.7061 10.8327 4.16634V15.833C10.8327 16.2932 10.4596 16.6663 9.99935 16.6663C9.53911 16.6663 9.16602 16.2932 9.16602 15.833V4.16634C9.16602 3.7061 9.53911 3.33301 9.99935 3.33301Z"--}}
    {{--                              fill="#03204C"/>--}}
    {{--                        <path fill-rule="evenodd" clip-rule="evenodd"--}}
    {{--                              d="M3.33398 10.0003C3.33398 9.54009 3.70708 9.16699 4.16732 9.16699H15.834C16.2942 9.16699 16.6673 9.54009 16.6673 10.0003C16.6673 10.4606 16.2942 10.8337 15.834 10.8337H4.16732C3.70708 10.8337 3.33398 10.4606 3.33398 10.0003Z"--}}
    {{--                              fill="#03204C"/>--}}
    {{--                    </svg>--}}
    {{--                    Năm 2021--}}
    {{--                </p>--}}
    {{--                <div class="content mt-3" style="display: none">--}}
    {{--                    <div class="times-line pl-3 pt-3">--}}
    {{--                        <div class="time position-relative">--}}
    {{--                            <div class="year">12/01/2022</div>--}}
    {{--                            <div class="d-flex flex-wrap align-items-center justify-content-between need_to_pay">--}}
    {{--                            <span class="c-label">--}}
    {{--                                Số tiền thanh toán--}}
    {{--                            </span>--}}
    {{--                                <span class="c-value">$15.000.000</span>--}}
    {{--                            </div>--}}
    {{--                            <div class="d-flex flex-wrap align-items-center justify-content-between need_to_pay">--}}
    {{--                            <span class="c-label">--}}
    {{--                                Phần trăm thanh toán--}}
    {{--                            </span>--}}
    {{--                                <span class="c-value">15%</span>--}}
    {{--                            </div>--}}
    {{--                        </div>--}}
    {{--                        <div class="time position-relative">--}}
    {{--                            <div class="year">12/01/2022</div>--}}
    {{--                            <div class="d-flex flex-wrap align-items-center justify-content-between need_to_pay">--}}
    {{--                            <span class="c-label">--}}
    {{--                                Số tiền thanh toán--}}
    {{--                            </span>--}}
    {{--                                <span class="c-value">$15.000.000</span>--}}
    {{--                            </div>--}}
    {{--                            <div class="d-flex flex-wrap align-items-center justify-content-between need_to_pay">--}}
    {{--                            <span class="c-label">--}}
    {{--                                Phần trăm thanh toán--}}
    {{--                            </span>--}}
    {{--                                <span class="c-value">15%</span>--}}
    {{--                            </div>--}}
    {{--                        </div>--}}
    {{--                        <div class="time position-relative">--}}
    {{--                            <div class="year">12/01/2022</div>--}}
    {{--                            <div class="d-flex flex-wrap align-items-center justify-content-between need_to_pay">--}}
    {{--                            <span class="c-label">--}}
    {{--                                Số tiền thanh toán--}}
    {{--                            </span>--}}
    {{--                                <span class="c-value">$15.000.000</span>--}}
    {{--                            </div>--}}
    {{--                            <div class="d-flex flex-wrap align-items-center justify-content-between need_to_pay">--}}
    {{--                            <span class="c-label">--}}
    {{--                                Phần trăm thanh toán--}}
    {{--                            </span>--}}
    {{--                                <span class="c-value">15%</span>--}}
    {{--                            </div>--}}
    {{--                        </div>--}}
    {{--                        <div class="time position-relative">--}}
    {{--                            <div class="year">12/01/2022</div>--}}
    {{--                            <div class="d-flex flex-wrap align-items-center justify-content-between need_to_pay">--}}
    {{--                            <span class="c-label">--}}
    {{--                                Số tiền thanh toán--}}
    {{--                            </span>--}}
    {{--                                <span class="c-value">$15.000.000</span>--}}
    {{--                            </div>--}}
    {{--                            <div class="d-flex flex-wrap align-items-center justify-content-between need_to_pay">--}}
    {{--                            <span class="c-label">--}}
    {{--                                Phần trăm thanh toán--}}
    {{--                            </span>--}}
    {{--                                <span class="c-value">15%</span>--}}
    {{--                            </div>--}}
    {{--                        </div>--}}
    {{--                        <div class="time position-relative">--}}
    {{--                            <div class="year">12/01/2022</div>--}}
    {{--                            <div class="d-flex flex-wrap align-items-center justify-content-between need_to_pay">--}}
    {{--                            <span class="c-label">--}}
    {{--                                Số tiền thanh toán--}}
    {{--                            </span>--}}
    {{--                                <span class="c-value">$15.000.000</span>--}}
    {{--                            </div>--}}
    {{--                            <div class="d-flex flex-wrap align-items-center justify-content-between need_to_pay">--}}
    {{--                            <span class="c-label">--}}
    {{--                                Phần trăm thanh toán--}}
    {{--                            </span>--}}
    {{--                                <span class="c-value">15%</span>--}}
    {{--                            </div>--}}
    {{--                        </div>--}}
    {{--                    </div>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--    </section>--}}
    @if(count($project->documentProjects) > 0)
        <section id="tailieuduan" class="docs-project wow fadeInUp">
            <div class="container">
                <p class="title_lg text-center">{{__('project.other_documents')}}</p>
                @foreach($project->documentProjects as $document)
                    <div class="toggle-content mb-xl-3 mb-4 pb-1 box-images">
                        <p class="btn_toggle d-flex align-items-center">
                            <svg class="mr-2" xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                 viewBox="0 0 20 20"
                                 fill="none">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                      d="M9.99935 3.33301C10.4596 3.33301 10.8327 3.7061 10.8327 4.16634V15.833C10.8327 16.2932 10.4596 16.6663 9.99935 16.6663C9.53911 16.6663 9.16602 16.2932 9.16602 15.833V4.16634C9.16602 3.7061 9.53911 3.33301 9.99935 3.33301Z"
                                      fill="#03204C"/>
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                      d="M3.33398 10.0003C3.33398 9.54009 3.70708 9.16699 4.16732 9.16699H15.834C16.2942 9.16699 16.6673 9.54009 16.6673 10.0003C16.6673 10.4606 16.2942 10.8337 15.834 10.8337H4.16732C3.70708 10.8337 3.33398 10.4606 3.33398 10.0003Z"
                                      fill="#03204C"/>
                            </svg>
                            @if(session()->get('lang') == \App\Http\Controllers\BaseController::LANG_EN)
                                {{ $document->title_en ?? "" }}
                            @else
                                {{ $document->title_vi ?? "" }}
                            @endif
                        </p>
                        <div class="content mt-3 ml-3" style="display: none">
                            <div class="s-content">
                                <p>
                                    <a href="{{ $document->link ?? "" }}" target="_blank" class="btn btn-secondary">
                                        @if(session()->get('lang') == \App\Http\Controllers\BaseController::LANG_EN)
                                            {{ $document->name_file_en ?? "" }}
                                        @else
                                            {{ $document->name_file_vi ?? "" }}
                                        @endif
                                        &nbsp;<i class="fa fa-file-code-o"></i>
                                    </a>
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>
    @endif
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
    <a href="{{route('investment.step1',['slug'=> $project->slug_vi])}}" title="{{__('project.invest_now')}}"
       class="btn_all lg mx-auto invest-now">{{__('project.invest_now')}}
        <svg class="ml-2" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
            <path fill-rule="evenodd" clip-rule="evenodd"
                  d="M3.33398 9.99935C3.33398 9.53911 3.70708 9.16602 4.16732 9.16602H15.834C16.2942 9.16602 16.6673 9.53911 16.6673 9.99935C16.6673 10.4596 16.2942 10.8327 15.834 10.8327H4.16732C3.70708 10.8327 3.33398 10.4596 3.33398 9.99935Z"
                  fill="white"></path>
            <path fill-rule="evenodd" clip-rule="evenodd"
                  d="M9.41009 3.57806C9.73553 3.25263 10.2632 3.25263 10.5886 3.57806L16.4219 9.4114C16.7474 9.73683 16.7474 10.2645 16.4219 10.5899L10.5886 16.4232C10.2632 16.7487 9.73553 16.7487 9.41009 16.4232C9.08466 16.0978 9.08466 15.5702 9.41009 15.2447L14.6542 10.0007L9.41009 4.75657C9.08466 4.43114 9.08466 3.9035 9.41009 3.57806Z"
                  fill="white"></path>
        </svg>
    </a>
@stop
