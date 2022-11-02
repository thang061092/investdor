<?php


namespace App\Http\Repositories;


use App\Models\DetailInterest;

class DetailInterestRepository extends BaseRepository
{
    public function getModel()
    {
        // TODO: Implement getModel() method.
        return DetailInterest::class;
    }
}
