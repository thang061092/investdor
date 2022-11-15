<?php


namespace App\Http\Services;


use App\Http\Repositories\MemberCompanyRepository;

class MemberCompanyService
{
    protected $memberCompanyRepository;

    public function __construct(MemberCompanyRepository $memberCompanyRepository)
    {
        $this->memberCompanyRepository = $memberCompanyRepository;
    }
}
