<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;

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
Route::post("/customer/size/{customer}",[CustomerController::class,"addSize"])->name("customer.size.store");
Route::post("/customer/size/edit/{size}",[CustomerController::class,"editSize"])->name("customer.size.update");
Route::post("/customer/{customer}/size/delete/{size}",[CustomerController::class,"deleteSize"])->name("customer.size.delete");
Route::middleware("auth")->group(function(){

});
