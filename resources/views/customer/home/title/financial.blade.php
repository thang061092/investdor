@if($config_view && $config_view['financial'] == 'active')
    @if(!empty($project->financials))
        <a href="#financial" title="{{__('project.financial')}}"
           class="d-inline-block">{{__('project.financial')}}</a>
    @endif
@endif
