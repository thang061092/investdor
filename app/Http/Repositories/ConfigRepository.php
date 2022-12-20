<?php


namespace App\Http\Repositories;


use App\Models\Config;

class ConfigRepository extends BaseRepository
{
    public function getModel()
    {
        // TODO: Implement getModel() method.
        return Config::class;
    }
}
