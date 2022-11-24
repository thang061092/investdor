<?php


namespace App\Models;


class BusinessPlane extends BaseModel
{
    protected $table = 'business_plane';

    //column
    const TITLE_VI = 'title_vi';
    const TITLE_EN = 'title_en';
    const SLUG_VI = 'slug_vi';
    const SLUG_EN = 'slug_en';
    const DESCRIPTION_VI = 'description_vi';
    const DESCRIPTION_EN = 'description_en';
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
