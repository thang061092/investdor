<?php


namespace App\Http\Repositories;


use App\Models\Contract;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class ContractRepository extends BaseRepository
{
    public function getModel()
    {
        // TODO: Implement getModel() method.
        return Contract::class;
    }

    public function get_contract_by_user($request, $status = '')
    {
        $model = $this->model;
        $model = $model->where(Contract::USER_ID, Session::get('customer')['id']);
        if (!empty($status)) {
            $model = $model->where(Contract::STATUS, $status);
        }

        $model = $model->orderBy(Contract::CREATED_AT, self::DESC)
            ->paginate(10);
        return $model;
    }

    public function get_list($request)
    {
        $query = DB::table('contract')
            ->join('users', 'users.id', '=', 'contract.user_id')
            ->join('real_estate_project', 'contract.real_estate_project_id', '=', 'real_estate_project.id')
            ->select('contract.*', 'users.full_name as user_full_name', 'real_estate_project.name_vi as project_name_vi');
        if ($request->type_query == 'get') {
            return $query->orderBy('contract.created_at')
                ->paginate(30);
        } elseif ($request->type == 'count') {
            return $query->count();
        } else {
            return $query->get();
        }
    }

    public function report_contract_by_user($request, $status, $type_query)
    {
        $model = $this->model;
        $model = $model->where(Contract::USER_ID, Session::get('customer')['id'])
            ->where(Contract::STATUS, $status);

        if ($type_query == 'total_money') {
            return $model->sum(Contract::AMOUNT);
        } elseif ($type_query == 'count') {
            return $model->count();
        }
    }
}
