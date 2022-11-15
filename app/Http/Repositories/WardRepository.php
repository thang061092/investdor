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
}
