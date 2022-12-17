@inject('sidebar','App\Http\Services\SideBarService')
@php( $sidebar = $sidebar->sidebar() )

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
                <li class="nav-item">
                    <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" role="button"
                       aria-expanded="false">
                                    <span class="nav-link-title"
                                          style="position: relative;min-width: 2rem;border-radius: 4px;font-size: 15px">
                                                        {{ __('page_name.dashboard') }}
                                                </span>
                    </a>
                    <a class="nav-link " href="{{route('project.list')}}">
                        <span class="nav-link-title"
                              style='position: relative;min-width: 2rem;border-radius: 4px;font-size: 15px'>Danh sách dự án</span>
                    </a>
                    <a class="nav-link " href="{{route('contract.index')}}">
                        <span class="nav-link-title"
                              style='position: relative;min-width: 2rem;border-radius: 4px;font-size: 15px'>Danh sách hợp đồng</span>
                    </a>
                    <a class="nav-link " href="{{route('transaction.index')}}">
                        <span class="nav-link-title"
                              style='position: relative;min-width: 2rem;border-radius: 4px;font-size: 15px'>Danh sách giao dịch</span>
                    </a>
                    <a class="nav-link " href="{{route('customer.employee.get_all')}}">
                        <span class="nav-link-title"
                              style='position: relative;min-width: 2rem;border-radius: 4px;font-size: 15px'>Danh sách nhân viên</span>
                    </a>
                    <a class="nav-link " href="{{route('customer.customer.get_all')}}">
                        <span class="nav-link-title"
                              style='position: relative;min-width: 2rem;border-radius: 4px;font-size: 15px'>Danh sách khách hàng</span>
                    </a>
                </li>
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
</style>
