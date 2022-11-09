<?php


namespace App\Http\Services;


use App\Http\Repositories\CityRepository;
use App\Http\Repositories\DistrictRepository;
use App\Models\City;
use App\Models\District;
use Illuminate\Support\Facades\Http;

class DistrictService
{
    protected $districtRepository;
    protected $cityRepository;

    public function __construct(DistrictRepository $districtRepository,
                                CityRepository $cityRepository)
    {
        $this->districtRepository = $districtRepository;
        $this->cityRepository = $cityRepository;
    }

    public function create()
    {
        $response = Http::get('https://provinces.open-api.vn/api/d/');
        if ($response->ok()) {
            $result = json_decode($response->body());
            foreach ($result as $value) {
                $district = $this->districtRepository->findOne([District::CODE => $value->code]);
                if (!$district) {
                    $city = $this->cityRepository->findOne([City::CODE => $value->province_code]);
                    if ($city) {
                        $this->districtRepository->create([
                            District::NAME => $value->name,
                            District::SLUG => $value->codename,
                            District::TYPE => slugify($value->division_type),
                            District::PARENT_CODE => $value->province_code,
                            District::CITY_ID => $city['id'],
                            District::STATUS => District::ACTIVE,
                            District::CODE => $value->code
                        ]);
                    }
                    echo $value->name . "\n";
                }
            }
        }
        return;
    }

    public function district($request)
    {
        return $this->districtRepository->findMany(['parent_code' => $request->code]);
    }

    public function get_district() {
        $district = $this->districtRepository->get_district();
        if ($district) {
            return $district;
        }
        return false;
    }

    public function get_district_by_province($code) {
        $district = $this->districtRepository->get_district_by_province($code);
        if ($district) {
            return $district;
        }
        return false;
    }
}
