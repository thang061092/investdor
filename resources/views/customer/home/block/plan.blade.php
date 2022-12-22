@if($config_view && $config_view['plan'] == 'active')
    @if(count($project->businessPlanes) > 0)
        <section id="kehoachkinhdoanh" class="plan-sale wow fadeInUp">
            <div class="container">
                <p class="title_lg text-center">Kế Hoạch kinh doanh</p>
                @foreach($project->businessPlanes as $plan)
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
                                {{ $plan->title_en ?? "" }}
                            @else
                                {{ $plan->title_vi ?? "" }}
                            @endif
                        </p>
                        <div class="content mt-3" style="display: none">
                            <div class="s-content">
                                <p>
                                    @if(session()->get('lang') == \App\Http\Controllers\BaseController::LANG_EN)
                                        {!! $plan->description_en ?? "" !!}
                                    @else
                                        {!! $plan->description_vi ?? "" !!}
                                    @endif
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>
    @endif
@endif
