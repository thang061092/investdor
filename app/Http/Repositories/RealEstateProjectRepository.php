<?php


namespace App\Http\Repositories;


use App\Models\RealEstateProject;

class RealEstateProjectRepository extends BaseRepository
{
    public function getModel()
    {
        // TODO: Implement getModel() method.
        return RealEstateProject::class;
    }
}
