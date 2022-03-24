<?php

use Illuminate\Http\Request;
use App\Http\Controllers\DummyApi;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

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
//Route::resource('authors',AuthController::class);
//Route::post('data',[DummyApi::class,'getData']);
//Route::put('update',[DummyApi::class,'update']);
//Route::delete('delete/{id}',[DummyApi::class,'delete']);
//Route::get('search/{name}',[AuthController::class,'search']);