<?php

use App\Http\Controllers\WorkerController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
// Route::resource('worker', WorkerController::class)->names('workers');
Route::get('index', [WorkerController::class, 'index'])->name('index');
// Route::get('/index', 'App\Http\Controllers\WorkerController@index');

// Route::prefix('worker')->group(function () {
//     Route::get('index', [WorkerController::class, 'index']);
//     Route::post('create', [WorkerController::class, 'create']);
// });
