<div class="banner banner-invest mb-3">
    <img src="{{asset('frontend/images/banner-x.jpg')}}" class="img-fluid" alt=""/>
    <div class="box-banner">
        <h2 class="banner_title text-center wow fadeInUp">{{session()->get('lang') == \App\Http\Controllers\BaseController::LANG_EN ? $project->name_en : $project->name_vi}}</h2>
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 mb-lg-0 mb-3 wow fadeInLeft">
                    <p class="c-label-invest mb-1 d-block text-left">
                        {{__('project.total_investment')}}
                    </p>
                    <div class="c-value-invest mb-3 text-left">
                        {{!empty($project->total_value) ? number_format_vn($project->total_value) : 0}}
                    </div>
                    <p class="c-label-invest mb-1 d-block text-left">
                        Estimated Hold Period
                    </p>
                    <div class="c-value-invest mb-3 text-left">
                       0
                    </div>
                    <p class="c-label-invest mb-1 d-block text-left">
                        Minimum Investment
                    </p>
                    <div class="c-value-invest mb-3 text-left">
                        0
                    </div>
                    <p class="c-label-invest mb-1 d-block text-left">
                        {{__('project.expected_profit')}}
                    </p>
                    <div class="c-value-invest mb-3 text-left">
                        0
                    </div>
                </div>
                <div class="col-lg-6 wow fadeInRight">
                    <div class="s-content text-justify">
                        <p>
                            @if(session()->get('lang') == \App\Http\Controllers\BaseController::LANG_EN)
                                {!! \Illuminate\Support\Str::limit($project->description_en, 1000) !!}
                            @else
                                {!! \Illuminate\Support\Str::limit($project->description_vi, 1000) !!}
                            @endif
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
