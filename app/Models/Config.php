<?php


namespace App\Models;


class Config extends BaseModel
{
    protected $table = 'config';

    //column
    const PROJECT_ID = 'project_id';
    const EXTEND = 'extend';
    const ASSET = 'asset';
    const INVESTOR = 'investor';
    const DOCUMENT = 'document';
    const PLAN = 'plan';
    const FINANCIAL = 'financial';
    const RATE = 'rate';
    const TYPE = 'type';
}
