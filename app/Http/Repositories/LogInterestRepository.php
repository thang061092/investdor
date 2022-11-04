<?php


namespace App\Http\Repositories;


use App\Models\LogInterest;

class LogInterestRepository extends BaseRepository
{
    public function getModel()
    {
        // TODO: Implement getModel() method.
        return LogInterest::class;
    }
}
