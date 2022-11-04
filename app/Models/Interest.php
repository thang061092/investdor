<?php


namespace App\Models;


class Interest extends BaseModel
{
    protected $table = 'interest';

    //column
    const STATUS = 'status';
    const TYPE = 'type';  //loai tich luy
    const PERIOD = 'period';   //ki han
    const DATE_INTEREST = 'date_interest';    // kieu tinh lai 360 hay 365
    const TYPE_INTEREST = 'type_interest';
    const MAINTAIN = 'maintain';

    //status
    const ACTIVE = 'active'; // maintain
    const BLOCK = 'block';  // not maintain

    public function detailInterests()
    {
        return $this->hasMany(DetailInterest::class, DetailInterest::INTEREST_ID);
    }

}
