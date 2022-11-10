<?php


namespace App\Http\Repositories;


use App\Models\Bills;

class BillsRepository extends BaseRepository
{
    public function getModel()
    {
        // TODO: Implement getModel() method.
        return Bills::class;
    }
}
