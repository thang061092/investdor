<?php


namespace App\Http\Services;


use App\Http\Repositories\DetailInterestRepository;

class DetailInterestService
{
    protected $detailInterestRepository;

    public function __construct(DetailInterestRepository $detailInterestRepository)
    {
        $this->detailInterestRepository = $detailInterestRepository;
    }
}
