<?php


namespace App\Models;


class OverviewProject extends BaseModel
{
    protected $table = 'overview_project';

    //column
    const OVERVIEW_VI = "overview_vi";
    const OVERVIEW_EN = "overview_en";
    const ADDRESS_VI = "address_vi";
    const ADDRESS_EN = "address_en";
    const MARKET_VI = "market_vi";
    const MARKET_EN = "market_en";
    const BASIS_VI = "basis_vi";
    const BASIS_EN = "basis_en";
    const REAL_ESTATE_PROJECT_ID = 'real_estate_project_id';

    public function realEstateProject()
    {
        return $this->belongsTo(RealEstateProject::class, self::REAL_ESTATE_PROJECT_ID);
    }
}
