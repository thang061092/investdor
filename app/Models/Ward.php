<?php


namespace App\Models;


class Ward extends BaseModel
{
    //column
    const NAME = 'name';
    const SLUG = 'slug';
    const TYPE = 'type';
    const NAME_WITH_TYPE = 'name_with_type';
    const CODE = 'code';
    const STATUS = 'status';
    const PATH = 'path';
    const PATH_WITH_TYPE = 'path_with_type';
    const DISTRICT_ID = 'district_id';
    const PARENT_CODE = 'parent_code';

    //status
    const ACTIVE = 'active';
    const BLOCK = 'block';

    protected $table = 'ward';

    public function district()
    {
        return $this->belongsTo(District::class, self::DISTRICT_ID);
    }
}
