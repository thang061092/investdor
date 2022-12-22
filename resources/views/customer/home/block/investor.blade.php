@if($config_view && $config_view['investor'] == 'active')
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
@endif
