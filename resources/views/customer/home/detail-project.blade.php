@extends("customer.layout.master")
@section('page_name', __('page_name.detail_project'))
@section("content")
    <section class="banner-project-detail">
        <img src="{{asset('frontend/images/banner.jpg')}}" class="img-fluid" alt=""/>
        <div class="box-banner">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <p class="state wow fadeInUp">{{status_project($project->status)}}</p>
                        <div class="category-name wow fadeInUp">{{type_project($project->type)}}</div>
                        <h2 class="banner_title wow fadeInUp">Intercontinatal</h2>
                        <div class="banner_desc wow fadeInUp">
                            {{$project->address_vi. ', '. $project->ward->name.', '. $project->district->name .', '. $project->city->name}}
                        </div>
                        <div class="process d-flex flex-nowrap wow fadeInUp">
                            @php($rate_current = ($project->part - $project->current_part)/ $project->part * 100)
                            @if($project->status == 2 && $rate_current <= 80)
                                <span class="d-block text-center"
                                      style="width: {{$rate_current}}%">{{number_format_vn($project->part - $project->current_part)}}</span>
                                <span class="d-block text-center"
                                      style="width: {{$project->current_part / $project->part * 100}}%">{{number_format_vn($project->current_part)}}</span>
                            @endif
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
                                    <span class="c-label">{{__('project.Estimated_Hold_Period')}}</span>
                                    <span class="c-value">{{$project->interests()->where('status', 'active')->first()->period ?? 12}} tháng</span>
                                </div>
                                <div class="index index-3">
                                <span class="c-label">
                                    {{__('project.Minimum_Investment')}}</span>
                                    <span class="c-value">10 {{__('project.part')}}</span>
                                </div>
                                <div class="index index-4">
                                    <span class="c-label">{{__('project.price')}}</span>
                                    <span
                                        class="c-value">{{number_format_vn($project->value_part)}} VND/{{__('project.part')}}</span>
                                </div>
                            </div>
                            @if(!in_array($project->status, [1,3,4,5]))
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
                            @endif
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
                        <span class="c-label">{{__('project.Estimated_Hold_Period')}}</span>
                        <span class="c-value">{{$project->interests()->where('status', 'active')->first()->period ?? 12}} tháng</span>
                    </div>
                    <div class="index index-3">
                        <span class="c-label">  {{__('project.Minimum_Investment')}}</span>
                        <span class="c-value">10 {{__('project.part')}}</span>
                    </div>
                    <div class="index index-4">
                        <span class="c-label">{{__('project.price')}}</span>
                        <span
                            class="c-value">{{number_format_vn($project->value_part)}} VND/{{__('project.part')}}</span>
                    </div>
                </div>
                @if(!in_array($project->status, [1,3,4,5]))
                    <a href="{{route('investment.step1',['slug'=> $project->slug_vi])}}" title=""
                       class="btn_all lg">{{__('project.invest_now')}}
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
                @endif
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
                @foreach($config_index as $index)
                    @include('customer.home.title.'. $index['key'])
                @endforeach
            </div>
        </div>
    </section>
    @foreach($config_index as $index)
        @include('customer.home.block.'. $index['key'])
    @endforeach
    @if(!in_array($project->status, [1,3,4,5]))
        <a href="{{route('investment.step1',['slug'=> $project->slug_vi])}}" title="{{__('project.invest_now')}}"
           class="btn_all lg mx-auto invest-now" style="margin-top: 20px">{{__('project.invest_now')}}
            <svg class="ml-2" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                <path fill-rule="evenodd" clip-rule="evenodd"
                      d="M3.33398 9.99935C3.33398 9.53911 3.70708 9.16602 4.16732 9.16602H15.834C16.2942 9.16602 16.6673 9.53911 16.6673 9.99935C16.6673 10.4596 16.2942 10.8327 15.834 10.8327H4.16732C3.70708 10.8327 3.33398 10.4596 3.33398 9.99935Z"
                      fill="white"></path>
                <path fill-rule="evenodd" clip-rule="evenodd"
                      d="M9.41009 3.57806C9.73553 3.25263 10.2632 3.25263 10.5886 3.57806L16.4219 9.4114C16.7474 9.73683 16.7474 10.2645 16.4219 10.5899L10.5886 16.4232C10.2632 16.7487 9.73553 16.7487 9.41009 16.4232C9.08466 16.0978 9.08466 15.5702 9.41009 15.2447L14.6542 10.0007L9.41009 4.75657C9.08466 4.43114 9.08466 3.9035 9.41009 3.57806Z"
                      fill="white"></path>
            </svg>
        </a>
    @endif
@stop
