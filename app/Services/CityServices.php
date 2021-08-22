<?php

namespace App\Services;

use App\Models\City;

class CityServices {

    protected $city;
    public function __construct(City $city)
    {
        $this->city = $city;
    }

    public function storeCity(string $name)
    {
        $data['name'] = $name;
        return $this->city->create($data);
    }

}
