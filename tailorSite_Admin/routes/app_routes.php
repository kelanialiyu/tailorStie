<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Models\Customer;

Route::middleware("auth")->group(function(){
    Route::resource('customer', CustomerController::class);
    Route::get("/customer/message/{customer}",[CustomerController::class,"message"])->name("customer.message");
});
