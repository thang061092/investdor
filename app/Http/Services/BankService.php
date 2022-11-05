<?php


namespace App\Http\Services;


use App\Http\Repositories\BankRepository;
use App\Models\Bank;
use Illuminate\Support\Facades\Http;

class BankService
{
    protected $bankRepository;

    public function __construct(BankRepository $bankRepository)
    {
        $this->bankRepository = $bankRepository;
    }

    public function create()
    {
        $response = Http::get('https://api.vietqr.io/v2/banks');
        if ($response->ok()) {
            $result = json_decode($response->body());
            foreach ($result->data as $value) {
                $bank = $this->bankRepository->findOne([Bank::CODE => $value->code]);
                if (!$bank) {
                    $this->bankRepository->create([
                        Bank::NAME => $value->name ?? '',
                        Bank::CODE => $value->code ?? "",
                        Bank::STATUS => Bank::ACTIVE,
                        Bank::BIN => $value->bin ?? "",
                        Bank::SHORTNAME => $value->shortName ?? "",
                        Bank::LOGO => $value->logo ?? "",
                        Bank::TRANSFERSUPPORTED => $value->transferSupported ?? "",
                        Bank::LOOKUPSUPPORTED => $value->lookupSupported ?? "",
                    ]);
                    echo $value->name . "\n";
                }
            }
        }
        return;
    }

    public function getAllBank() {
        $getAllBank = $this->bankRepository->getAllBank();
        if ($getAllBank) {
            return $getAllBank;
        }
        return false;
    }
}
