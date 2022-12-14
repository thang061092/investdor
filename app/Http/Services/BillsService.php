<?php


namespace App\Http\Services;


use App\Http\Repositories\BillsRepository;
use App\Models\Bills;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;

class BillsService
{
    protected $billsRepository;
    protected $vietQr;
    protected $uploadService;
    protected $contractService;
    protected $transactionService;
    protected $mailService;

    public function __construct(BillsRepository $billsRepository,
                                VietQr $vietQr,
                                UploadService $uploadService,
                                ContractService $contractService,
                                TransactionService $transactionService,
                                MailService $mailService)
    {
        $this->billsRepository = $billsRepository;
        $this->vietQr = $vietQr;
        $this->uploadService = $uploadService;
        $this->contractService = $contractService;
        $this->transactionService = $transactionService;
        $this->mailService = $mailService;
    }

    public function create_step1($request, $project)
    {
        $data = [
            Bills::USER_ID => Session::get('customer')['id'],
            Bills::REAL_ESTATE_PROJECT_ID => $request->project_id,
            Bills::CREATED_BY => Session::get('customer')['email'],
            Bills::STATUS => Bills::NEW,
            Bills::ORDER_CODE => date('Ymd') . random_string(6),
        ];
        $bill = $this->billsRepository->create($data);
        $checksum = Authorization::generateToken(['project_id' => $project['id'], 'bill_id' => $bill['id'], 'time' => Carbon::now()->addMinutes(5)->unix()]);
        $bill_new = $this->billsRepository->update($bill['id'], [Bills::CHECKSUM => $checksum]);
        return $bill_new;
    }

    public function create_step2($request, $project, $bill_id)
    {
        $part = $request->part_investment;
        $amount = $project['value_part'] * $part;
        $data = [
            Bills::PART => $request->part_investment,
            Bills::VALUE_PART => $project['value_part'],
            Bills::AMOUNT_MONEY => convert_money($amount)
        ];
//        Bills::where(Bills::ID, $bill_id)->update($data);
        $bill = $this->billsRepository->update($bill_id, $data);
        return $bill;
    }

    public function create_step3($bill_id)
    {
        $bill = $this->billsRepository->find($bill_id);
        $link = $this->vietQr->get_link($bill['amount_money'], $bill['order_code']);
        $bill_new = $this->billsRepository->update($bill_id, [
            Bills::STATUS => Bills::WARNING,
            Bills::LINK_QR => $link,
            Bills::BANK_CODE => env('BANK_CODE'),
            Bills::NAME_BANK => env('BANK_NAME'),
            Bills::BANK_ACCOUNT => env('ACCOUNT'),
            Bills::NAME_ACCOUNT_BANK => env('ACCOUNT_NAME'),
        ]);
        return $bill_new;
    }

    public function get_bill_warning($request)
    {
        $bills = $this->billsRepository->get_bill_warning($request);
        return $bills;
    }

    public function wait_pay($request)
    {
        $bills = $this->billsRepository->get_wait_pay($request);
        return $bills;
    }

    public function find($id)
    {
        return $this->billsRepository->find($id);
    }

    public function update_bill($request)
    {
        if ($request->hasFile('file')) {
            $url = $this->uploadService->upload($request);
        } else {
            $url = null;
        }
        $bill_new = $this->billsRepository->update($request->id, [
            Bills::NOTE => $request->note,
            Bills::IMAGE_LICENSE => $url,
            Bills::PAYMENT_DATE => strtotime($request->payment_date),
            Bills::STATUS => ($request->status),
        ]);

        if ($request->status == Bills::SUCCESS) {
            $contract = $this->contractService->create_contract_invest($bill_new, $request);
            if ($contract) {
                $transaction = $this->transactionService->create_transaction_invest($contract, $bill_new);
                $this->billsRepository->update($request->id, [
                    Bills::CONTRACT_ID => $contract['id'],
                    Bills::TRANSACTION_ID => $transaction['id']
                ]);
                $subject = "?????u t?? th??nh c??ng";
                $to = $contract->user->email;
                $name_to = $contract->user->full_name;
                $template = view('email.thongbaodaututhanhcong', compact('contract'))->render();
                $this->mailService->sendMail($subject, $to, $name_to, $template);
            }
        }
        return $bill_new;
    }

    public function validate_update_bill($request)
    {
        $message = [];
        if (empty($request->status)) {
            $message[] = __('validate.status_not_null');
        }

        if ($request->status == Bills::SUCCESS) {
            if (empty(check_undefined($request->file))) {
                $message[] = __('validate.file_not_null');
            } else {
                $url = $this->uploadService->upload($request);
                if (!$url) {
                    $message[] = __('validate.upload_fail');
                }
            }

            if (empty($request->payment_date)) {
                $message[] = __('validate.payment_date_not_null');
            }
        }

        if (empty($request->id)) {
            $message[] = __('validate.id_not_null');
        } else {
            $bill = $this->billsRepository->find($request->id);
            if (!$bill) {
                $message[] = __('validate.transaction_does_not_exist');
            } else {
                if ($bill['status'] == Bills::SUCCESS) {
                    $message[] = __('validate.invalid_status');
                }
            }
        }
        return $message;
    }

    public function report_bill_by_user($request)
    {
        $data = [];
        $data['total_money_invest'] = $this->billsRepository->report_bill_by_user($request, 'total_money');
        $data['total_invest'] = $this->billsRepository->report_bill_by_user($request, 'count');
        return $data;
    }

    public function validate_step2($request)
    {
        $message = [];
        if (empty($request->part_investment)) {
            $message[] = __('validate.part_investment_not_nul');
        }

        return $message;
    }
}
