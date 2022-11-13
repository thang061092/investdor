<?php


namespace App\Http\Repositories;


use App\Models\Contract;
use Illuminate\Support\Facades\Session;

class ContractRepository extends BaseRepository
{
    public function getModel()
    {
        // TODO: Implement getModel() method.
        return Contract::class;
    }

    public function get_contract_by_user($request, $status)
    {
        $model = $this->model;
        $model = $model->where(Contract::USER_ID, Session::get('customer')['id'])
            ->where(Contract::STATUS, $status)
            ->orderBy(Contract::CREATED_AT, self::DESC)
            ->paginate(10);
        return $model;
    }
}
