<?php


namespace App\Models;


class Bills extends BaseModel
{
    //column
    const USER_ID = 'user_id';
    const AMOUNT_MONEY = 'amount_money';
    const STATUS = 'status';
    const SOURCE_PAYMENT = 'source_payment';
    const CONTRACT_ID = 'contract_id';
    const INTEREST_ID = 'interest_id';
    const TRANSACTION_ID = 'transaction_id';
    const REAL_ESTATE_PROJECT_ID = 'real_estate_project_id';
    const TYPE = 'type';
    const ORDER_CODE = 'order_code';
    const START = 'start';
    const END = 'end';
    const BANK_CODE = 'bank_code';
    const PART = 'part';
    const VALUE_PART = 'value_part';
    const BANK_ACCOUNT = 'bank_account';
    const NAME_ACCOUNT_BANK = 'name_account_bank';
    const LINK_QR = 'link_qr';
    const NAME_BANK = 'name_bank';
    const NOTE = 'note';
    const PAYMENT_DATE = 'payment_date';
    const IMAGE_LICENSE = 'image_license';
    const CHECKSUM = 'checksum';
    const TOTAL_MONEY = 'total_money';

    //status
    const NEW = 'new';
    const PENDING = 'pending';
    const SUCCESS = 'success';
    const WARNING = 'warning';
    const FAIL = 'fail';

    protected $table = 'bill';

    public function realEstateProject()
    {
        return $this->belongsTo(RealEstateProject::class, self::REAL_ESTATE_PROJECT_ID);
    }

    public function user()
    {
        return $this->belongsTo(Users::class, self::USER_ID);
    }
}
