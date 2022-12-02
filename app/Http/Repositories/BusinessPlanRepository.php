<?php


namespace App\Http\Repositories;


use App\Models\BusinessPlane;

class BusinessPlanRepository extends BaseRepository
{
    public function getModel()
    {
        // TODO: Implement getModel() method.
        return BusinessPlane::class;
    }
}
