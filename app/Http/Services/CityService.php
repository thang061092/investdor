<?php


namespace App\Http\Services;


use App\Http\Repositories\CityRepository;
use App\Models\City;
use Illuminate\Support\Facades\Http;

class CityService
{
    protected $cityRepository;

    public function __construct(CityRepository $cityRepository)
    {
        $this->cityRepository = $cityRepository;
    }

    public function create()
    {
        $response = Http::get('https://provinces.open-api.vn/api/p/');
        if ($response->ok()) {
            $result = json_decode($response->body());
            foreach ($result as $value) {
                $city = $this->cityRepository->findOne([City::CODE => $value->code]);
                if (!$city) {
                    $this->cityRepository->create([
                        City::NAME => $value->name,
                        City::SLUG => $value->codename,
                        City::TYPE => slugify($value->division_type),
                        City::CODE => $value->code,
                        City::STATUS => City::ACTIVE,
                    ]);
                    echo $value->name . "\n";
                }
            }
        }
        return;
    }
}
