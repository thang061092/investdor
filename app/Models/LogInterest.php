<?php


namespace App\Models;


class LogInterest extends BaseModel
{
    protected $table = 'log_interest';

    //column
    const OLD = 'old';
    const NEW = 'new';
    const TYPE = 'type';
    const INTEREST_ID = 'interest_id';

    //type
    const CREATE = 'create';
    const UPDATE = 'update';
}
