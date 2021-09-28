<?php

use App\Http\Controllers\Membership\UserAccountController;
use App\Http\Controllers\Network\VatsimLogonPositionsController;
use App\Models\Network\VatsimLogonPosition;
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

Route::middleware('auth:sanctum')->get('/useraccounts', [UserAccountController::class, 'getAllUserAccounts']);

Route::prefix('network')->name('network.')->group(function () {

    Route::prefix('position')->name('position')->group(function () {
        Route::get('/all', [VatsimLogonPositionsController::class, 'getAll']);
        Route::get('/{vatsimLogonPosition:callsign}/sessions', [VatsimLogonPositionsController::class, 'getSessionsForPosition'])->name('sessions');
    });

});
