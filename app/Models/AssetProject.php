<?php


namespace App\Models;


class AssetProject extends BaseModel
{
    protected $table = 'asset_project';

    //column
    const YEAR_BUILT = "year_built";
    const TOTAL_BUILDING_AREA = "total_building_area";
    const NRSF = "nrsf";
    const EXPECTED_CAPACITY = "expected_capacity";
    const TARGET_TABLE = "target_table";
    const CURRENT_PRICE = "current_price";
    const PROJECT_HIGHLIGHTS_VI = "project_highlights_vi";
    const PROJECT_HIGHLIGHTS_EN = "project_highlights_en";
    const LONGITUDE = "longitude";
    const LATITUDE = "latitude";
    const REAL_ESTATE_PROJECT_ID = 'real_estate_project_id';

    public function realEstateProject()
    {
        return $this->belongsTo(RealEstateProject::class, self::REAL_ESTATE_PROJECT_ID);
    }
}
