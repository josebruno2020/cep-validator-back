<?php

namespace App\Http\Controllers;

use App\Http\Requests\CepRequest;
use App\Models\Cep;
use App\Models\City;
use App\Services\CepServices;
use App\Services\CityServices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class CepController extends Controller
{
    public function __construct(Cep $cep, City $city)
    {
        $this->cep = $cep;
        $this->city = $city;
    }


    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        try {
            $ceps = DB::table('ceps', 'cep')->select('cep.id', 'cep.cep', 'city.name as city')
                ->join('cities as city', 'cep.city_id', '=', 'city.id')
                ->paginate(10);
            return $this->responseData($ceps);
        } catch (\Exception $e) {
            return $this->responseError($e->getMessage());
        }
    }


    /**
     * @param CepRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function insert(CepRequest $request, CityServices $cityServices)
    {
        try {
            $data = $request->validated();
            if($data['city']) {
                $city = $cityServices->storeCity($data['city']);
                $data['city_id'] = $city->id;
                $cep = $this->cep->create($data);

            } else {
                $cep = $this->cep->create($data);
            }

            return $this->responseData($cep, Response::HTTP_CREATED);

        } catch (\Exception $e) {
            return $this->responseError($e->getMessage());
        }
    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        try {
            $cep = $this->cep->find($id);
            $cep->delete();
            $data['message'] = 'Cep Removido com sucesso!';
            return $this->responseData($data);
        } catch (\Exception $e) {
            return $this->responseError($e->getMessage());
        }
    }
}
