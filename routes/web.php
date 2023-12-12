<?php

use App\Http\Controllers\Admin\AgendaController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\CountInformationController;
use App\Http\Controllers\Admin\DashboardController;
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
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\SlideController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\VideoController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name("home");
Route::get("/profile/{seo}", [ProfileController::class, 'homeProfile'])->name('home-profile');
Route::get('/hall/{id}/{seo}', [HallController::class, 'homeHall'])->name('home-hall');
Route::get("/news", [PostController::class, 'homePost'])->name('home-news');
// Rout::post('/news/search', [PostController::class, 'homePostSearch'])->name('home-news-search');
Route::get("/news/read/{id}/{seo}", [PostController::class, 'homePostDetail'])->name('read-news');
Route::get('/regulation/{seo}', [RegulationController::class, 'homeRegulation'])->name('home-regulation');
Route::get('/regulation', [RegulationController::class, 'homeListRegulation'])->name('home-list-regulation');
Route::get('/download', [DownloadController::class, 'homeDownload'])->name('home-download');
Route::get('/agenda', [AgendaController::class, 'homeAgenda'])->name("home-agenda");
Route::get('/gallery/photo', [GalleryController::class, 'homeGallery'])->name('home-img-gallery');
Route::get('/gallery/video', [VideoController::class, 'homeVideo'])->name('home-video-gallery');
Route::get('/contact', [ContactController::class, 'homeContact'])->name('home-contact');
Route::post('/contact/create', [ContactController::class, 'create'])->name('create-contact');
Route::get('/polling', [PollingController::class, 'homePolling'])->name('home-polling');

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
// AUTH
Route::group(["middleware" => "guest"], function () {
    Route::get('/kelola', [AuthController::class, 'login'])->name('login');
});
// Dashboard
Route::prefix('admin')->namespace('admin')->middleware(['auth'])->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // MASTER
    Route::get('hall', [HallController::class, 'index'])->name('hall'); // balai
    Route::get('slide', [SlideController::class, 'index'])->name('slide'); // slide
    Route::get('news', [PostController::class, 'index'])->name('news'); // berita
    Route::get('public-information-file/{public_information_news_id}/detail', [PublicInformationFilesController::class, 'index'])->name('regulation-file'); // file informasi publik
    Route::get('pages', [PageController::class, 'index'])->name('pages'); // home anggaran
    Route::get('infographic', [InfographicController::class, 'index'])->name('infographic'); //  infografis
    Route::get('count-information', [CountInformationController::class, 'index'])->name('count-information'); //  jumlah informasi
    Route::get('portal-data', [PortalDataController::class, 'index'])->name('portal-data'); // portal data
    Route::get('official-ppid', [OfficialPpidProfileController::class, 'index'])->name('official-ppid'); // pejabat ppid
    Route::get('gallery', [GalleryController::class, 'index'])->name('gallery'); // galeri
    Route::get('image-gallery/{gallery_id}/detail', [ImageGalleryController::class, 'index'])->name('image-gallery'); // image gallery
    Route::get('video', [VideoController::class, 'index'])->name('video'); // video
    Route::get('agenda', [AgendaController::class, 'index'])->name('agenda'); // agenda
    Route::get('download', [DownloadController::class, 'index'])->name('download'); // download
    Route::get('regulation', [RegulationController::class, 'index'])->name('regulation'); // regulation
    Route::get('regulation-file/{regulation_id}/detail', [RegulationFileController::class, 'index'])->name('regulation-file'); // regulation file
    Route::get('link', [LinkController::class, 'index'])->name('link'); // link
    Route::get('contact-us', [ContactController::class, 'index'])->name('contact-us'); // hubungi kami
    Route::get('user', [UserController::class, 'index'])->name('user'); // pengguna
    Route::get('review', [ReviewController::class, 'index'])->name('review'); // testimoni
    Route::get('setting', [SettingController::class, 'index'])->name('setting'); // setting
    Route::get('setting/webinfo', [SettingController::class, 'webinfo'])->name("setting.webinfo");
    Route::get('setting/profile', [SettingController::class, 'profile'])->name("setting.profile");
    Route::get('setting/sosmed', [SettingController::class, 'sosmed'])->name("setting.sosmed");
    Route::get('setting/image', [SettingController::class, 'image'])->name("setting.image");
    Route::get('setting/maps', [SettingController::class, 'maps'])->name("setting.maps");

    // INFORMATION
    Route::get('public-information', [PublicInformationController::class, 'index'])->name('public-information'); // informasi publik
    Route::get('public-information-news', [PublicInformationNewsController::class, 'index'])->name('public-information-news'); // berita informasi publik
    Route::get('form', [FormInformationController::class, 'index'])->name('form');
    Route::get('form/request', [FormInformationController::class, 'request'])->name('form.request');
    Route::get('form/objection', [FormInformationController::class, 'objection'])->name('form.objection');
    Route::get('form/complaint', [FormInformationController::class, 'complaint'])->name('form.complaint');
    Route::get('form/satisfaction', [FormInformationController::class, 'satisfaction'])->name('form.satisfaction');
    
    // MANAGEMENT
    Route::get('profile', [ProfileController::class, 'profile'])->name('profile');
    Route::get('profile/history', [ProfileController::class, 'history'])->name('history');
    Route::get('profile/vision', [ProfileController::class, 'vision'])->name('vision');
    Route::get('profile/tupoksi', [ProfileController::class, 'tupoksi'])->name('tupoksi');
    Route::get('profile/organization', [ProfileController::class, 'organization'])->name('organization');
    Route::get('profile/official', [ProfileController::class, 'official'])->name('official');
    Route::get('account', [AuthController::class, 'account'])->name('account'); //account
    //FOR ROLE USER
    Route::get('hall-profile', [HallController::class, 'hallProfile'])->name('hall-profile'); // profile balai
    Route::get('hall-contact', [HallController::class, 'hallContact'])->name('hall-contact'); // kotak balai


});
