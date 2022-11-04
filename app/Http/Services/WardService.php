<?php


namespace App\Http\Services;


use App\Http\Repositories\DistrictRepository;
use App\Http\Repositories\WardRepository;
use App\Models\District;
use App\Models\Ward;
use Illuminate\Support\Facades\Http;

class WardService
{
    protected $wardRepository;
    protected $districtRepository;

    public function __construct(WardRepository $wardRepository,
                                DistrictRepository $districtRepository)
    {
        $this->wardRepository = $wardRepository;
        $this->districtRepository = $districtRepository;
    }

    public function create()
    {
        $response = Http::get('https://provinces.open-api.vn/api/w/');
        if ($response->ok()) {
            $result = json_decode($response->body());
            foreach ($result as $value) {
                $ward = $this->wardRepository->findOne([Ward::CODE => $value->code]);
                if (empty($ward)) {
                    $district = $this->districtRepository->findOne([District::CODE => $value->district_code]);
                    if (!empty($district)) {
                        $this->wardRepository->create([
                            Ward::NAME => $value->name,
                            Ward::SLUG => $value->codename,
                            Ward::TYPE => slugify($value->division_type),
                            Ward::PARENT_CODE => $value->district_code,
                            Ward::DISTRICT_ID => $district['id'],
                            Ward::STATUS => District::ACTIVE,
                            Ward::CODE => $value->code
                        ]);
                        echo $value->name . "\n";
                    }
                }
            }
        }
    }
    public function get_ward() {
        $ward = $this->wardRepository->get_ward();
        if ($ward) {
            return $ward;
        }
        return false;
    }

    public function get_ward_by_district($code) {
        $ward = $this->wardRepository->get_ward_by_district($code);
        if ($ward) {
            return $ward;
        }
        return false;
    }
}
