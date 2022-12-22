@if($config_view && $config_view['investor'] == 'active')
    @if(!empty($project->investorProject))
        <a href="#chudautu" title="{{__('project.investor')}}"
           class="d-inline-block">{{__('project.investor')}}</a>
    @endif
@endif
