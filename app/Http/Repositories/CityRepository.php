<?php


namespace App\Http\Repositories;


use App\Models\City;

class CityRepository extends BaseRepository
{
    public function getModel()
    {
        // TODO: Implement getModel() method.
        return City::class;
    }
}
