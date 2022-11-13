<?php


namespace App\Http\Repositories;


use App\Models\Contract;

class ContractRepository extends BaseRepository
{
    public function getModel()
    {
        // TODO: Implement getModel() method.
        return Contract::class;
    }
}
