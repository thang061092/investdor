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

    public function get_district() {
        $district = BaseRepository::getAll();
        if ($district) {
            return $district;
        }
        return false;
    }

    public function get_district_by_province($code) {
        $district = BaseRepository::get_district_by_province($code);
        if ($district) {
            return $district;
        }
        return false;
    }
}
