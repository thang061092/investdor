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

    public function get_province() {
        $province = BaseRepository::getAll();
        if ($province) {
            return $province;
        }
        return false;
    }
}
