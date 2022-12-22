@if($config_view && $config_view['document'] == 'active')
    @if(count($project->documentProjects) > 0)
        <a href="#tailieuduan" title="{{__('project.document')}}"
           class="d-inline-block">{{__('project.document')}}</a>
    @endif
@endif
