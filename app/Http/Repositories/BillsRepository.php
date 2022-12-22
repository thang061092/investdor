<?php


namespace App\Http\Repositories;


use App\Models\Bills;
use App\Models\RealEstateProject;
use Illuminate\Support\Facades\Session;

class BillsRepository extends BaseRepository
{
    public function getModel()
    {
        // TODO: Implement getModel() method.
        return Bills::class;
    }

    public function get_bill_warning($request)
    {
        $model = $this->model;
        $model = $model->where(Bills::USER_ID, Session::get('customer')['id']);

        if (!empty($request->name_project)) {
            $name = $request->name_project;
            $model = $model->whereHas('realEstateProject', function ($query) use ($name) {
                return $query->where(RealEstateProject::NAME_VI, 'LIKE', "%$name%");
            });
        }
        $model = $model->where(Bills::STATUS, Bills::WARNING)
            ->orderBy(Bills::CREATED_AT, self::DESC)
            ->paginate(10);
        return $model;
    }

    public function get_wait_pay($request)
    {
        $model = $this->model;
        if (!empty($request->start) && !empty($request->end)) {
            $start = $request->start . ' 00:00:00';
            $end = $request->end . ' 23:59:59';
            $model = $model->whereBetween(Bills::CREATED_AT, [$start, $end]);
        }
        $model = $model
            ->whereIn(Bills::STATUS, [Bills::WARNING, Bills::PENDING])
            ->orderBy(Bills::CREATED_AT, self::DESC)
            ->paginate(30);
        return $model;
    }

    public function report_bill_by_user($request, $type_query)
    {
        $model = $this->model;
        $model = $model
            ->where(Bills::USER_ID, Session::get('customer')['id'])
            ->where(Bills::STATUS, Bills::WARNING);
        if ($type_query == 'total_money') {
            return $model->sum(Bills::AMOUNT_MONEY);
        } elseif ($type_query == 'count') {
            return $model->count();
        }
    }
}
