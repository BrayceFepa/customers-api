<?php

use App\Http\Controllers\Api\V1\CustomerController;
use App\Http\Controllers\Api\V1\InvoiceController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

//api/version/endpoint (this is how we format apis)
//For Api we don't need the create or edit endpoint
// Route::group(['prefix' => 'v1', 'namespace' => 'App\Http\Controllers\Api\V1'], function(){
//  Route::resource('customers')
//});

Route::prefix('v1')->namespace('App\Http\Controllers\Api\V1')->middleware('auth:sanctum')->group(function(){
    Route::resource('customers', CustomerController::class);
    Route::resource('invoices', InvoiceController::class);

    Route::post('invoices/bulk', [InvoiceController::class, 'bulkStore']);
});


/**
{
    "admin": "1|4szPqGXyL1S3ZtpHrUzq0tjXnFI07kTkpCQCsvrK",
    "update": "2|e51xfRkwMN9KhWFK2wgYuC1fljXiVGjNYvecI3RI",
    "basic": "3|mKUtIe4FjgbDA6Iog0WKhRWklDhO10HcKSILt6o8"
}

*/