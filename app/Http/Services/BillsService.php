<?php


namespace App\Http\Services;


use App\Http\Repositories\BillsRepository;

class BillsService
{
    protected $billsRepository;

    public function __construct(BillsRepository $billsRepository)
    {
        $this->billsRepository = $billsRepository;
    }
}
