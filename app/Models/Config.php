<?php


namespace App\Models;


class Config extends BaseModel
{
    protected $table = 'config';

    //column
    const NAME = 'name';
    const KEY = 'key';
    const STATUS = 'status';
    const LEVEL = 'level';
    const TYPE = 'type';
}
