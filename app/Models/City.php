<?php


namespace App\Models;


class City extends BaseModel
{
    protected $table = 'city';

    //column
    const NAME = 'name';
    const SLUG = 'slug';
    const TYPE = 'type';
    const NAME_WITH_TYPE = 'name_with_type';
    const CODE = 'code';
    const STATUS = 'status';

    //status
    const ACTIVE = 'active';
    const BLOCK = 'block';

    public function districts()
    {
        return $this->hasMany(District::class, District::CITY_ID);
    }

    public function realEstateProjects()
    {
        return $this->hasMany(RealEstateProject::class, RealEstateProject::CITY_ID);
    }
}
