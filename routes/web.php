<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\LandingPage;
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

//AUTH
Route::get('/login', [LoginController::class, 'index'])->name('auth.login');
Route::post('/login', [LoginController::class, 'authenticate'])->name('auth.authenticate');

Route::get('/register/user', [RegisterController::class, 'userIndex'])->name('user.register.index');
Route::post('/register/user', [RegisterController::class, 'storeUser'])->name('user.register.store');

Route::post('/logout', [LoginController::class, 'logout'])->name('auth.logout');

// USER


// TRAINER


// ADMIN
Route::prefix('admin')
    ->controller(AdminController::class)
    ->name('admin.')
    ->group(function () {
        Route::get('overview', 'overview')->name('overview');
        Route::get('orders', 'orders')->name('orders');
        Route::get('coach', 'coach')->name('coach');
        Route::get('coach_progress', 'coachProgress')->name('coach_progress');
    });
