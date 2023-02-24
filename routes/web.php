<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ResultController;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', function() {
    return view('index');
});

Route::get('/login', function() {
    return view('admin/login');
})->name('login');

Route::post('/auth/login', [AuthController::class, 'login']);

Route::group([
    'prefix' => 'admin',
    'middleware' => ['auth']
], function () {
    Route::get('/', function() {
        return view('admin/index');
    });
    Route::get('/states', function() {
        return view('admin/states');
    });

    Route::post('/result/save', [ResultController::class, 'save']);
});
