<?php


namespace App\Http\Services;


use App\Http\Repositories\BillsRepository;
use App\Models\Bills;
use Illuminate\Support\Facades\Session;

class BillsService
{
    protected $billsRepository;
    protected $vietQr;
    protected $uploadService;

    public function __construct(BillsRepository $billsRepository,
                                VietQr $vietQr,
                                UploadService $uploadService)
    {
        $this->billsRepository = $billsRepository;
        $this->vietQr = $vietQr;
        $this->uploadService = $uploadService;
    }

    public function create_step1($request)
    {
        $bill = $this->billsRepository->create([
            Bills::USER_ID => Session::get('customer')['id'],
            Bills::REAL_ESTATE_PROJECT_ID => $request->project_id,
            Bills::CREATED_BY => Session::get('customer')['email'],
            Bills::STATUS => Bills::NEW,
            Bills::ORDER_CODE => date('Ymd') . random_string()
        ]);
        return $bill;
    }

    public function create_step2($request, $project, $bill_id)
    {
        $bill = $this->billsRepository->update($bill_id, [
            Bills::PART => $request->part_investment,
            Bills::VALUE_PART => $project['value_part'],
            Bills::AMOUNT_MONEY => $request->part_investment * $project['value_part']
        ]);
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
        if ($request->file) {
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
        return $bill_new;
    }
}
