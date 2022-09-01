<?php

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

Route::post('/employees', [App\Http\Controllers\API\EmployeesController::class, 'store'])->name('api.employees');
Route::post('/overtimes', [App\Http\Controllers\API\OvertimeController::class, 'store'])->name('api.overtimes');
Route::patch('/settings', [App\Http\Controllers\API\SettingsController::class, 'update'])->name('api.settings');
Route::get('/overtime-pays/calculate', [App\Http\Controllers\API\OvertimeController::class, 'show'])->name('api.ovetimes.calculate');
