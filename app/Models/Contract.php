<?php


namespace App\Models;


class Contract extends BaseModel
{
    const CODE = 'code';
    const USER_ID = 'user_id';
    const INTEREST = 'interest';
    const AMOUNT = 'amount'; // so tien ban dau
    const DATE_INIT = 'date_init'; //ngay bat dau
    const DUE_DATE = 'due_date'; // ngay dao han du kien
    const MONTH = 'month';
    const INTEREST_ID = 'interest_id';
    const STATUS = 'status';
    const EXPIRE_DATE = 'expire_date';  // ngay dao han thuc te
    const PART = 'part';
    const VALUE_PART = 'value_part';
    const REAL_ESTATE_PROJECT_ID = 'real_estate_project_id';

    //status
    const EFFECT = 1;
    const EXPIRE = 2;

    protected $table = 'contract';

    public function user()
    {
        return $this->belongsTo(Users::class, self::USER_ID);
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class, Transaction::CONTRACT_ID);
    }

    public function realEstateProject()
    {
        return $this->belongsTo(RealEstateProject::class, self::REAL_ESTATE_PROJECT_ID);
    }
}
