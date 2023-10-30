<?php

use App\Http\Controllers\Admin\CustomTemplateController;
use App\Http\Controllers\Admin\HallController;
use App\Http\Controllers\Admin\InfographicController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\PortalDataController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\SlideController;
use App\Http\Controllers\AuthController;
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

Route::middleware("auth:sanctum")->get("/user", function (Request $request) {
    return $request->user();
});

// AUTH
Route::group(["middleware" => "guest"], function () {
    Route::post("/auth/register", [AuthController::class, "register"]);
    Route::post("/auth/login", [AuthController::class, "validateLogin"]);
});

Route::prefix("admin")->namespace("admin")->middleware("check.auth")->group(function () {
    Route::post("/custom_template/create_update", [CustomTemplateController::class, "saveUpdateData"]);

    // HALL
    Route::group(["prefix" => "hall"], function () {
        Route::get("datatable", [HallController::class, "datatable"]);
        Route::get("{id}/detail", [HallController::class, "getDetail"]);
        Route::post("/create", [HallController::class, "create"]);
        Route::post("/update", [HallController::class, "update"]);
        Route::delete("/", [HallController::class, "destroy"]);
    });

    // SLIDE
    Route::group(["prefix" => "slide"], function () {
        Route::get("datatable", [SlideController::class, "dataTable"]);
        Route::get("{id}/detail", [SlideController::class, "getDetail"]);
        Route::post("/create", [SlideController::class, "create"]);
        Route::post("/update", [SlideController::class, "update"]);
        Route::post("/update-status", [SlideController::class, "updateStatus"]);
        Route::delete("/", [SlideController::class, "destroy"]);
    });

    // POST/NEWS
    Route::group(["prefix" => "news"], function () {
        Route::get("datatable", [PostController::class, "dataTable"]);
        Route::get("{id}/detail", [PostController::class, "getDetail"]);
        Route::post("/create", [PostController::class, "create"]);
        Route::post("/update", [PostController::class, "update"]);
        Route::post("/update-status", [PostController::class, "updateStatus"]);
        Route::delete("/", [PostController::class, "destroy"]);
    });

    // PAGE/HOME ANGGARAN
    Route::group(["prefix" => "pages"], function () {
        Route::get("datatable", [PageController::class, "dataTable"]);
        Route::get("{id}/detail", [PageController::class, "getDetail"]);
        Route::post("/create", [PageController::class, "create"]);
        Route::post("/update", [PageController::class, "update"]);
        Route::post("/update-status", [PageController::class, "updateStatus"]);
        Route::delete("/", [PageController::class, "destroy"]);
    });

    // INFOGRAPHIC
    Route::group(["prefix" => "infographic"], function () {
        Route::get("list", [InfographicController::class, "list"]);
        Route::post("create", [InfographicController::class, "create"]);
        Route::delete('/', [InfographicController::class, 'destroy']);
    });

    // PORTAL DATA
    Route::group(["prefix" => "portal-data"], function () {
        Route::get("datatable", [PortalDataController::class, "dataTable"]);
        Route::get("{id}/detail", [PortalDataController::class, "getDetail"]);
        Route::post("/create", [PortalDataController::class, "create"]);
        Route::post("/update", [PortalDataController::class, "update"]);
        Route::post("/update-status", [PortalDataController::class, "updateStatus"]);
        Route::delete("/", [PortalDataController::class, "destroy"]);
    });
});
