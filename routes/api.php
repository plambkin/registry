<?php

use App\Http\Controllers\RecordController;
use App\Http\Controllers\QualificationController;

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

Route::get('/record/',[RecordController::class,'getRecord']);

Route::get('/qualification/',[QualificationController::class,'getRecord']);

Route::get('/click',[RecordController::class,'updateClicks']);


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
