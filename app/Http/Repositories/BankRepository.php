<?php


namespace App\Http\Repositories;


use App\Models\Bank;

class BankRepository extends BaseRepository
{
    public function getModel()
    {
        // TODO: Implement getModel() method.
        return Bank::class;
    }

    public function getAllBank() {
        $bank = BaseRepository::getAll();
        if ($bank) {
            return $bank;
        }
        return false;
    }
}
