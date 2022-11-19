<?php


namespace App\Models;


class Transaction extends BaseModel
{
//column
    const CONTRACT_ID = 'contract_id';
    const TYPE_METHOD = 'type_method';
    const SOURCE = 'source';
    const CODE = 'code';
    const AMOUNT = 'amount';
    const STATUS = 'status';
    const INTEREST = 'interest';
    const PRINCIPAL = 'principal';
    const MONEY_INTEREST = 'money_interest';
    const TOTAL_PRINCIPAL_INTEREST = 'total_principal_interest';
    const BILLS_ID = 'bills_id';
    const DATE_PAY = 'date_pay';
    const ESTIMATED_PAYMENT_DATE = 'estimated_payment_date';
    const FORM = 'form';
    const PAYMENT_INFO = 'payment_info';
    const PROFIT_BEFORE_TAX = 'profit_before_tax';
    const TAX = 'tax';
    const IMAGE = 'image';

    //status
    const NEW = 1;
    const SUCCESS = 2;
    const FAIL = 3;
    const PENDING = 4;
    const WARNING = 5;

    //type_method
    const INVESTMENT = 1; //đầu tư
    const EXPIRATION = 2; // đáo hạn

    protected $table = 'transaction';

    public function contract()
    {
        return $this->belongsTo(Contract::class, self::CONTRACT_ID);
    }

    public function bill()
    {
        return $this->belongsTo(Bills::class, self::BILLS_ID);
    }
}
