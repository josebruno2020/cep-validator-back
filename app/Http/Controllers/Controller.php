<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected $city;
    protected $cep;
    protected function responseData($data, $status=200)
    {
        return response()->json($data, $status);
    }

    protected function responseError($errorMessage)
    {
        return response()->json(['error' => $errorMessage]);
    }
}
