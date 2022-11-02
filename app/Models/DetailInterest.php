<?php


namespace App\Models;


class DetailInterest extends BaseModel
{
    protected $table = 'detail_interest';

    //column
    const STATUS = 'status';
    const INTEREST = 'interest';
    const EARLY_INTEREST = 'early_interest';
    const FROM = 'from';
    const TO = 'to';
    const INTEREST_ID = 'interest_id';

    //status
    const ACTIVE = 'active';
    const BLOCK = 'block';

    public function interest()
    {
        return $this->belongsTo(Interest::class, self::INTEREST_ID);
    }
}
