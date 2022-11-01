<?php


namespace App\Http\Repositories;


use App\Models\Logs;

class LogsRepository extends BaseRepository
{
    public function getModel()
    {
        // TODO: Implement getModel() method.
        return Logs::class;
    }
}
