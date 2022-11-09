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

    //status
    const NEW = 'new';
    const PENDING = 'pending';
    const SUCCESS = 'success';
    const WARNING = 'warning';
    const FAIL = 'fail';

    protected $table = 'bills';
}
