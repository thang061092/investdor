<?php


namespace App\Http\Services;


class VietQr
{
    public function __construct()
    {
        $this->vietqr_url = env('VIET_QR_URL');
        $this->bank_code = env('BANK_CODE');
        $this->template = env('TEMPLATE');
        $this->account = env('ACCOUNT');
        $this->account_name = env('ACCOUNT_NAME');
    }

    public function get_link($amount, $description)
    {
        $link = $this->vietqr_url . $this->bank_code . "-" . $this->account . '-' . $this->template
            . '?amount=' . $amount
            . '&addInfo=' . $description
            . '&accountName=' . $this->account_name;
        return $link;
    }
}
