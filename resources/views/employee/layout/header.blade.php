{{--@inject('noti','App\Service\Notification')--}}
<header class="navbar navbar-expand-md d-none d-lg-flex d-print-none">
    <div class="container-fluid">
        <div class="navbar-nav flex-row order-md-last">
            <style>
                #notifications {
                    margin-right: 15px;
                }
            </style>
            <div class="nav-item dropdown d-none d-md-flex mr-5">
                <a href="#" class="nav-link px-0" data-bs-toggle="dropdown" tabindex="-1"
                   aria-label="Show notifications" id="notifications">
                    <i class="fas fa-bell " style="font-size: 18px"></i>
                    <span class="badge bg-red"></span>

                </a>
                <div class="dropdown-menu dropdown-menu-end">
                    <ul style="list-style: none" class="list-style">

                        <a class="dropdown-item text-center small text-gray-500" href="">Xem
                            tất cả thông báo >></a>
                    </ul>
                </div>
            </div>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link d-flex lh-1 text-reset p-0" data-bs-toggle="dropdown"
                   aria-label="Open user menu">
                    <span
                        class="avatar avatar-sm avatar-rounded"><img
                            src="{{ asset('frontend/images/logo.png') }}"></span>
                    <div class="d-none d-xl-block ps-2">
                        <div>{{ session()->get('employee')['full_name'] }}</div>
                        <div class="mt-1 small text-muted">{{ session()->get('employee')['email'] }}</div>
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <a href='{{route("customer.employee.detail_employee",["id" => session()->get("employee")["id"]])}}' class="dropdown-item">{{__('auth.account')}}</a>
                    <div class="dropdown-divider"></div>
                    <a href="{{route('admin.logout')}}" class="dropdown-item">{{__('auth.logout')}}</a>
                </div>
            </div>
        </div>
        <div class="collapse navbar-collapse" id="navbar-menu"></div>
    </div>
</header>

