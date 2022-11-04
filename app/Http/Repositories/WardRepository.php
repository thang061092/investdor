<?php


namespace App\Http\Repositories;


use App\Models\Ward;

class WardRepository extends BaseRepository
{
    public function getModel()
    {
        // TODO: Implement getModel() method.
        return Ward::class;
    }

    public function get_ward() {
        $get_ward = BaseRepository::getAll();
        if ($get_ward) {
            return $get_ward;
        }
        return false;
    }

    public function get_ward_by_district($code) {
        $ward = BaseRepository::get_ward_by_district($code);
        if ($ward) {
            return $ward;
        }
        return false;
    }
}
