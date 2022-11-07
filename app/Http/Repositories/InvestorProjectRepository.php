<?php


namespace App\Http\Repositories;


use App\Models\InvestorProject;

class InvestorProjectRepository extends BaseRepository
{
    public function getModel()
    {
        // TODO: Implement getModel() method.
        return InvestorProject::class;
    }
}
