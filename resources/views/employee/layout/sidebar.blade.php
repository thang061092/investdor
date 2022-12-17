@inject('sidebar','App\Http\Services\SideBarService')
@php( $menus = $sidebar->sidebar() )

<aside class="navbar navbar-vertical navbar-expand-lg sidebar">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu">
            <span class="navbar-toggler-icon"></span>
        </button>
        <h1 class="navbar-brand navbar-brand-autodark" style="text-align: center">
            <a href="#">
                <img src="{{ asset('frontend/images/logo.png') }}" alt="Tabler" style="width: 50%;height: 50%">
            </a>
        </h1>
        <div class="collapse navbar-collapse" id="navbar-menu">
            <ul class="navbar-nav pt-lg-3">
                @if($menus)
                    @foreach( $menus as $item )
                        @if( is_null($item['parent_id']) )
                            <li class="nav-item mb-2">
                                <a class="nav-link dropdown-toggle mb-2" data-bs-toggle="dropdown" role="button"
                                   aria-expanded="false">
                                <span class="nav-link-icon d-md-none d-lg-inline-block">
                                    <i class="fas fa-folder" style="color: white"></i>
                                </span>
                                    <span class="nav-link-title"
                                          style="position: relative;min-width: 2rem;border-radius: 4px;font-size: 15px">
                                        {{ $item['name'] }}
                                </span>
                                </a>
                                @if(isset($item['child']))
                                    <div
                                        class="dropdown-menu {{ $sidebar->activeMenuParent($item['id'], $item['child']) }} click-show-toggle-menu">
                                        <div class="dropdown-menu-columns">
                                            <div class="dropdown-menu-columns">
                                                @foreach( $item['child'] as $item_child )
                                                    <a class="dropdown-item {{ $sidebar->activeMenu($item_child['url']) }} mb-2 nav-link-title"
                                                       href="{{ $sidebar->urlMenu($item_child['url']) }}">
                                                        {{ $item_child['name'] }}
                                                    </a>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </li>
                        @endif
                    @endforeach
                @endif
            </ul>
        </div>
    </div>
</aside>
<style>
    .dropdown-toggle:after {
        content: "";
        display: inline-block;
        vertical-align: 0.306em;
        width: 0.36em;
        height: 0.36em;
        border-bottom: 1px solid;
        border-left: 1px solid;
        margin-right: 0.1em;
        margin-left: 0.4em;
        transform: rotate(-45deg);
    }

    .active {
        color: green !important;
        background-color: white !important;
    }
</style>
