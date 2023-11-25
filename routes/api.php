<?php

use App\Http\Controllers\Admin\AgendaController;
use App\Http\Controllers\Admin\CountInformationController;
use App\Http\Controllers\Admin\CustomTemplateController;
use App\Http\Controllers\Admin\DownloadController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\HallController;
use App\Http\Controllers\Admin\ImageGalleryController;
use App\Http\Controllers\Admin\InfographicController;
use App\Http\Controllers\Admin\LinkController;
use App\Http\Controllers\Admin\OfficialPpidProfileController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\PortalDataController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\RegulationController;
use App\Http\Controllers\Admin\RegulationFileController;
use App\Http\Controllers\Admin\ReviewController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\SlideController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\VideoController;
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

    // COUNT INFORMATION
    Route::group(["prefix" => "count-information"], function () {
        Route::get("/detail", [CountInformationController::class, 'getDetail']);
        Route::post("/create-update", [CountInformationController::class, 'createAndUpdate']);
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

    // OFFICIAL PPID PROFILE / PEJABAT PPID
    Route::group(["prefix" => "official-ppid"], function () {
        Route::get("datatable", [OfficialPpidProfileController::class, "dataTable"]);
        Route::get("{id}/detail", [OfficialPpidProfileController::class, "getDetail"]);
        Route::post("/create", [OfficialPpidProfileController::class, "create"]);
        Route::post("/update", [OfficialPpidProfileController::class, "update"]);
        Route::delete("/", [OfficialPpidProfileController::class, "destroy"]);
    });

    // GALLERY
    Route::group(["prefix" => "gallery"], function () {
        Route::get("datatable", [GalleryController::class, "dataTable"]);
        Route::get("{id}/detail", [GalleryController::class, "getDetail"]);
        Route::post("/create", [GalleryController::class, "create"]);
        Route::post("/update", [GalleryController::class, "update"]);
        Route::delete("/", [GalleryController::class, "destroy"]);
    });

    // IMAGE GALLERY
    Route::group(["prefix" => "image-gallery"], function () {
        Route::get("{gallery_id}/list", [ImageGalleryController::class, "list"]);
        Route::post("create", [ImageGalleryController::class, "create"]);
        Route::delete('/', [ImageGalleryController::class, 'destroy']);
    });

    // VIDEO
    Route::group(["prefix" => "video"], function () {
        Route::get("datatable", [VideoController::class, "dataTable"]);
        Route::get("{id}/detail", [VideoController::class, "getDetail"]);
        Route::post("/create", [VideoController::class, "create"]);
        Route::post("/update", [VideoController::class, "update"]);
        Route::delete("/", [VideoController::class, "destroy"]);
    });

    // AGENDA
    Route::group(["prefix" => "agenda"], function () {
        Route::get("datatable", [AgendaController::class, "dataTable"]);
        Route::get("{id}/detail", [AgendaController::class, "getDetail"]);
        Route::post("/create", [AgendaController::class, "create"]);
        Route::post("/update", [AgendaController::class, "update"]);
        Route::delete("/", [AgendaController::class, "destroy"]);
    });

    // DOWNLOAD
    Route::group(["prefix" => "download"], function () {
        Route::get("datatable", [DownloadController::class, "dataTable"]);
        Route::get("{id}/detail", [DownloadController::class, "getDetail"]);
        Route::post("/create", [DownloadController::class, "create"]);
        Route::post("/update", [DownloadController::class, "update"]);
        Route::delete("/", [DownloadController::class, "destroy"]);
    });

    // REGULATION
    Route::group(["prefix" => "regulation"], function () {
        Route::get("datatable", [RegulationController::class, "dataTable"]);
        Route::get("{id}/detail", [RegulationController::class, "getDetail"]);
        Route::post("/create", [RegulationController::class, "create"]);
        Route::post("/update", [RegulationController::class, "update"]);
        Route::post("/update-status", [RegulationController::class, "updateStatus"]);
        Route::delete("/", [RegulationController::class, "destroy"]);
    });

    // REGULATION FILE
    Route::group(["prefix" => "regulation-file"], function () {
        Route::get("{regulation_id}/datatable", [RegulationFileController::class, "dataTable"]);
        Route::get("{id}/detail", [RegulationFileController::class, "getDetail"]);
        Route::post("/create", [RegulationFileController::class, "create"]);
        Route::post("/update", [RegulationFileController::class, "update"]);
        Route::delete("/", [RegulationFileController::class, "destroy"]);
    });

    // LINK
    Route::group(["prefix" => "link"], function () {
        Route::get("datatable", [LinkController::class, "dataTable"]);
        Route::get("{id}/detail", [LinkController::class, "getDetail"]);
        Route::post("/create", [LinkController::class, "create"]);
        Route::post("/update", [LinkController::class, "update"]);
        Route::delete("/", [LinkController::class, "destroy"]);
    });

    // USER
    Route::group(["prefix" => "user"], function () {
        Route::get("datatable", [UserController::class, "dataTable"]);
        Route::get("{id}/detail", [UserController::class, "getDetail"]);
        Route::post("/create", [UserController::class, "create"]);
        Route::post("/update", [UserController::class, "update"]);
        Route::post("/update-status", [UserController::class, "updateStatus"]);
        Route::delete("/", [UserController::class, "destroy"]);
    });

    // REVIEW / TESTIMONI
    Route::group(["prefix" => "review"], function () {
        Route::get("datatable", [ReviewController::class, "dataTable"]);
        Route::get("{id}/detail", [ReviewController::class, "getDetail"]);
        Route::post("/create", [ReviewController::class, "create"]);
        Route::post("/update", [ReviewController::class, "update"]);
        Route::delete("/", [ReviewController::class, "destroy"]);
    });

    // SETTING
    Route::group(["prefix" => "setting"], function () {
        Route::get("/detail", [SettingController::class, 'getDetail']);
        Route::post("/create-update", [SettingController::class, 'createAndUpdate']);
    });
});
