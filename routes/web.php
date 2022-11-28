<?php

use App\Http\Controllers\LandingPage;
use App\Http\Controllers\User\AuthController as UserAuthController;
use App\Http\Controllers\Coach\AuthController as CoachAuthController;
use App\Http\Controllers\Admin\AuthController as AdminAuthController;
use App\Http\Controllers\Coach\CustomerController;
use App\Http\Controllers\Coach\HistoryController;
use App\Http\Controllers\Coach\ProgressController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::controller(LandingPage::class)->group(function () {
    Route::get('/', 'home')->name('home');
    Route::get('/about', 'about')->name('about');
});

// USER
Route::prefix('user')->name('user.')->controller(UserAuthController::class)->group(function () {
    Route::get('register', 'register')->name('register.view');
    Route::post('register', 'store')->name('register.store');

    Route::get('login', 'login')->name('login.view');
    Route::post('login', 'authenticate')->name('login.authenticate');

    Route::post('logout', 'logout')->name('logout');
});

// COACH
Route::prefix('coach')->name('coach.')->controller(CoachAuthController::class)->group(function () {
    Route::get('register', 'register')->name('register.view');
    Route::post('register', 'store')->name('register.store');

    Route::get('login', 'login')->name('login.view');
    Route::post('login', 'authenticate')->name('login.authenticate');

    Route::post('logout', 'logout')->name('logout');
});

Route::prefix('coach')->name('coach.')->middleware('guest:coach')->group(function () {
    Route::get('customer', [CustomerController::class, 'index'])->name('customer');
    Route::get('customer/{order}', [CustomerController::class, 'detail'])->name('customer.detail');

    Route::get('history', [HistoryController::class, 'index'])->name('history');
    Route::get('progress', [ProgressController::class, 'index'])->name('progress');
});

// ADMIN
// Route::prefix('admin')
//     ->controller(AdminController::class)
//     ->name('admin.')
//     ->group(function () {
//         Route::get('overview', 'overview')->name('overview');
//         Route::get('orders', 'orders')->name('orders');
//         Route::get('coach', 'coach')->name('coach');
//         Route::get('coach_progress', 'coachProgress')->name('coach_progress');
//     });
