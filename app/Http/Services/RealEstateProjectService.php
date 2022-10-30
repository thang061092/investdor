<?php


namespace App\Http\Services;


use App\Http\Repositories\RealEstateProjectRepository;

class RealEstateProjectService
{
    protected $estateProjectRepository;

    public function __construct(RealEstateProjectRepository $estateProjectRepository)
    {
        $this->estateProjectRepository = $estateProjectRepository;
    }
}
