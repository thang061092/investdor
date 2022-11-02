<?php


namespace App\Http\Services;


use App\Http\Repositories\LogInterestRepository;
use App\Models\LogInterest;
use Illuminate\Support\Facades\Session;

class LogInterestService
{
    protected $logInterestRepository;

    public function __construct(LogInterestRepository $logInterestRepository)
    {
        $this->logInterestRepository = $logInterestRepository;
    }

    public function create($old, $new, $type)
    {
        $data = [
            LogInterest::OLD => json_encode($old),
            LogInterest::NEW => json_encode($new),
            LogInterest::TYPE => $type,
            LogInterest::INTEREST_ID => $new['id'],
            LogInterest::CREATED_BY => Session::get('employee')['email'] ?? 'superadmin'
        ];
        $this->logInterestRepository->create($data);
    }
}
