@if($config_view && $config_view['asset'] == 'active')
    @if(!empty($project->assetProject))
        <a href="#taisan" title="{{__('project.asset')}}"
           class="d-inline-block">{{__('project.asset')}}</a>
    @endif
@endif
