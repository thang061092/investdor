<?php


namespace App\Http\Repositories;


use App\Models\Transaction;
use Illuminate\Support\Facades\DB;

class TransactionRepository extends BaseRepository
{
    public function getModel()
    {
        // TODO: Implement getModel() method.
        return Transaction::class;
    }

    public function get_list($request)
    {
        $query = DB::table('transaction');
        if (!empty($request->start) && !empty($request->end)) {
            $start = $request->start . ' 00:00:00';
            $end = $request->end . ' 23:59:59';
            $query = $query->whereBetween('transaction.created_at', [$start, $end]);
        }
        $query = $query
            ->join('contract', 'contract.id', '=', 'transaction.contract_id')
            ->join('users', 'users.id', '=', 'contract.user_id')
            ->join('real_estate_project', 'contract.real_estate_project_id', '=', 'real_estate_project.id')
            ->select('transaction.*', 'users.full_name as user_full_name', 'real_estate_project.name_vi as project_name_vi');
        if ($request->type_query == 'get') {
            return $query->orderBy('transaction.created_at', 'DESC')
                ->paginate(30);
        } elseif ($request->type == 'count') {
            return $query->count();
        } else {
            return $query->get();
        }
    }
}
