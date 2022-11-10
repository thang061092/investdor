<?php


namespace App\Http\Repositories;


use App\Models\District;

class DistrictRepository extends BaseRepository
{
    public function getModel()
    {
        // TODO: Implement getModel() method.
        return District::class;
    }
}
