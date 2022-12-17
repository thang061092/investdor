<?php


namespace App\Http\Services;


use App\Http\Repositories\ContractRepository;
use App\Http\Repositories\RealEstateProjectRepository;
use App\Models\Contract;
use App\Models\Interest;
use App\Models\RealEstateProject;
use App\Models\Transaction;
use Carbon\Carbon;

class ContractService
{
    protected $contractRepository;
    protected $interestService;
    protected $realEstateProjectRepository;

    public function __construct(ContractRepository $contractRepository,
                                InterestService $interestService,
                                RealEstateProjectRepository $realEstateProjectRepository)
    {
        $this->contractRepository = $contractRepository;
        $this->interestService = $interestService;
        $this->realEstateProjectRepository = $realEstateProjectRepository;
    }

    public function create_contract_invest($bill, $request)
    {
        $project = $this->realEstateProjectRepository->find($bill['real_estate_project_id']);
        $this->realEstateProjectRepository->update($bill['real_estate_project_id'], [
            RealEstateProject::CURRENT_PART => $project['part'] - $bill['part']
        ]);
        $interest = $project->interests()->where(Interest::STATUS, Interest::ACTIVE)->first();
        $data = [
            Contract::USER_ID => $bill['user_id'],
            Contract::CODE => random_string(12),
            Contract::INTEREST => json_encode($interest ?? ['interest' => 12, 'period' => 12]),
            Contract::AMOUNT => $bill['amount_money'],
            Contract::DATE_INIT => strtotime($request->payment_date),
            Contract::DUE_DATE => strtotime($this->periodDays($request->payment_date, $interest['period'] ?? 12)['date']),
            Contract::MONTH => $interest['period'] ?? 12,
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

    public function periodDays($start_date, $per)
    {
        $from = new \DateTime($start_date);
        $day = $from->format('j');
        $from->modify('first day of this month');
        $period = new \DatePeriod($from, new \DateInterval('P1M'), $per);
        $arr_date = [];
        foreach ($period as $date) {
            $lastDay = clone $date;
            $lastDay->modify('last day of this month');
            $date->setDate($date->format('Y'), $date->format('n'), $day);
            if ($date > $lastDay) {
                $date = $lastDay;
            }
            $arr_date[] = $date->format('Y-m-d H:i:s');
        }
        $datetime1 = new \DateTime($arr_date[$per - 1]);
        $datetime2 = new \DateTime($arr_date[$per]);
        $difference = $datetime1->diff($datetime2);
        return array('date' => $arr_date[$per], 'days' => $difference->days);
    }

    public function report_contract_by_user($request, $status)
    {
        $data = [];
        $data['total_money_invest'] = $this->contractRepository->report_contract_by_user($request, $status, 'total_money');
        $data['total_invest'] = $this->contractRepository->report_contract_by_user($request, $status, 'count');
        $data['provisional_profit'] = 0;
        $data['profit'] = 0;
        $contracts = $this->contractRepository->get_contract_by_user($request, $status);
        foreach ($contracts as $contract) {
            $data['provisional_profit'] += ($contract['amount'] * (data_get(json_decode($contract['interest'], true), 'interest') / 12) / 100) * $contract['month'];
            $data['profit'] += $contract->transactions()->where(Transaction::TYPE_METHOD, Transaction::EXPIRATION)
                ->where(Transaction::STATUS, Transaction::SUCCESS)
                ->sum(Transaction::MONEY_INTEREST);
        }

        return $data;
    }
}
