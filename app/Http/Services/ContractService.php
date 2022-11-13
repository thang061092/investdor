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
            Contract::VALUE_PART => $bill['value_part']
        ];
        $contract = $this->contractRepository->create($data);
        return $contract;
    }
}
