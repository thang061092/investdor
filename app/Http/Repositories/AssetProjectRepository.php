<?php


namespace App\Http\Repositories;


use App\Models\AssetProject;

class AssetProjectRepository extends BaseRepository
{
    public function getModel()
    {
        // TODO: Implement getModel() method.
        return AssetProject::class;
    }
}
