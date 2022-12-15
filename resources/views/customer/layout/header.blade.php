<header class="header {{!empty(session()->get('customer')) ? 'is-login':'not-login'}}">
    <div class="container">
        <div class="row align-items-center">
            <div
                class="col-xl-2 col-12 order-lg-1 order-2 d-xl-block d-flex justify-content-between align-items-center">
                <a href="{{route('home.index')}}" title="" class="d-block img logo">
                    <img src="{{asset('frontend/images/logo.png')}}" class="img-fluid" alt=""/>
                </a>
                <button class="btn-menu d-xl-none ml-auto block">
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32" fill="none">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                              d="M2.6665 16.0003C2.6665 15.2639 3.26346 14.667 3.99984 14.667H27.9998C28.7362 14.667 29.3332 15.2639 29.3332 16.0003C29.3332 16.7367 28.7362 17.3337 27.9998 17.3337H3.99984C3.26346 17.3337 2.6665 16.7367 2.6665 16.0003Z"
                              fill="#676767"/>
                        <path fill-rule="evenodd" clip-rule="evenodd"
                              d="M2.6665 8.00033C2.6665 7.26395 3.26346 6.66699 3.99984 6.66699H27.9998C28.7362 6.66699 29.3332 7.26395 29.3332 8.00033C29.3332 8.73671 28.7362 9.33366 27.9998 9.33366H3.99984C3.26346 9.33366 2.6665 8.73671 2.6665 8.00033Z"
                              fill="#676767"/>
                        <path fill-rule="evenodd" clip-rule="evenodd"
                              d="M2.6665 24.0003C2.6665 23.2639 3.26346 22.667 3.99984 22.667H27.9998C28.7362 22.667 29.3332 23.2639 29.3332 24.0003C29.3332 24.7367 28.7362 25.3337 27.9998 25.3337H3.99984C3.26346 25.3337 2.6665 24.7367 2.6665 24.0003Z"
                              fill="#676767"/>
                    </svg>
                </button>
            </div>
            <div class="col-lg-6 col-md-9 col-12 order-lg-2 order-3 box-menu">
                <div class="d-xl-none d-flex justify-content-between align-items-center">
                    <a href="" title="" class="d-xl-none d-block img logo_mobile">
                        <img src="{{asset('frontend/images/logo.png')}}" class="img-fluid" alt=""/>
                    </a>
                    <div class="btn-close">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                  d="M18.7071 5.29289C19.0976 5.68342 19.0976 6.31658 18.7071 6.70711L6.70711 18.7071C6.31658 19.0976 5.68342 19.0976 5.29289 18.7071C4.90237 18.3166 4.90237 17.6834 5.29289 17.2929L17.2929 5.29289C17.6834 4.90237 18.3166 4.90237 18.7071 5.29289Z"
                                  fill="white"/>
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                  d="M5.29289 5.29289C5.68342 4.90237 6.31658 4.90237 6.70711 5.29289L18.7071 17.2929C19.0976 17.6834 19.0976 18.3166 18.7071 18.7071C18.3166 19.0976 17.6834 19.0976 17.2929 18.7071L5.29289 6.70711C4.90237 6.31658 4.90237 5.68342 5.29289 5.29289Z"
                                  fill="white"/>
                        </svg>
                    </div>
                </div>
                <ul>
                    <li>
                        <a href="{{route('home.index')}}" title=""
                           class="{{request()->path() == '/' ? 'current-page' : ''}}">INVESTDOR</a>
                        <ul>
                            <li>
                                <a href="{{route('home.index')}}" title="" class="current-page">INVESTDOR</a>
                                <ul>
                                    <li>
                                        <a href="{{route('home.index')}}" title="" class="">INVESTDOR</a>
                                    </li>
                                    <li>
                                        <a href="{{route('customer.home_page')}}"
                                           title="">{{__('page_name.product')}}</a>
                                    </li>
                                    <li>
                                        <a href="{{route('customer.knowledge')}}"
                                           title="">{{__('page_name.knowledge')}}</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="{{route('customer.home_page')}}" title="">{{__('page_name.product')}}</a>
                            </li>
                            <li>
                                <a href="{{route('customer.knowledge')}}" title="">{{__('page_name.knowledge')}}</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="{{route('customer.home_page')}}" title=""
                           class="{{ request()->path() == 'home-page' ? 'current-page' : ''}}">{{__('page_name.product')}}</a>
                    </li>
                    <li>
                        <a href="{{route('customer.knowledge')}}" title=""
                           class="{{request()->path() == 'knowledge' ? 'current-page' : ''}}">{{__('page_name.knowledge')}}</a>
                    </li>
                </ul>

            @if(!empty(session()->get('customer')))
                <!--DA LOGIN-->
                    <div class="group-user-mobile d-xl-none d-block">
                        <a href="{{route('customer.user.manager')}}" title="Thông tin cá nhân"
                           class="group-user-mobile-link"> {{__('auth.personal_information')}}</a>
                        <a href="" title="Thông báo" class="group-user-mobile-link">{{__('auth.notification')}}</a>
                    </div>
                    <!--DA LOGIN-->
                    <a href="{{route('customer.logout')}}" title="{{__('auth.logout')}}"
                       class="btn_all white d-xl-none d-inline-block logout">{{__('auth.logout')}}</a>
                    <!--DA LOGIN-->
                @endif

                <div class="langs d-xl-none d-block">
                    <div class="lang-item">
                        <img
                            src="{{session()->get('lang') == 'vi' ? asset('frontend/images/vi.jpg') : asset('frontend/images/en.png')}}"
                            alt=""/>
                        {{session()->get('lang') == 'vi' ? 'VI' : "EN"}}
                        <svg width="12" height="7" viewBox="0 0 12 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                  d="M0.646447 0.646447C0.841709 0.451184 1.15829 0.451184 1.35355 0.646447L6 5.29289L10.6464 0.646447C10.8417 0.451184 11.1583 0.451184 11.3536 0.646447C11.5488 0.841709 11.5488 1.15829 11.3536 1.35355L6.35355 6.35355C6.15829 6.54882 5.84171 6.54882 5.64645 6.35355L0.646447 1.35355C0.451184 1.15829 0.451184 0.841709 0.646447 0.646447Z"
                                  fill="white"/>
                        </svg>
                    </div>
                    <div class="items">
                        <a href="{{route('home.index')}}?lang={{session()->get('lang') == 'vi' ? 'en' : "vi"}}"
                           title="">
                            <img
                                src="{{session()->get('lang') == 'vi' ? asset('frontend/images/en.png') : asset('frontend/images/vi.jpg')}}"
                                alt=""/>
                            {{session()->get('lang') == 'vi' ? 'EN' : "VI"}}
                        </a>
                    </div>
                </div>
            @if(empty(session()->get('customer')))
                <!--CHƯA LOGIN - CHÚ Ý BỎ CLASS STYLE DISPAY:NONE ĐI-->
                    <a href="{{route('customer.login')}}" title="{{__('auth.login')}}"
                       class="btn_all blue d-xl-none d-inline-block mr-2 login mb-2">{{__('auth.login')}}</a>
                    <a href="{{route('customer.register')}}" title="{{__('auth.register')}}"
                       class="btn_all blue d-xl-none d-inline-block register">{{__('auth.register')}}</a>
                    <!--CHƯA LOGIN-->
            @endif
            <!--DA LOGIN-->
            </div>
            <div class="overlay d-xl-none"></div>
            <div class="col-lg-4 col-12 order-lg-3 order-1 align-items-center justify-content-lg-end d-xl-flex d-none">
                <div class="langs mr-4">
                    <div class="lang-item">
                        <img
                            src="{{session()->get('lang') == 'vi' ? asset('frontend/images/vi.jpg') : asset('frontend/images/en.png')}}"
                            alt=""/>
                        {{session()->get('lang') == 'vi' ? 'VI' : "EN"}}
                        <svg width="12" height="7" viewBox="0 0 12 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                  d="M0.646447 0.646447C0.841709 0.451184 1.15829 0.451184 1.35355 0.646447L6 5.29289L10.6464 0.646447C10.8417 0.451184 11.1583 0.451184 11.3536 0.646447C11.5488 0.841709 11.5488 1.15829 11.3536 1.35355L6.35355 6.35355C6.15829 6.54882 5.84171 6.54882 5.64645 6.35355L0.646447 1.35355C0.451184 1.15829 0.451184 0.841709 0.646447 0.646447Z"
                                  fill="white"/>
                        </svg>
                    </div>
                    <div class="items">
                        <a href="{{route('home.index')}}?lang={{session()->get('lang') == 'vi' ? 'en' : "vi"}}"
                           title="">
                            <img
                                src="{{session()->get('lang') == 'vi' ? asset('frontend/images/en.png') : asset('frontend/images/vi.jpg')}}"
                                alt=""/>
                            {{session()->get('lang') == 'vi' ? 'EN' : "VI"}}
                        </a>
                    </div>
                </div>
                <div>

                </div>
            @if(empty(session()->get('customer')))
                <!--CHUA LOGIN - CHÚ Ý BỎ CLASS STYLE DISPAY:NONE ĐI-->
                    <a href="{{route('customer.login')}}" title="{{__('auth.login')}}"
                       class="btn_all blue d-inline-block mr-2">{{__('auth.login')}}</a>
                    <a href="{{route('customer.register')}}" title="{{__('auth.register')}}"
                       class="btn_all blue d-inline-block">{{__('auth.register')}}</a>
                    <!--CHUA LOGIN-->
            @else
                <!--DA LOGIN-->
                    <a href="" title="" class="notification-link mr-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="36" viewBox="0 0 32 36" fill="none">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                  d="M9.82889 9.26984C11.4656 7.60264 13.6854 6.66602 16 6.66602C18.3146 6.66602 20.5344 7.60264 22.1711 9.26984C23.8078 10.937 24.7273 13.1982 24.7273 15.556V18.8898C24.7273 20.318 25.335 21.1992 26.0907 22.0717C26.1781 22.1726 26.2742 22.2803 26.3746 22.3929C26.6785 22.7337 27.0222 23.1192 27.2854 23.4945C27.6641 24.0345 28 24.7107 28 25.5573C28 26.4999 27.4611 27.233 26.8129 27.7501C26.1645 28.2673 25.2854 28.675 24.2724 28.9942C22.2354 29.6361 19.3894 30.0023 16 30.0023C12.6106 30.0023 9.76462 29.6361 7.7276 28.9942C6.71465 28.675 5.83552 28.2673 5.18709 27.7501C4.53886 27.233 4 26.4999 4 25.5573C4 24.7107 4.33594 24.0345 4.71456 23.4945C4.97778 23.1192 5.32148 22.7337 5.62543 22.3929C5.72583 22.2803 5.82188 22.1726 5.90927 22.0717C6.66499 21.1992 7.27273 20.318 7.27273 18.8898V15.556C7.27273 13.1982 8.1922 10.937 9.82889 9.26984ZM16 8.88852C14.264 8.88852 12.5992 9.59098 11.3717 10.8414C10.1442 12.0918 9.45455 13.7877 9.45455 15.556V18.8898C9.45455 21.1287 8.42592 22.5255 7.54528 23.5422C7.40358 23.7057 7.27488 23.8501 7.15696 23.9824C6.88688 24.2853 6.67339 24.5248 6.48998 24.7863C6.25497 25.1215 6.18182 25.3481 6.18182 25.5573C6.18171 25.5624 6.1785 25.7181 6.53223 26.0002C6.88948 26.2852 7.4899 26.5929 8.3724 26.871C10.1263 27.4236 12.7348 27.7798 16 27.7798C19.2652 27.7798 21.8737 27.4236 23.6276 26.871C24.5101 26.5929 25.1105 26.2852 25.4678 26.0002C25.8215 25.7181 25.8183 25.5625 25.8182 25.5574C25.8182 25.3483 25.745 25.1215 25.51 24.7863C25.3266 24.5248 25.1131 24.2853 24.843 23.9824C24.7251 23.8501 24.5964 23.7057 24.4547 23.5422C23.5741 22.5255 22.5455 21.1287 22.5455 18.8898V15.556C22.5455 13.7877 21.8558 12.0918 20.6283 10.8414C19.4008 9.59098 17.736 8.88852 16 8.88852Z"
                                  fill="#fff"/>
                            <path
                                d="M16 31.1135C14.8971 31.1135 13.8607 31.0757 12.8855 31.0024C13.0934 31.678 13.5076 32.2684 14.0678 32.6875C14.628 33.1067 15.3049 33.3327 16 33.3327C16.6951 33.3327 17.372 33.1067 17.9322 32.6875C18.4924 32.2684 18.9066 31.678 19.1145 31.0024C18.1393 31.0757 17.1029 31.1135 16 31.1135Z"
                                fill="#fff"/>
                            <circle cx="24" cy="7" r="5" fill="#C70404" stroke="white" stroke-width="2"/>
                        </svg>
                    </a>
                    <div class="group-box group-user toggle-content">
                        <a href="#" title="{{__('auth.personal_information')}}" class="btn_user  mr-3">
                            <img
                                src="{{!empty(session()->get('customer')['avatar']) ? asset(session()->get('customer')['avatar']): asset('frontend/images/avatar_user.png')}}"
                                class="img-fluid" alt=""/>
                        </a>
                        <!--CHÚ Ý CLASS unconfirmed khi chưa xác thực - confirmed cho xác thực-->
                        <div class="group-action-user">
                            <p title="{{__('auth.personal_information')}}" class="btn_user_link btn_toggle ">
                                {{!empty(session()->get('customer')['full_name']) ? session()->get('customer')['full_name'] : ""}}
                                <svg class="ml-1" width="12" height="7" viewBox="0 0 12 7" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                          d="M0.646447 0.646447C0.841709 0.451184 1.15829 0.451184 1.35355 0.646447L6 5.29289L10.6464 0.646447C10.8417 0.451184 11.1583 0.451184 11.3536 0.646447C11.5488 0.841709 11.5488 1.15829 11.3536 1.35355L6.35355 6.35355C6.15829 6.54882 5.84171 6.54882 5.64645 6.35355L0.646447 1.35355C0.451184 1.15829 0.451184 0.841709 0.646447 0.646447Z"
                                          fill="white"/>
                                </svg>
                            </p>
                            <div class="wrapper-box content" style="display:none;">
                                <div class="box">
                                    @if (!empty(session()->get('customer')))
                                        @if (session()->get('customer')['accuracy'] == 0)
                                            <p class="alert-confirmed">
                                                {{__('profile.yet_auth')}}
                                            </p>
                                        @elseif (session()->get('customer')['accuracy'] == 1)
                                            <p class="alert alert-success">
                                                {{__('profile.success_auth')}}
                                            </p>
                                        @elseif (session()->get('customer')['accuracy'] == 2)
                                            <p class="alert alert-warning">
                                                {{__('profile.wait_auth')}}
                                            </p>
                                        @else
                                            <p class="alert alert-danger">
                                                {{__('profile.fail_auth')}}
                                            </p>
                                        @endif
                                    @endif
                                    <a href="{{route('customer.user.manager')}}" title=""
                                       class="d-flex align-items-center justify-content-between action">
                                        {{__('auth.personal_information')}}
                                        <svg class="pl-2" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                             viewBox="0 0 16 16" fill="none">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                  d="M2.97631 10.3103C3.60143 9.68517 4.44928 9.33398 5.33333 9.33398H10.6667C11.5507 9.33398 12.3986 9.68517 13.0237 10.3103C13.6488 10.9354 14 11.7833 14 12.6673V14.0007C14 14.3688 13.7015 14.6673 13.3333 14.6673C12.9651 14.6673 12.6667 14.3688 12.6667 14.0007V12.6673C12.6667 12.1369 12.456 11.6282 12.0809 11.2531C11.7058 10.878 11.1971 10.6673 10.6667 10.6673H5.33333C4.8029 10.6673 4.29419 10.878 3.91912 11.2531C3.54405 11.6282 3.33333 12.1369 3.33333 12.6673V14.0007C3.33333 14.3688 3.03486 14.6673 2.66667 14.6673C2.29848 14.6673 2 14.3688 2 14.0007V12.6673C2 11.7833 2.35119 10.9354 2.97631 10.3103Z"
                                                  fill="#676767"/>
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                  d="M8.00008 2.66732C6.89551 2.66732 6.00008 3.56275 6.00008 4.66732C6.00008 5.77189 6.89551 6.66732 8.00008 6.66732C9.10465 6.66732 10.0001 5.77189 10.0001 4.66732C10.0001 3.56275 9.10465 2.66732 8.00008 2.66732ZM4.66675 4.66732C4.66675 2.82637 6.15913 1.33398 8.00008 1.33398C9.84103 1.33398 11.3334 2.82637 11.3334 4.66732C11.3334 6.50827 9.84103 8.00065 8.00008 8.00065C6.15913 8.00065 4.66675 6.50827 4.66675 4.66732Z"
                                                  fill="#676767"/>
                                        </svg>
                                    </a>
                                    <a href="{{route('customer.logout')}}" title=""
                                       class="d-flex align-items-center justify-content-between action">
                                        {{__('auth.logout')}}
                                        <svg class="pl-2" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                             viewBox="0 0 16 16" fill="none">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                  d="M3.33325 2.66732C3.15644 2.66732 2.98687 2.73756 2.86185 2.86258C2.73682 2.9876 2.66659 3.15717 2.66659 3.33398V12.6673C2.66659 12.8441 2.73682 13.0137 2.86185 13.1387C2.98687 13.2637 3.15644 13.334 3.33325 13.334H5.99992C6.36811 13.334 6.66658 13.6325 6.66658 14.0007C6.66658 14.3688 6.36811 14.6673 5.99992 14.6673H3.33325C2.80282 14.6673 2.29411 14.4566 1.91904 14.0815C1.54397 13.7065 1.33325 13.1978 1.33325 12.6673V3.33398C1.33325 2.80355 1.54397 2.29484 1.91904 1.91977C2.29411 1.5447 2.80282 1.33398 3.33325 1.33398H5.99992C6.36811 1.33398 6.66658 1.63246 6.66658 2.00065C6.66658 2.36884 6.36811 2.66732 5.99992 2.66732H3.33325Z"
                                                  fill="#676767"/>
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                  d="M10.1953 4.19526C10.4556 3.93491 10.8777 3.93491 11.1381 4.19526L14.4714 7.5286C14.7318 7.78894 14.7318 8.21106 14.4714 8.4714L11.1381 11.8047C10.8777 12.0651 10.4556 12.0651 10.1953 11.8047C9.93491 11.5444 9.93491 11.1223 10.1953 10.8619L13.0572 8L10.1953 5.13807C9.93491 4.87772 9.93491 4.45561 10.1953 4.19526Z"
                                                  fill="#676767"/>
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                  d="M5.33325 8.00065C5.33325 7.63246 5.63173 7.33398 5.99992 7.33398H13.9999C14.3681 7.33398 14.6666 7.63246 14.6666 8.00065C14.6666 8.36884 14.3681 8.66732 13.9999 8.66732H5.99992C5.63173 8.66732 5.33325 8.36884 5.33325 8.00065Z"
                                                  fill="#676767"/>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--DA LOGIN-->
                @endif
            </div>
        </div>
    </div>
</header>
