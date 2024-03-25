<?php

use App\Http\Controllers\Api\VertualController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('paylony', [VertualController::class, 'run2'])->name('paylony');
Route::post('run1', [VertualController::class, 'run1'])->name('run1');
Route::post('run', [VertualController::class, 'run'])->name('run');
Route::post('web', [VertualController::class, 'honor'])->name('web');
