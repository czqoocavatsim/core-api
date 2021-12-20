<?php

use App\Http\Controllers\Membership\UserAccountController;
use App\Http\Controllers\Network\VatsimLogonPositionsController;
use App\Http\Controllers\VatsimControllerSessionsController;
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

Route::prefix('network')->name('network.')->group(function () {

    Route::prefix('position')->name('position')->group(function () {
        Route::get('/all', [VatsimLogonPositionsController::class, 'getAll']);
        Route::get('/types', [VatsimLogonPositionsController::class, 'getAllPositionTypes'])->name('.types');
        Route::get('/{vatsimLogonPosition}', [VatsimLogonPositionsController::class, 'getPosition'])->name('.get');
        Route::get('/{vatsimLogonPosition}/sessions', [VatsimLogonPositionsController::class, 'getSessionsForPosition'])->name('.sessions');
    });

    Route::prefix('session')->name('session')->group(function () {
        Route::get('/{vatsimControllerSession:id}', [VatsimControllerSessionsController::class, 'getSession'])->name('.get');
    });

    Route::prefix('controllers')->name('controllers')->group(function () {
        Route::get('/{cid}/sessions', [VatsimControllerSessionsController::class, 'getSessionsForController'])->name('.sessions');
    });

    Route::get('/online', [VatsimControllerSessionsController::class, 'getActiveSessions'])->name('.online');
});
