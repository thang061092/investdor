<?php


namespace App\Models;


class InvestorProject extends BaseModel
{
    protected $table = 'investor_project';

    //column
    const NAME_COMPANY_VI = "name_company_vi";
    const NAME_COMPANY_EN = "name_company_en";
    const ADDRESS_VI = "address_vi";
    const ADDRESS_EN = "address_en";
    const DESCRIPTION_VI = "description_vi";
    const DESCRIPTION_EN = "description_en";
    const REAL_ESTATE_PROJECT_ID = "real_estate_project_id";

    public function realEstateProject()
    {
        return $this->belongsTo(RealEstateProject::class, self::REAL_ESTATE_PROJECT_ID);
    }

    public function memberCompanies()
    {
        return $this->hasMany(MemberCompany::class, MemberCompany::INVESTOR_PROJECT_ID);
    }
}
