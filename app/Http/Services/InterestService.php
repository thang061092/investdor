<?php


namespace App\Http\Services;


use App\Http\Repositories\DetailInterestRepository;
use App\Http\Repositories\InterestRepository;
use App\Http\Repositories\LogInterestRepository;
use App\Models\DetailInterest;
use App\Models\Interest;
use Illuminate\Support\Facades\Session;

class InterestService
{
    protected $interestRepository;
    protected $detailInterestRepository;
    protected $logInterestRepository;
    protected $logInterestService;

    public function __construct(InterestRepository $interestRepository,
                                DetailInterestRepository $detailInterestRepository,
                                LogInterestRepository $logInterestRepository,
                                LogInterestService $logInterestService)
    {
        $this->interestRepository = $interestRepository;
        $this->detailInterestRepository = $detailInterestRepository;
        $this->logInterestRepository = $logInterestRepository;
        $this->logInterestService = $logInterestService;
    }

    public function validate_create($request)
    {
        $message = [];

        if (empty($request->period)) {
            $message[] = __('validate.period_not_null');
        }

        if (empty($request->interest)) {
            $message[] = __('validate.interest_not_null');
        }
        return $message;
    }

    public function create($request)
    {
        $interest = $this->interestRepository->findOne([Interest::PERIOD => $request->period]);
        if ($interest) {
            if ($interest['status'] == Interest::ACTIVE) {
                $interest->detailInterests()->update([DetailInterest::STATUS => DetailInterest::BLOCK]);
                $detail = $this->detailInterestRepository->findOne([DetailInterest::INTEREST => $request->interest, DetailInterest::INTEREST_ID => $interest['id']]);
                if ($detail) {
                    $detail_new = $this->detailInterestRepository->update($detail['id'], [DetailInterest::STATUS => DetailInterest::ACTIVE]);
                } else {
                    $detail_new = $this->detailInterestRepository->create([
                        DetailInterest::INTEREST_ID => $interest['id'],
                        DetailInterest::INTEREST => $request->interest,
                        DetailInterest::STATUS => DetailInterest::ACTIVE,
                        DetailInterest::CREATED_BY => Session::get('employee')['email'] ?? 'superadmin',
                    ]);
                }
            }
            $this->logInterestService->create($request->all(), $detail_new, 'update');
        } else {
            $interest_new = $this->interestRepository->create([
                Interest::PERIOD => $request->period,
                Interest::CREATED_BY => Session::get('employee')['email'] ?? 'superadmin',
                Interest::STATUS => Interest::ACTIVE
            ]);
            $detail_new = $this->detailInterestRepository->create([
                DetailInterest::INTEREST_ID => $interest_new['id'],
                DetailInterest::INTEREST => $request->interest,
                DetailInterest::STATUS => DetailInterest::ACTIVE,
                DetailInterest::CREATED_BY => Session::get('employee')['email'] ?? 'superadmin',
            ]);
            $this->logInterestService->create([], $detail_new, 'create');
        }

    }
}
