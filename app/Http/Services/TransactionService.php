<?php


namespace App\Http\Services;


use App\Http\Repositories\ContractRepository;
use App\Http\Repositories\TransactionRepository;
use App\Models\Contract;
use App\Models\Transaction;
use Illuminate\Support\Facades\Session;

class TransactionService
{
    protected $transactionRepository;
    protected $uploadService;
    protected $contractRepository;

    public function __construct(TransactionRepository $transactionRepository,
                                UploadService $uploadService,
                                ContractRepository $contractRepository)
    {
        $this->transactionRepository = $transactionRepository;
        $this->uploadService = $uploadService;
        $this->contractRepository = $contractRepository;
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

    public function get_list($request)
    {
        $contracts = $this->transactionRepository->get_list($request);
        return $contracts;
    }

    public function validate_payment_contract($request)
    {
        $message = [];
        if (empty($request->principal)) {
            $message[] = __('validate.principal_not_null');
        }
        if (empty($request->money_interest)) {
            $message[] = __('validate.money_interest_not_null');
        }
        if (empty($request->payment_date)) {
            $message[] = __('validate.payment_date_not_null');
        }

        if (!$request->hasFile('file')) {
            $message[] = __('validate.payment_vouchers_not_null');
        } else {
            $url = $this->uploadService->upload_param($request->file);
            if (!$url) {
                $message[] = __('validate.upload_fail');
            }
        }

        if (empty($request->id)) {
            $message[] = __('validate.id_not_null');
        } else {
            $contract = $this->contractRepository->find($request->id);
            if (!$contract) {
                $message[] = __('validate.transaction_does_not_exist');
            } else {
                if ($contract['status'] == Contract::EXPIRE) {
                    $message[] = __('validate.invalid_status');
                }
            }
        }
        return $message;
    }

    public function payment_contract($request)
    {
        if ($request->file) {
            $url = $this->uploadService->upload_param($request->file);
        } else {
            $url = null;
        }
        $contract = $this->contractRepository->update($request->id, [
            Contract::STATUS => Contract::EXPIRE,
            Contract::EXPIRE_DATE => strtotime($request->payment_date)
        ]);
        $principal = trim(str_replace(array(',', '.',), '', $request->principal));
        $money_interest = trim(str_replace(array(',', '.',), '', $request->money_interest));
        $total = convert_money((int)$principal + (int)$money_interest);
        $transaction = $this->transactionRepository->create(
            [
                Transaction::CONTRACT_ID => $request->id,
                Transaction::PRINCIPAL => $principal,
                Transaction::MONEY_INTEREST => $money_interest,
                Transaction::TOTAL_PRINCIPAL_INTEREST => $total,
                Transaction::AMOUNT => $total,
                Transaction::CODE => date('Ymd') . random_string(6),
                Transaction::DATE_PAY => strtotime($request->payment_date),
                Transaction::INTEREST => $contract['interest'],
                Transaction::TYPE_METHOD => Transaction::EXPIRATION,
                Transaction::STATUS => Transaction::SUCCESS,
                Transaction::IMAGE => $url,
                Transaction::CREATED_BY => Session::get('employee')['email']
            ]
        );
        return $transaction;
    }
}
