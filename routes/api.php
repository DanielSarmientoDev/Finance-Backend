<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HistoriesController;
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

Route::get('histories', [HistoriesController::class, 'getAllHistories']);
Route::get('history/{id}', [HistoriesController::class, 'getHistory']);
Route::post('histories', [HistoriesController::class, 'createHistory']);
Route::put('history/{id}', [HistoriesController::class, 'updateHistory']);
Route::delete('history/{id}',[HistoriesController::class, 'deleteHistory']);