@extends("customer.layout.master")
@section("content")
    <section class="invest-complete mt-lg-4 mt-3 pt-2">
        <div class="container">
            <div class="row">
                <div class="col-lg-auto mb-lg-0 mb-3 wow fadeInLeft">
                    <div class="group-box">
                        <p class="title_lg">
                            Chuyển khoản đầu tư tới số tài khoản sau
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
                            Vui lòng thanh toán trong vòng 24h. Bạn có thể theo dõi
                            các chỉ số của dự án tại mục
                            <a class="more" href="" title="Báo cáo của tôi.">Báo cáo của tôi.</a>
                        </div>
                        <label for="" class="d-block mb-2 c-label">
                            Ngân hàng
                        </label>
                        <input disabled type="text" name="" placeholder="VPBank"
                               class="form-control mb-lg-4 mb-3 pb-1"/>
                        <label for="" class="d-block mb-2 c-label">
                            Tên tài khoản nhận
                        </label>
                        <p class="text mb-lg-3 mb-2 pb-1">Công ty InvestDor</p>
                        <label for="" class="d-block mb-2 c-label">
                            Tên tài khoản
                        </label>
                        <div class="box-copy mb-lg-3 mb-2 pb-1">
                            <input disabled type="text" name="" value="003625698" placeholder="003625698"
                                   class="form-control"/>
                            <span class="copy" data-title-success="Copy thành công" data-title-fail="Copy thất bại !">Sao chép</span>
                        </div>
                        <label for="" class="d-block c-label">
                            Số tiền cần chuyển
                        </label>
                        <p class="text mb-lg-3 mb-2 pb-1">XX.XXX.XXX $</p>
                        <label for="" class="d-block mb-2 c-label">
                            Nội dung chuyển khoản
                        </label>
                        <div class="box-copy mb-lg-3 mb-2 pb-1">
                            <input type="text" name="" value="noidungck0001639875" placeholder="noidungck0001639875"
                                   class="form-control"/>
                            <span class="copy" data-title-success="Copy thành công" data-title-fail="Copy thất bại !">Sao chép</span>
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
                            Nếu nội dung chuyển khoản thiếu hoặc không chính xác.
                            Chúng tôi sẽ không thể nhận ra giao dịch của bạn.
                        </div>
                    </div>
                </div>
                <div class="col-lg-auto wow fadeInRight">
                    <div class="group-box">
                        <p class="title_lg">Hoặc scan mã QR code sau</p>
                        <div class="qr d-block">
                            <a href="" title="Tải xuống Qrcode" class="dl-qrcode">Tải xuống Qrcode</a>
                            <img src="{{asset('frontend/images/qr.png')}}" class="img-fluid" alt=""/>
                        </div>
                    </div>
                    <div class="group-box infomation-bank d-lg-none d-block">
                        <div class="d-flex justify-content-between align-items-center mb-lg-3 mb-2">
                            <div class="c-label">Khách hàng</div>
                            <div class="c-value">NGUYEN VAN HIEN</div>
                        </div>
                        <div class="d-flex justify-content-between align-items-center mb-lg-3 mb-2">
                            <div class="c-label">Ngân hàng</div>
                            <div class="c-value">VPBank</div>
                        </div>
                        <div class="d-flex justify-content-between align-items-center mb-lg-3 mb-2">
                            <div class="c-label">Số tài khoản</div>
                            <div class="c-value">34209123012930</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-center">
                <button type="submit" class="btn_all mt-xl-5 mt-lg-4 mt-3">
                    Tôi đã chuyển khoản
                </button>
            </div>
        </div>
    </section>
@stop
