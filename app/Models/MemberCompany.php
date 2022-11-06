<?php


namespace App\Models;


class MemberCompany extends BaseModel
{
    protected $table = 'member_company';

    //column
    const NAME_MEMBER = "name_member";
    const AVATAR_MEMBER = "avatar_member";
    const POSITION_MEMBER_VI = "position_member_vi";
    const POSITION_MEMBER_EN = "position_member_en";
    const INVESTOR_PROJECT_ID = 'investor_project_id';

    public function investorProject()
    {
        return $this->belongsTo(InvestorProject::class, self::INVESTOR_PROJECT_ID);
    }
}
