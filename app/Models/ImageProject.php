<?php


namespace App\Models;


class ImageProject extends BaseModel
{
    protected $table = 'image_project';

    //column
    const PATH = 'path';
    const TYPE = 'type';
    const NAME = 'name';
    const STATUS = 'status';
    const REAL_ESTATE_PROJECT_ID = 'real_estate_project_id';

    //status
    const ACTIVE = 'active';
    const BLOCK = 'block';

    public function realEstateProject()
    {
        return $this->belongsTo(RealEstateProject::class, self::REAL_ESTATE_PROJECT_ID);
    }
}
