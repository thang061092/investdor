@if($config_view && $config_view['asset'] == 'active')
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
                            <div
                                class="c-value">{{!empty($project->assetProject->expected_capacity) ? number_format_vn($project->assetProject->expected_capacity) : ""}}</div>
                        </div>
                    </div>
                    <div class="col-lg-5 col-md-6 mb-md-3 mb-4">
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="c-label">{{__('project.total_building_area')}}</div>
                            <div
                                class="c-value">{{!empty($project->assetProject->total_building_area) ? number_format_vn($project->assetProject->total_building_area) : ""}}</div>
                        </div>
                    </div>
                    <div class="col-lg-5 col-md-6 mb-md-3 mb-4">
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="c-label">
                                {{__('project.target_stable_return_on_cost')}}
                            </div>
                            <div
                                class="c-value">{{!empty($project->assetProject->target_table) ? number_format_vn($project->assetProject->target_table) : ""}}</div>
                        </div>
                    </div>
                    <div class="col-lg-5 col-md-6 mb-md-3 mb-4">
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="c-label">NRSF</div>
                            <div
                                class="c-value">{{!empty($project->assetProject->nrsf) ? number_format_vn($project->assetProject->nrsf): ""}}</div>
                        </div>
                    </div>
                    <div class="col-lg-5 col-md-6 mb-md-3 mb-4">
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="c-label">
                                {{__('project.price_cost_so_far')}}
                            </div>
                            <div
                                class="c-value">{{!empty($project->assetProject->current_price) ? number_format_vn($project->assetProject->current_price): ""}}</div>
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
@endif
