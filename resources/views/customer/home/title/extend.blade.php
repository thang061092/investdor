@if($config_view && $config_view['extend'] == 'active')
    @if(!empty($project->overviewProject))
        <a href="#tongquan" title="{{__('project.project_overview')}}"
           class="d-inline-block">{{__('project.project_overview')}}</a>
    @endif
@endif
