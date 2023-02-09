<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\API\StateController;
use App\Http\Controllers\API\PartyController;
use App\Http\Controllers\API\ResultController;
use App\Http\Controllers\API\CombinedController;

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

Route::get('/states/all', [StateController::class, 'all']);

Route::get('/party/all', [PartyController::class, 'parties']);

Route::get('/result/all', [ResultController::class, 'results']);

Route::get('/result/presidential', [ResultController::class, 'presidential']);

Route::get('/combined_data', [CombinedController::class, 'getCombinedData']);