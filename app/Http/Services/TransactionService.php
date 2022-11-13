<?php


namespace App\Http\Services;


use App\Http\Repositories\TransactionRepository;
use App\Models\Transaction;

class TransactionService
{
    protected $transactionRepository;

    public function __construct(TransactionRepository $transactionRepository)
    {
        $this->transactionRepository = $transactionRepository;
    }

    public function create_transaction_invest($contract, $bill)
    {
        $data = [
            Transaction::CONTRACT_ID => $contract['id'],
            Transaction::TYPE_METHOD => Transaction::INVESTMENT,
            Transaction::CODE => $bill['order_code'],
            Transaction::AMOUNT => $contract['amount'],
            Transaction::STATUS => Transaction::SUCCESS,
            Transaction::INTEREST => $contract['interest'],
            Transaction::PRINCIPAL => $contract['amount'],
            Transaction::TOTAL_PRINCIPAL_INTEREST => $contract['amount'],
            Transaction::BILLS_ID => $bill['id'],
            Transaction::DATE_PAY => $bill['payment_date'],
            Transaction::IMAGE => $bill['image_license'],
        ];
        return $this->transactionRepository->create($data);
    }
}
