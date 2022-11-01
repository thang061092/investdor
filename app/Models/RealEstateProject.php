<?php


namespace App\Models;


class RealEstateProject extends BaseModel
{
    protected $table = 'real_estate_project';

    //column
    const NAME_VI = 'name_vi';
    const NAME_EN = 'name_en';
    const SLUG_VI = 'slug_vi';
    const SLUG_EN = 'slug_en';
    const CITY = 'city';
    const DISTRICT = 'district';
    const WARD = 'ward';
    const ADDRESS_VI = 'address_vi';
    const ADDRESS_EN = 'address_en';
    const IMAGE = 'image';
    const TOTAL_VALUE = 'total_value';
    const PART = 'part';
    const VALUE_PART = 'value_part';
    const DESCRIPTION_VI = 'description_vi';
    const DESCRIPTION_EN = 'description_en';
    const STATUS = 'status';
    const TYPE = 'type';

    //status
    const NEW = 0; //nháp
    const ON_SALE = 1; //Đang mở bán
    const FINISHED = 2; //Dự án đã hoàn thành
    const PENDING = 3; //Dự án đang pending
    const CLOSE_INVESTMENT = 4; //Đóng đầu tư

    //type
    const APARTMENT = 1; //chung cư,
    const VILLA = 2; //biệt thự
    const RESIDENTIAL = 3; // Khu dân cư

    public function imageProjects()
    {
        return $this->hasMany(ImageProject::class, ImageProject::REAL_ESTATE_PROJECT_ID);
    }

    public function investorProject()
    {
        return $this->hasOne(InvestorProject::class, InvestorProject::REAL_ESTATE_PROJECT_ID);
    }

    public function assetProject()
    {
        return $this->hasOne(AssetProject::class, AssetProject::REAL_ESTATE_PROJECT_ID);
    }

    public function overviewProject()
    {
        return $this->hasOne(OverviewProject::class, OverviewProject::REAL_ESTATE_PROJECT_ID);
    }

    public function documentProject()
    {
        return $this->hasOne(DocumentProject::class, DocumentProject::REAL_ESTATE_PROJECT_ID);
    }

    public function businessPlane()
    {
        return $this->hasOne(BusinessPlane::class, BusinessPlane::REAL_ESTATE_PROJECT_ID);
    }
}
