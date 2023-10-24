<?php

use App\Http\Controllers\Admin\CustomTemplateController;
use App\Http\Controllers\Admin\SlideController;
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

Route::prefix('admin')->namespace('admin')->group(function () {
    Route::post('/custom_template/create_update', [CustomTemplateController::class, 'saveUpdateData']);

    // MASTER SLIDE
    Route::group(['prefix' => 'slide'], function () {
        Route::get('datatable', [SlideController::class, 'dataTable']);
        Route::get("{id}/detail", [SlideController::class, "getDetail"]);
        Route::post('/create', [SlideController::class, 'create']);
        Route::post('/update', [SlideController::class, 'update']);
        Route::delete('/', [SlideController::class, 'destroy']);
    });
});
