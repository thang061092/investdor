@extends("customer.layout.master")
@section('page_name', __('page_name.personal_profile'))
@section("content")
    @include('customer.user.header-your-manager')
    <section class="profile">
        <div class="container mb-xl-4 pb-lg-2 mb-3">
            <div class="box-profile" style="
                background-image: url('{{asset('frontend/images/bg.jpg')}}');
                background-size: cover;
                background-repeat: no-repeat;
                ">
                <div class="row">
                    <div
                        class="col-md-9 mb-md-0 mb-5 d-flex flex-wrap align-items-center justify-content-lg-start justify-content-center wow fadeInUp">
                        <div class="img mr-3 pr-1 mb-sm-0 mb-3">
                            <img
                                src='{{!empty(session()->get("customer")["avatar"]) ? asset(session()->get("customer")["avatar"]): asset("frontend/images/avatar_user.png")}}'
                                class="img-fluid" alt=""/>
                        </div>
                        <div class="content text-lg-left text-center">
                            <p class="title_lg">{{session()->get("customer")["full_name"]}}</p>
                            <div class="desc">
                                {{session()->get("customer")["address"]}}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 align-items-end justify-content-end d-flex">
                        <a href="{{route('customer.user.manager'). '?main_tab=profile&action=update'}}"
                           title="Chỉnh sửa Profile" class="edit_profile btn_all">
                            {{__('profile.edit_profile')}}
                            <svg class="ml-2" xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                 viewBox="0 0 20 20" fill="none">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                      d="M11.0777 1.07733C11.4032 0.751893 11.9308 0.751893 12.2562 1.07733L15.5896 4.41066C15.915 4.7361 15.915 5.26374 15.5896 5.58917L6.42291 14.7558C6.26663 14.9121 6.05467 14.9999 5.83366 14.9999H2.50033C2.04009 14.9999 1.66699 14.6268 1.66699 14.1666V10.8333C1.66699 10.6122 1.75479 10.4003 1.91107 10.244L11.0777 1.07733ZM3.33366 11.1784V13.3333H5.48848L13.8218 4.99992L11.667 2.8451L3.33366 11.1784Z"
                                      fill="#03204C"/>
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                      d="M1.66699 18.3333C1.66699 17.8731 2.04009 17.5 2.50033 17.5H17.5003C17.9606 17.5 18.3337 17.8731 18.3337 18.3333C18.3337 18.7936 17.9606 19.1667 17.5003 19.1667H2.50033C2.04009 19.1667 1.66699 18.7936 1.66699 18.3333Z"
                                      fill="#03204C"/>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-5 mb-lg-0 mb-4 wow fadeInUp">
                    @if ($detail['accuracy'] != 1)
                        <div class="ping-alert-note mb-4 pb-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                      d="M12 3C7.02944 3 3 7.02944 3 12C3 16.9706 7.02944 21 12 21C16.9706 21 21 16.9706 21 12C21 7.02944 16.9706 3 12 3ZM1 12C1 5.92487 5.92487 1 12 1C18.0751 1 23 5.92487 23 12C23 18.0751 18.0751 23 12 23C5.92487 23 1 18.0751 1 12Z"
                                      fill="#C70404"/>
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                      d="M12 7C12.5523 7 13 7.44772 13 8V12C13 12.5523 12.5523 13 12 13C11.4477 13 11 12.5523 11 12V8C11 7.44772 11.4477 7 12 7Z"
                                      fill="#C70404"/>
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                      d="M11 16C11 15.4477 11.4477 15 12 15H12.01C12.5623 15 13.01 15.4477 13.01 16C13.01 16.5523 12.5623 17 12.01 17H12C11.4477 17 11 16.5523 11 16Z"
                                      fill="#C70404"/>
                            </svg>
                            {{__('profile.warning_note')}}
                        </div>
                    @endif
                    <div class="group-box mb-xl-4 mb-3">
                        <p class="title_lg">{{__('profile.personal_information')}}</p>
                        <p class="c-label mb-1">{{__('profile.full_name')}}</p>
                        <div class="c-value mb-lg-3 mb-2">
                            {{session()->get("customer")["full_name"]}}
                        </div>
                        <p class="c-label mb-1">{{__('profile.date_of_birth')}}</p>
                        @if (!empty(session()->get("customer")["birthday"]))
                            <div class="c-value mb-lg-3 mb-2">{{date('d/m/Y', strtotime($detail->birthday))}}</div>
                        @else
                            <div class="c-value mb-lg-3 mb-2"></div>
                        @endif
                        <p class="c-label mb-1">{{__('profile.gender')}}</p>
                        <div class="c-value mb-lg-3 mb-2">
                            @if (session()->get("customer")["gender"] == 1)
                                Nam
                            @elseif (session()->get("customer")["gender"] == 2)
                                Nữ
                            @endif
                        </div>
                        <p class="c-label mb-1">{{__('profile.phone_number')}}</p>
                        <div class="c-value mb-lg-3 mb-2">{{session()->get("customer")["phone"]}}</div>
                        <p class="c-label mb-1">{{__('profile.email')}}</p>
                        <div class="c-value mb-lg-3 mb-2">
                            {{session()->get("customer")["email"]}}
                        </div>
                    </div>
                    <div class="group-box">
                        <p class="title_lg">{{__('profile.bank_account')}}</p>
                        <p class="c-label mb-1">{{__('profile.bank_name')}}</p>
                        <div class="c-value mb-lg-3 mb-2">
                            @if (isset($banks))
                                @foreach ($banks as $bank)
                                    @if ($bank->code == session()->get("customer")["bank_name"])
                                        {{$bank->name}}
                                    @endif
                                @endforeach
                            @endif
                        </div>
                        <p class="c-label mb-1">{{__('profile.account_number')}}</p>
                        <div class="c-value mb-lg-3 mb-2">{{session()->get("customer")["account_number"]}}</div>
                        <p class="c-label mb-1">{{__('profile.account_holder')}}</p>
                        <div class="c-value">{{session()->get("customer")["account_name"]}}</div>
                    </div>
                </div>
                <div class="col-lg-7 wow fadeInUp">
                    <div class="group-box cmt">
                        <p class="title_lg">{{__('profile.certificate_information')}}</p>
                        @if ($detail['accuracy'] != 1)
                            <div class="alert-note">
                                <svg class="mx-auto d-block mb-2" xmlns="http://www.w3.org/2000/svg" width="40"
                                     height="40"
                                     viewBox="0 0 40 40" fill="none">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                          d="M17.547 3.80518C18.2958 3.38359 19.1406 3.16211 20 3.16211C20.8593 3.16211 21.7041 3.38359 22.4529 3.80518C23.2018 4.22677 23.8293 4.83424 24.275 5.56897L24.2798 5.57688L38.3964 29.1436L38.4099 29.1666C38.8465 29.9226 39.0775 30.7798 39.08 31.6529C39.0824 32.5259 38.8562 33.3844 38.4239 34.1429C37.9915 34.9014 37.3681 35.5335 36.6157 35.9762C35.8632 36.419 35.0079 36.657 34.1349 36.6666L34.1166 36.6668L5.86497 36.6667C4.99196 36.6571 4.13669 36.419 3.38424 35.9762C2.63178 35.5335 2.00837 34.9014 1.57604 34.1429C1.1437 33.3844 0.917497 32.5259 0.919941 31.6529C0.922386 30.7798 1.15339 29.9226 1.58997 29.1666L1.60351 29.1436L15.7202 5.5769L17.1499 6.43333L15.725 5.56897C16.1706 4.83424 16.7982 4.22677 17.547 3.80518ZM18.577 7.29441L4.4711 30.8431C4.32914 31.0927 4.25407 31.3749 4.25326 31.6622C4.25245 31.9532 4.32785 32.2394 4.47196 32.4922C4.61607 32.7451 4.82388 32.9557 5.07469 33.1033C5.32332 33.2496 5.60561 33.3289 5.89395 33.3334H34.106C34.3943 33.3289 34.6766 33.2496 34.9252 33.1033C35.176 32.9557 35.3838 32.745 35.5279 32.4922C35.6721 32.2394 35.7475 31.9532 35.7466 31.6622C35.7458 31.3749 35.6708 31.0928 35.5289 30.8431L21.425 7.29773C21.4243 7.29662 21.4236 7.29552 21.4229 7.29441C21.2745 7.05099 21.0661 6.84969 20.8176 6.7098C20.568 6.56927 20.2864 6.49544 20 6.49544C19.7135 6.49544 19.4319 6.56927 19.1823 6.7098C18.9338 6.84969 18.7254 7.05099 18.577 7.29441Z"
                                          fill="#FFC107"/>
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                          d="M18.333 28.3334C18.333 27.4129 19.0792 26.6667 19.9997 26.6667H20.0163C20.9368 26.6667 21.683 27.4129 21.683 28.3334C21.683 29.2539 20.9368 30.0001 20.0163 30.0001H19.9997C19.0792 30.0001 18.333 29.2539 18.333 28.3334Z"
                                          fill="#FFC107"/>
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                          d="M19.9997 13.3333C20.9201 13.3333 21.6663 14.0794 21.6663 14.9999V21.6666C21.6663 22.5871 20.9201 23.3333 19.9997 23.3333C19.0792 23.3333 18.333 22.5871 18.333 21.6666V14.9999C18.333 14.0794 19.0792 13.3333 19.9997 13.3333Z"
                                          fill="#FFC107"/>
                                </svg>
                                <p class="desc text-center mb-3 pb-2">
                                    {{__('profile.update_certificate')}}
                                </p>
                                @endif
                                <form action="{{route('customer.user.auth')}}" method="post" accept-charset="utf-8"
                                      enctype='multipart/form-data'>
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6 mb-md-0 mb-3">
                                            <label for="img-cmt-before" class="img-cmt">
                                                <input type="file" name="img_before" accept="image/*" class="d-none"
                                                       id="img-cmt-before"
                                                       value="{{!empty(session()->get('customer')['front_facing_card']) ? session()->get('customer')['front_facing_card'] : $detail->front_facing_card}}"
                                                       onchange="document.getElementById('img-before').src = window.URL.createObjectURL(this.files[0])"/>
                                                @if (session()->get('customer')['front_facing_card'])
                                                    <img id="img-before"
                                                         src='{{asset(session()->get("customer")["front_facing_card"])}}'
                                                         class="img-fluid" alt=""/>
                                                @else
                                                    <img id="img-before"
                                                         src="{{asset('frontend/images/before-cmt.png')}}"
                                                         class="img-fluid" alt=""/>
                                                @endif
                                            </label>
                                            <p class="c-cmt mt-3">{{__('profile.facede')}}</p>
                                            @if($errors->has('img_before'))
                                                <p class="text-danger"
                                                   style="padding-bottom: 10px;">{{ $errors->first('img_before') }}</p>
                                            @endif
                                        </div>
                                        <div class="col-md-6 mb-md-0 mb-3">
                                            <label for="img-cmt-after" class="img-cmt">
                                                <input type="file" name="img_after" accept="image/*" class="d-none"
                                                       id="img-cmt-after"
                                                       value="{{!empty(session()->get('customer')['card_back']) ? session()->get('customer')['card_back'] : $detail->card_back}}"
                                                       onchange="document.getElementById('img-after').src = window.URL.createObjectURL(this.files[0])"/>
                                                @if (session()->get("customer")["card_back"])
                                                    <img id="img-after"
                                                         src='{{asset(session()->get("customer")["card_back"])}}'
                                                         class="img-fluid" alt=""/>
                                                @else
                                                    <img id="img-after" src="{{asset('frontend/images/after-cmt.png')}}"
                                                         class="img-fluid" alt=""/>
                                                @endif
                                            </label>
                                            <p class="c-cmt mt-3">{{__('profile.backside')}}</p>
                                            @if($errors->has('img_after'))
                                                <p class="text-danger"
                                                   style="padding-bottom: 10px;">{{ $errors->first('img_after') }}</p>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="text-right mt-xl-4 mt-3">
                                        @if (session()->get('customer')['accuracy'] != 1 && session()->get('customer')['accuracy'] != 2)
                                            <a type="button" class="btn_all reset mr-2" id="reselect">
                                                {{__('profile.reselect')}}</a>
                                            <button type="submit" class="btn_all accept" id="auth">
                                                {{__('profile.auth')}}</button>
                                        @endif
                                    </div>
                            </div>
                            </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@section('js')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            toastr.options.timeOut = 10000;
            @if (Session::has('error'))
            toastr.error('{{ Session::get('error') }}');
            @elseif(Session::has('success'))
            toastr.success('{{ Session::get('success') }}');
            @endif
        });
        $(document).ajaxStart(function () {
            $("#loading").show();
            var loadingHeight = window.screen.height;
            $("#loading, .right-col iframe").css('height', loadingHeight);
        }).ajaxStop(function () {
            $("#loading").hide();
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function () {
            $("#reselect").click(function (e) {
                e.preventDefault();
                $("#img-before").removeAttr('src');
                $("#img-before").attr('src', "{{asset('frontend/images/after-cmt.png')}}")
                $("#img-after").removeAttr('src');
                $("#img-after").attr('src', "{{asset('frontend/images/after-cmt.png')}}")
            });
        });
    </script>
@endsection
@stop
