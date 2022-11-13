<?php


namespace App\Http\Repositories;


use App\Models\Transaction;

class TransactionRepository extends BaseRepository
{
    public function getModel()
    {
        // TODO: Implement getModel() method.
        return Transaction::class;
    }
}
