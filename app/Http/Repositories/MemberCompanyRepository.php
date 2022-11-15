<?php


namespace App\Http\Repositories;


use App\Models\MemberCompany;

class MemberCompanyRepository extends BaseRepository
{
    public function getModel()
    {
        // TODO: Implement getModel() method.
        return MemberCompany::class;
    }
}
