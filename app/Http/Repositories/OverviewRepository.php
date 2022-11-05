<?php


namespace App\Http\Repositories;


use App\Models\OverviewProject;

class OverviewRepository extends BaseRepository
{
    public function getModel()
    {
        // TODO: Implement getModel() method.
        return OverviewProject::class;
    }
}
