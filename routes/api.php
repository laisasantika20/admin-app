<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\Auth\AuthController;
use App\Http\Controllers\API\Tugas\TugasController;

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
// Route::post('register','Api\Auth\AuthController@register');
// Route::post('login','Api\Auth\AuthController@login');

Route::post('/register',[AuthController::class, 'register'])->name('users.register');
Route::post('/login',[AuthController::class, 'login'])->name('users.login');

//prefix barang
Route::group(['prefix' => 'barang'], function(){
    Route::group(['middleware' => 'auth:api'], function(){
        Route::get('getAll', [TugasController::class, 'getAll']);
        Route::post('tambah', [TugasController::class, 'store']);
        Route::post('update', [TugasController::class, 'update']);
        Route::post('destroy', [TugasController::class, 'destroy']);
    });
});