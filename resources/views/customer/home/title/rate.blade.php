@if($config_view && $config_view['rate'] == 'active')
    @if(!empty($project->evaluaties))
        <a href="#danhgia" title="{{__('project.evaluate')}}"
           class="d-inline-block">{{__('project.evaluate')}}</a>
    @endif
@endif
