<?php


namespace App\Http\Services;


use App\Http\Repositories\ContractRepository;
use App\Models\Contract;
use Carbon\Carbon;

class ContractService
{
    protected $contractRepository;
    protected $interestService;

    public function __construct(ContractRepository $contractRepository,
                                InterestService $interestService)
    {
        $this->contractRepository = $contractRepository;
        $this->interestService = $interestService;
    }

    public function create_contract_invest($bill)
    {
        $interest = $this->interestService->get_current_interest();
        $data = [
            Contract::USER_ID => $bill['user_id'],
            Contract::CODE => random_string(12),
            Contract::INTEREST => json_encode($interest),
            Contract::AMOUNT => $bill['amount_money'],
            Contract::DATE_INIT => $bill['payment_date'],
            Contract::DUE_DATE => Carbon::parse(date('Y-m-d H:i:s', $bill['payment_date']))->addMonths(12)->unix(),
            Contract::MONTH => 12,
            Contract::INTEREST_ID => $interest['id'],
            Contract::STATUS => Contract::EFFECT,
            Contract::PART => $bill['part'],
            Contract::VALUE_PART => $bill['value_part'],
            Contract::REAL_ESTATE_PROJECT_ID => $bill['real_estate_project_id']
        ];
        $contract = $this->contractRepository->create($data);
        return $contract;
    }

    public function get_contract_by_user($request, $status)
    {
        return $this->contractRepository->get_contract_by_user($request, $status);
    }

    public function get_list($request)
    {
        $contracts = $this->contractRepository->get_list($request);
        return $contracts;
    }

    public function find($id)
    {
        return $this->contractRepository->find($id);
    }
}
