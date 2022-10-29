<?php


namespace App\Models;


class Bank extends BaseModel
{
    protected $table = 'bank';

    //column
    const NAME = 'name';
    const CODE = 'code';
    const BIN = 'bin';
    const SHORTNAME = 'shortName';
    const LOGO = 'logo';
    const TRANSFERSUPPORTED = 'transferSupported';
    const LOOKUPSUPPORTED = 'lookupSupported';
    const STATUS = 'status';

    //status
    const ACTIVE = 'active';
    const BLOCK = 'block';
}
