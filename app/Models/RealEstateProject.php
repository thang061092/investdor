<?php


namespace App\Models;


class RealEstateProject extends BaseModel
{
    protected $table = 'real_estate_project';

    //column
    const NAME_VI = 'name_vi';
    const NAME_EN = 'name_en';
    const CITY = 'city';
    const DISTRICT = 'district';
    const WARD = 'ward';
    const ADDRESS = 'address';
    const IMAGE = 'image';
    const TOTAL_VALUE = 'total_value';
    const PART = 'part';
    const VALUE_PART = 'value_part';
    const DESCRIPTION_VI = 'description_vi';
    const DESCRIPTION_EN = 'description_en';
    const STATUS = 'status';
    const TYPE = 'type';

    //status
    const ON_SALE = 1; //Đang mở bán
    const FINISHED = 2; //Dự án đã hoàn thành
    const PENDING = 3; //Dự án đang pending
    const CLOSE_INVESTMENT = 4; //Đóng đầu tư

    //type
    const APARTMENT = 1; //chung cư,
    const VILLA = 2; //biệt thự

    public function imageProjects()
    {
        return $this->hasMany(ImageProject::class, ImageProject::REAL_ESTATE_PROJECT_ID);
    }
}
