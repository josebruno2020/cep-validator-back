<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{CityController, CepController, LoginController};

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('teste', function () {
    return response()->json([]);
});

Route::post('login', [LoginController::class, 'login']);
Route::post('register', [LoginController::class, 'register']);

Route::group(['middleware' => 'auth:api'], function () {
    Route::group(['prefix' => 'cities', 'as' => 'cities.'], function () {
        Route::get('', [CityController::class, 'index'])->name('index');
        Route::post('', [CityController::class, 'insert'])->name('insert');
    });

    Route::group(['prefix' => 'ceps', 'as' => 'ceps.'], function () {
        Route::get('', [CepController::class, 'index'])->name('index');
        Route::post('', [CepController::class, 'insert'])->name('insert');

        Route::delete('/{id}', [CepController::class, 'destroy'])->name('destroy');
    });
});

