<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\HallController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\SlideController;
use App\Http\Controllers\AuthController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/kelola', [AuthController::class, 'login'])->name('login');

// Dashboard
Route::prefix('admin')->namespace('admin')->middleware(['auth'])->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // MASTER
    Route::get('hall', [HallController::class, 'index'])->name('hall');
    Route::get('slide', [SlideController::class, 'index'])->name('slide');
    Route::get('news', [PostController::class, 'index'])->name('news');
});
