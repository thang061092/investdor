<?php


namespace App\Models;


class Notification extends BaseModel
{
    protected $table = 'notification';

    //column
    const STATUS = 'status';
    const TYPE = 'type';
    const REAL_ESTATE_PROJECT_ID = 'real_estate_project_id';
    const USER_ID = 'user_id';
    const IMAGE = 'image';
    const CONTENT = 'content';
    const TITLE = 'title';

    //status
    const ACTIVE = 'active';
    const BLOCK = 'block';

    public function realEstateProject()
    {
        return $this->belongsTo(RealEstateProject::class, self::REAL_ESTATE_PROJECT_ID);
    }

    public function user()
    {
        return $this->belongsTo(Users::class, self::USER_ID);
    }
}
