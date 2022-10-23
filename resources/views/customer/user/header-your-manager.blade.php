<div class="banner_no_image mb-3">
    <h2 class="banner_title text-center wow fadeInUp">{{__('page_name.your_manager')}}</h2>
</div>
<section class="manager">
    @php($main_tab = request()->get('main_tab') ?? 'manager')
    @php($tab = request()->get('tab') ?? 'active')
    <div class="container">
        <div class="text-center tabs-main mb-xl-4 mb-3 wow fadeInUp">
            <a href="{{route('customer.user.manager'). '?main_tab=manager'}}" title=""
               class="{{$main_tab=='manager' ? 'current-tab' : ''}} d-inline-block tab">{{__('page_name.investment_management')}}</a>
            <a href="{{route('customer.user.manager'). '?main_tab=history'}}" title=""
               class="{{$main_tab=='history' ? 'current-tab' : ''}} d-inline-block tab">{{__('page_name.investment_history')}}</a>
            <a href="{{route('customer.user.manager'). '?main_tab=profile'}}" title=""
               class="{{$main_tab=='profile' ? 'current-tab' : ''}} d-inline-block tab">{{__('page_name.personal_profile')}}</a>
        </div>
        @if($main_tab == 'manager')
            <div class="text-center tabs-child mb-xl-4 mb-3 wow fadeInUp">
                <a href="{{route('customer.user.manager'). '?main_tab=manager&tab=active'}}" title=""
                   class="{{$tab=='active' ? 'current-tab' : ''}} d-inline-block tab">{{__('manager.investing')}}</a>
                <a href="{{route('customer.user.manager'). '?main_tab=manager&tab=complete'}}" title=""
                   class="{{$tab=='complete' ? 'current-tab' : ''}} d-inline-block tab">{{__('manager.accomplished')}}</a>
                <a href="{{route('customer.user.manager'). '?main_tab=manager&tab=warning'}}" title=""
                   class="{{$tab=='warning' ? 'current-tab' : ''}} d-inline-block tab">{{__('manager.wait_for_confirmation')}}</a>
            </div>
        @endif
    </div>
</section>
