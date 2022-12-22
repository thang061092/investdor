@if($config_view && $config_view['extend'] == 'active')
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
@endif
