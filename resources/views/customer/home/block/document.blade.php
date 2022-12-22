@if($config_view && $config_view['document'] == 'active')
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
@endif
