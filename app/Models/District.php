<?php


namespace App\Models;


class District extends BaseModel
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
    const CITY_ID = 'city_id';
    const PARENT_CODE = 'parent_code';

    //status
    const ACTIVE = 'active';
    const BLOCK = 'block';

    protected $table = 'district';

    public function wards()
    {
        return $this->hasMany(Ward::class, Ward::DISTRICT_ID);
    }

    public function city()
    {
        return $this->belongsTo(City::class, self::CITY_ID);
    }

    public function realEstateProjects()
    {
        return $this->hasMany(RealEstateProject::class, RealEstateProject::DISTRICT_ID);
    }
}
