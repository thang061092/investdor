<?php


namespace App\Http\Repositories;


use App\Models\Action;

class ActionRepository extends BaseRepository
{
    public function getModel()
    {
        // TODO: Implement getModel() method.
        return Action::class;
    }
}
