<?php


namespace App\Http\Services;


class MailService
{
    public function sendMail($subject, $emailTo, $nameTo, $template)
    {
        $emailFrom = "support@tienngay.vn";
        $nameFrom = "Admin";
        $key = env('SENDGIRD_API_KEY');

        $email = new \SendGrid\Mail\Mail();
        $email->setFrom($emailFrom, $nameFrom);
        $email->setSubject($subject);
        $email->addTo($emailTo, $nameTo);
        $email->addContent('text/html', $template);
        $sendgrid = new \SendGrid($key);
        $response = $sendgrid->send($email);
        return $response;
    }
}
