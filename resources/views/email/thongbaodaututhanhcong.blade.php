<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta
        name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0"
    />
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <title>Document</title>
</head>
<body style="background-color: #ececec">
<div
    style="
                max-width: 565px;
                margin: auto;
                color: #676767;
                font-family: 'Roboto';
                font-size: 14px;
                line-height: 1.35;
                background-color: #fff;
           ">
    <div style="padding: 20px 16px 16px 16px; margin-bottom: 16px">
        <div style="margin-bottom: 24px">
            <img
                src="{{env('APP_ENV') == 'production' ? asset('frontend/images/banner-email.jpg') : 'https://service.tienngay.vn/uploads/avatar/1670298547-5b411af2242a651c637d84cd7a7471ac.jpg'}}"
                alt=""
                style="object-fit: cover; width: auto; max-width: 100%"/>
        </div>
        <h1 style="
                        font-size: 24px;
                        color: #595959;
                        font-weight: 600;
                        text-align: center;
                        text-transform: uppercase;
                    ">
            THÔNG BÁO ĐẦU TƯ THÀNH CÔNG
        </h1>
        <div style="margin-bottom: 8px">Dear Mr/Ms</div>
        <div style="margin-bottom: 8px">
            <div style="width: 36%; float: left">
                Kính gửi khách hàng:
            </div>
            <div style="
                            font-weight: 600;
                            color: #03204c;
                            text-transform: uppercase;
                            width: 64%;
                            float: right;
                        ">
                {{$contract->user->full_name ?? ""}}
            </div>
            <div style="clear: both"></div>
        </div>
        <div style="margin-bottom: 8px">
            <div style="width: 36%; float: left">Email:</div>
            <div style="
                            font-weight: 600;
                            width: 64%;
                            float: right;
                            word-break: break-all;
                        ">
                {{$contract->user->email ?? ""}}
            </div>
            <div style="clear: both"></div>
        </div>
        <div style="margin-bottom: 8px">
            <div style="width: 36%; float: left">Số điện thoại:</div>
            <div style="font-weight: 600; width: 64%; float: right">
                {{$contract->user->phone ?? ""}}
            </div>
            <div style="clear: both"></div>
        </div>
        <div style="margin-bottom: 8px">
            InvestDor xin chúc mừng Bạn đã thực hiện thành công giao
            dịch đầu tư dự án như sau:
        </div>
        <div style="margin-bottom: 8px; line-height: 1.3">
            <div
                style="
                            width: 36%;
                            float: left;
                            font-weight: 600;
                            line-height: 1.5;
                        ">
                Tên dự án:
            </div>
            <div style="
                            font-weight: 600;
                            width: 64%;
                            float: right;
                            font-size: 18px;
                            color: #03204c;
                        ">
                {{$contract->realEstateProject->name_vi ?? ""}}
            </div>
            <div style="clear: both"></div>
        </div>
        <div style="margin-bottom: 8px">
            <div style="
                            width: 36%;
                            float: left;
                            line-height: 1.45;
                            font-weight: 600;
                        ">
                Số phần đầu tư:
            </div>
            <div style="
                            font-weight: 600;
                            color: #03204c;
                            font-size: 16px;
                            width: 64%;
                            float: right;
                        ">
                {{!empty($contract->part) ? number_format_vn($contract->part) :  ""}} phần
            </div>
            <div style="clear: both"></div>
        </div>
        <div style="margin-bottom: 8px">
            <div style="
                            width: 36%;
                            float: left;
                            line-height: 1.45;
                            font-weight: 600;
                        ">
                Số tiền đầu tư:
            </div>
            <div
                style="width: 64%; float: right">{{!empty($contract->amount) ? number_format_vn($contract->amount) :  ""}}
                vnđ
            </div>
            <div style="clear: both"></div>
        </div>
        <div style="margin-bottom: 8px">
            <div style="
                            width: 36%;
                            float: left;
                            line-height: 1.45;
                            font-weight: 600;
                        ">
                Lợi nhuận đầu tư:
            </div>
            <div style="width: 64%; float: right">{{data_get(json_decode($contract->interest, true), 'interest')}}
                %/năm
            </div>
            <div style="clear: both"></div>
        </div>
        <div style="margin-bottom: 8px">
            Hãy xem các khoản đầu tư của bạn tại
            <a href="{{route('customer.user.manager')}}" style="color: #03204c">Quản lý của tôi </a>
        </div>
        <div style="margin-bottom: 24px">
            InvestDor trân trọng cảm ơn Bạn đã quan tâm và đồng hành
            cùng chúng tôi.
        </div>
        <div style="font-weight: 300">
            Đây là email được gửi tự động từ hệ thống InvestDor, Bạn vui
            lòng không trả lời email này. Để được hỗ trợ và giải đáp
            thắc mắc, Bạn vui lòng liên hệ InvestDor qua email
            support@InvestDor.vn
        </div>
    </div>
    <div style="
                    background-color: #e5e8ed;
                    text-align: center;
                    padding: 10px;
                ">
        <div>
            <b style="font-size: 16px; font-weight: 600; color: #03204c">InvestDor</b>
            - Tên công ty
        </div>
        Email: support@InvestDor | Website: investDor.vn
    </div>
</div>
</body>
</html>
