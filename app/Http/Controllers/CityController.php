<?php

namespace App\Http\Controllers;

use App\Http\Requests\CityRequest;
use App\Models\Cep;
use App\Models\City;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CityController extends Controller
{
    public function __construct(City $city, Cep $cep)
    {
        $this->city = $city;
        $this->cep = $cep;
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        try {
            $cities = $this->city->paginate(10);
            return $this->responseData($cities);
        } catch (\Exception $e) {
            return $this->responseError($e->getMessage());
        }

    }

    /**
     * @param CityRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function insert(CityRequest $request)
    {
        try {
            $data = $request->validated();
            $city = $this->city->create($data);
            return $this->responseData($city,Response::HTTP_CREATED);

        } catch (\Exception $e) {
            return $this->responseError($e->getMessage());
        }
    }
}
