<?php


namespace App\Http\Repositories;


use App\Models\Contract;
use App\Models\RealEstateProject;
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
        if (!empty($request->name_project)) {
            $name = $request->name_project;
            $model = $model->whereHas('realEstateProject', function ($query) use ($name) {
                return $query->where(RealEstateProject::NAME_VI, 'LIKE', "%$name%");
            });
        }
        $model = $model->orderBy(Contract::CREATED_AT, self::DESC)
            ->paginate(10);
        return $model;
    }

    public function get_list($request)
    {
        $query = DB::table('contract');
        if (!empty($request->start) && !empty($request->end)) {
            $start = $request->start . ' 00:00:00';
            $end = $request->end . ' 23:59:59';
            $query = $query->whereBetween('contract.date_init', [strtotime($start), strtotime($end)]);
        }
        $query = $query->join('users', 'users.id', '=', 'contract.user_id')
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

        if (!empty($request->name_project)) {
            $name = $request->name_project;
            $model = $model->whereHas('realEstateProject', function ($query) use ($name) {
                return $query->where(RealEstateProject::NAME_VI, 'LIKE', "%$name%");
            });
        }
        if ($type_query == 'total_money') {
            return $model->sum(Contract::AMOUNT);
        } elseif ($type_query == 'count') {
            return $model->count();
        }
    }
}
