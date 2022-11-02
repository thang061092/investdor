<?php


namespace App\Http\Repositories;


use App\Models\Interest;

class InterestRepository extends BaseRepository
{
    public function getModel()
    {
        // TODO: Implement getModel() method.
        return Interest::class;
    }
}
