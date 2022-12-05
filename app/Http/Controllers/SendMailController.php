<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SendMailController extends BaseController
{
    public function sendMail()
    {
        $emailFrom = "support@tienngay.vn";
        $nameFrom = "Tienngay.vn";
        $subject = "Đây là tiêu đề!";

        $emailTo = "buimanhthangtb@gmail.com";
        $nameTo = "Bùi Mạnh Thắng";
        $template =  view('template.thongbaodautu')->render();
        $key = env('SENDGIRD_API_KEY');

        $email = new \SendGrid\Mail\Mail();
        $email->setFrom($emailFrom, $nameFrom);
        $email->setSubject($subject);
        $email->addTo($emailTo, $nameTo);
        $email->addContent('text/html', $template);
        $sendgrid = new \SendGrid($key);
        $response = $sendgrid->send($email);
        return BaseController::send_response(self::HTTP_OK, __('message.success'), $response);
    }
}
