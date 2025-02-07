<?php

use App\Http\Controllers\Admin\AgendaController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\CountInformationController;
use App\Http\Controllers\Admin\CustomTemplateController;
use App\Http\Controllers\Admin\DownloadController;
use App\Http\Controllers\Admin\FormInformationController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\HallController;
use App\Http\Controllers\Admin\ImageGalleryController;
use App\Http\Controllers\Admin\InfographicController;
use App\Http\Controllers\Admin\LinkController;
use App\Http\Controllers\Admin\OfficialPpidProfileController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\PollingController;
use App\Http\Controllers\Admin\PortalDataController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\PublicInformationController;
use App\Http\Controllers\Admin\PublicInformationNewsController;
use App\Http\Controllers\Admin\PublicInformationFilesController;
use App\Http\Controllers\Admin\RegulationController;
use App\Http\Controllers\Admin\RegulationFileController;
use App\Http\Controllers\Admin\ReviewController;
use App\Http\Controllers\Admin\RunningTextsController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\SlideController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\VideoController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
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

// HOME
Route::get('/agenda', [HomeController::class, 'getAgenda']);
Route::get("/agenda/datatable", [AgendaController::class, "homeDataTable"]);
Route::get("/download/datatable", [DownloadController::class, "homeDataTable"]);
Route::get("/regulation/datatable", [RegulationController::class, "homeDataTable"]);
Route::get("/gallery/photo/datatable", [GalleryController::class, "homeDataTable"]);
Route::get("/news", [PostController::class, 'search']);
Route::post('/polling/update', [PollingController::class, 'update']);
Route::get('/public-information-news/datatable/{seo}', [PublicInformationNewsController::class, 'homeDataTable']);
Route::get('/public-information-file/datatable/{seo}', [PublicInformationFilesController::class, 'homeDataTable']);
Route::post("/form-information", [FormInformationController::class, "create"]);
Route::get("/running-text", [RunningTextsController::class, "homeRunningText"]);

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

    // RUNNING TEXT
    Route::group(["prefix" => "running-text"], function () {
        Route::get("datatable", [RunningTextsController::class, "dataTable"]);
        Route::get("{id}/detail", [RunningTextsController::class, "getDetail"]);
        Route::post("/create", [RunningTextsController::class, "create"]);
        Route::post("/update", [RunningTextsController::class, "update"]);
        Route::delete("/", [RunningTextsController::class, "destroy"]);
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

    // PUBLIC INFORMATION
    Route::group(["prefix" => "public-information"], function () {
        Route::get("datatable", [PublicInformationController::class, "dataTable"]);
        Route::get("{id}/detail", [PublicInformationController::class, "getDetail"]);
        Route::post("/create", [PublicInformationController::class, "create"]);
        Route::post("/update", [PublicInformationController::class, "update"]);
        Route::delete("/", [PublicInformationController::class, "destroy"]);
    });

    // PUBLIC INFORMATION NEWS
    Route::group(["prefix" => "public-information-news"], function () {
        Route::get("datatable", [PublicInformationNewsController::class, "dataTable"]);
        Route::get("{id}/detail", [PublicInformationNewsController::class, "getDetail"]);
        Route::post("/create", [PublicInformationNewsController::class, "create"]);
        Route::post("/update", [PublicInformationNewsController::class, "update"]);
        Route::post("/update-status", [PublicInformationNewsController::class, "updateStatus"]);
        Route::delete("/", [PublicInformationNewsController::class, "destroy"]);
    });

    // PUBLIC INFORMATION FILE
    Route::group(["prefix" => "public-information-file"], function () {
        Route::get("{public_information_news_id}/datatable", [PublicInformationFilesController::class, "dataTable"]);
        Route::get("{id}/detail", [PublicInformationFilesController::class, "getDetail"]);
        Route::post("/create", [PublicInformationFilesController::class, "create"]);
        Route::post("/update", [PublicInformationFilesController::class, "update"]);
        Route::delete("/", [PublicInformationFilesController::class, "destroy"]);
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

    // CONTACT US
    Route::group(["prefix" => "contact-us"], function () {
        Route::get("datatable", [ContactController::class, "dataTable"]);
        Route::get("{id}/detail", [ContactController::class, "getDetail"]);
        // Route::post("/create", [ContactController::class, "create"]);
        // Route::post("/update", [ContactController::class, "update"]);
        Route::delete("/", [ContactController::class, "destroy"]);
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

    // PROFILE
    Route::group(["prefix" => "profile"], function () {
        Route::get("/detail", [ProfileController::class, 'getDetail']);
        Route::post("/create-update", [ProfileController::class, 'createAndUpdate']);
    });

    // CHANGE PASS
    Route::group(["prefix" => "user"], function () {
        Route::get("/detail", [AuthController::class, "detail"]);
        Route::post("/update", [AuthController::class, "update"]);
    });

    // FOR ROLE USER
    Route::group(["prefix" => "hall-profile"], function () {
        Route::get("/detail", [HallController::class, 'getHallProfileContact']);
        Route::post("/update-profile", [HallController::class, 'updateSaveProfile']);
        Route::post("/update-contact", [HallController::class, 'updateSaveContact']);
    });

    // FORM INFORMATION
    Route::group(["prefix" => "form"], function () {
        Route::get("{type}/datatable", [FormInformationController::class, "dataTable"]);
        Route::get("{id}/detail", [FormInformationController::class, "getDetail"]);
        // Route::post("/update", [FormInformationController::class, "update"]);
        Route::delete("/", [FormInformationController::class, "destroy"]);
    });
});
