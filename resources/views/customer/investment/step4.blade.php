@extends("customer.layout.master")
@section('page_name', __('page_name.investment'))
@section('css')
    <style>
        .btn-copy {
            position: absolute;
            right: 1rem;
            top: 50%;
            transform: translateY(-50%);
            display: inline-block;
            background: #03204c;
            color: #fff;
            font-size: 0.75rem;
            padding: 0.4688rem 0.75rem;
            font-weight: 600;
            border-radius: 0.3125rem;
            cursor: pointer;
            border: solid thin transparent;
            z-index: 1;
            transition: 0.3s all 0s;
        }
    </style>
@endsection
@section("content")
    <section class="invest-complete mt-lg-4 mt-3 pt-2">
        <div class="container">
            <div class="row">
                <div class="col-lg-auto mb-lg-0 mb-3 wow fadeInLeft">
                    <div class="group-box">
                        <p class="title_lg">
                            {{__('auth.Transfer_the_investment_to_the_following_account_number')}}
                        </p>
                        <div class="ping-alert-note ping mt-lg-4 pt-lg-2 mt-3 mb-lg-4 mb-3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                      d="M10.529 2.2833C10.9782 2.03035 11.4852 1.89746 12.0008 1.89746C12.5164 1.89746 13.0233 2.03035 13.4725 2.2833C13.9218 2.53626 14.2983 2.90074 14.5658 3.34158L14.5686 3.34633L23.0386 17.4863L23.0467 17.5001C23.3087 17.9538 23.4473 18.4681 23.4488 18.9919C23.4502 19.5158 23.3145 20.0308 23.0551 20.4859C22.7957 20.941 22.4217 21.3203 21.9702 21.5859C21.5187 21.8516 21.0055 21.9944 20.4817 22.0001L20.4708 22.0003L3.51976 22.0002C2.99596 21.9944 2.48279 21.8516 2.03132 21.5859C1.57985 21.3203 1.20581 20.941 0.946403 20.4859C0.686999 20.0308 0.551279 19.5158 0.552746 18.9919C0.554213 18.4681 0.692815 17.9538 0.954763 17.5001L0.962886 17.4863L9.43289 3.34633L10.2907 3.86019L9.43575 3.34158C9.70316 2.90074 10.0797 2.53626 10.529 2.2833ZM11.147 4.37684L2.68344 18.506C2.59826 18.6558 2.55322 18.8251 2.55274 18.9975C2.55225 19.1721 2.59749 19.3438 2.68396 19.4955C2.77043 19.6472 2.89511 19.7736 3.0456 19.8622C3.19477 19.95 3.36415 19.9975 3.53715 20.0002H20.4644C20.6374 19.9975 20.8067 19.95 20.9559 19.8622C21.1064 19.7736 21.2311 19.6472 21.3175 19.4955C21.404 19.3438 21.4493 19.1721 21.4488 18.9975C21.4483 18.8251 21.4033 18.6559 21.3181 18.5061L12.8558 4.37883C12.8554 4.37817 12.8549 4.37751 12.8545 4.37684C12.7655 4.23079 12.6404 4.11001 12.4914 4.02607C12.3416 3.94176 12.1726 3.89746 12.0008 3.89746C11.8289 3.89746 11.6599 3.94176 11.5102 4.02607C11.3611 4.11001 11.236 4.23079 11.147 4.37684Z"
                                      fill="#A87F05"/>
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                      d="M11 17C11 16.4477 11.4477 16 12 16H12.01C12.5623 16 13.01 16.4477 13.01 17C13.01 17.5523 12.5623 18 12.01 18H12C11.4477 18 11 17.5523 11 17Z"
                                      fill="#A87F05"/>
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                      d="M12 8C12.5523 8 13 8.44772 13 9V13C13 13.5523 12.5523 14 12 14C11.4477 14 11 13.5523 11 13V9C11 8.44772 11.4477 8 12 8Z"
                                      fill="#A87F05"/>
                            </svg>
                            {{__('auth.Please_pay_within_24_hours')}}
                            . {{__('auth.You_can_track_the_project_is_metrics')}}
                            <a class="more text-danger" href="{{route('customer.user.manager')}}"
                               title="Báo cáo của tôi.">{{__('auth.here')}}</a>
                        </div>
                        <label for="" class="d-block mb-2 c-label">
                            {{__('auth.bank')}}
                        </label>
                        <input disabled type="text" name="" value="{{$bill->name_bank ?? ''}}"
                               class="form-control mb-lg-4 mb-3 pb-1"/>
                        <label for="" class="d-block mb-2 c-label">
                            {{__('auth.Receiver_account_name')}}
                        </label>
                        <p class="text mb-lg-3 mb-2 pb-1">{{$bill->name_account_bank ?? ''}}</p>
                        <label for="" class="d-block mb-2 c-label">
                            {{__('auth.Account_number')}}
                        </label>
                        <div class="box-copy mb-lg-3 mb-2 pb-1">
                            <input disabled type="text" name="" value="{{$bill->bank_account ?? ''}}"
                                   class="form-control" id="copy_bank_account"/>
                            <span class="btn-copy btn" onclick="copy_bank_account()">{{__('auth.copy')}}</span>
                            {{--                            <span class="copy" data-title-success="{{__('message.success')}}" data-title-fail="{{__('message.fail')}}">{{__('auth.copy')}}</span>--}}
                        </div>
                        <label for="" class="d-block c-label">
                            {{__('auth.money')}}
                        </label>
                        <p class="text mb-lg-3 mb-2 pb-1">{{!empty($bill->amount_money) ? number_format_vn($bill->amount_money) : ''}}
                            VND</p>
                        <label for="" class="d-block mb-2 c-label">
                            {{__('auth.Transfer_Contents')}}
                        </label>
                        <div class="box-copy mb-lg-3 mb-2 pb-1">
                            <input type="text" name="" value="{{$bill->order_code ?? ''}}"
                                   class="form-control" id="copy_order_code"/>
                            <span class="btn-copy btn" onclick="copy_order_code()">{{__('auth.copy')}}</span>
                        </div>
                        <div class="ping-alert-note">
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
                            {{__('auth.If_the_transfer_content_is_missing_or_incorrect')}}
                        </div>
                    </div>
                </div>
                <div class="col-lg-auto wow fadeInRight">
                    <div class="group-box">
                        <p class="title_lg">{{__('auth.Or_scan_the_following_QR_code')}}</p>
                        <div class="qr d-block">
                            <a href="{{$bill->link_qr ?? ''}}" title="{{__('auth.download')}}" class="dl-qrcode"
                               download="Qrcode">{{__('auth.download')}}</a>
                            <img src="{{$bill->link_qr ?? ''}}" class="img-fluid" alt=""/>
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-center">
                <a href="{{route('customer.user.manager').'?main_tab=manager&tab=warning'}}" type="button"
                   class="btn_all mt-xl-5 mt-lg-4 mt-3">
                    {{__('auth.I_made_a_transfer')}}
                </a>
            </div>
        </div>
    </section>
@endsection
@section('js')
    <script>
        let text_bank = document.getElementById('copy_bank_account');
        const copy_bank_account = async () => {
            try {
                await navigator.clipboard.writeText(text_bank.value);
                toastr.success('Copied!')
            } catch (err) {
                console.log(err)
            }
        }

        let text_code = document.getElementById('copy_order_code');
        const copy_order_code = async () => {
            try {
                await navigator.clipboard.writeText(text_code.value);
                toastr.success('Copied!')
            } catch (err) {
                console.log(err)
            }
        }
    </script>
@endsection
