@if($config_view && $config_view['plan'] == 'active')
    @if(count($project->businessPlanes) > 0)
        <a href="#kehoachkinhdoanh" title="{{__('project.business_plan')}}"
           class="d-inline-block">{{__('project.business_plan')}}</a>
    @endif
@endif
