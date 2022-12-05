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
    style="max-width: 565px;margin: auto;color: #676767;font-family: 'Roboto';font-size: 14px;line-height: 1.35;background-color: #fff;">
    <div style="padding: 20px 16px 16px 16px; margin-bottom: 16px">
        <div style="margin-bottom: 24px">
            <img src="{{asset('frontend/images/banner-email.jpg')}}" alt=""
                 style="object-fit: cover; width: auto; max-width: 100%"/>
        </div>
        <h1 style="
                        font-size: 24px;
                        color: #595959;
                        font-weight: 600;
                        text-align: center;
                        text-transform: uppercase;
                    ">
            Quên mật khẩu
        </h1>
        <div style="margin-bottom: 8px">
            <div style="width: 36%; float: left">
                Kính gửi khách hàng:
            </div>
            <div style="font-weight: 600;color: #03204c;width: 64%;float: right;">
                {{$user->email}}
            </div>
            <div style="clear: both"></div>
        </div>
        <div style="margin-bottom: 8px">
            <div style="width: 36%; float: left">Đường dẫn:</div>
            <div style="
                            font-weight: 600;
                            width: 64%;
                            float: right;
                            word-break: break-all;
                        ">
                <a href="{{$link}}">Lấy mật khẩu mới</a>
            </div>
            <div style="clear: both"></div>
        </div>
        <div style="font-weight: 300">
            Đây là email được gửi tự động từ hệ thống InvestDor, Bạn vui
            lòng không trả lời email này. Để được hỗ trợ và giải đáp
            thắc mắc, Bạn vui lòng liên hệ InvestDor qua email
            support@InvestDor.vn hoặc gửi yêu cầu hỗ trợ
            <a href="#">Tại đây</a>.
        </div>
    </div>
    <div style="
                    background-color: #e5e8ed;
                    text-align: center;
                    padding: 10px;
                ">
        <div>
            <b style="font-size: 16px; font-weight: 600; color: #03204c">InvestDor</b>- Tên công ty
        </div>
        Email: support@InvestDor | Website: www.InvestDor.vn
    </div>
</div>
</body>
</html>
