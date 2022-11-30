<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\User\AuthController as UserAuthController;
use App\Http\Controllers\Coach\AuthController as CoachAuthController;
use App\Http\Controllers\Admin\AuthController as AdminAuthController;
use App\Http\Controllers\Coach\CustomerController;
use App\Http\Controllers\Coach\DomainController;
use App\Http\Controllers\Coach\HistoryController as CoachHistoryController;
use App\Http\Controllers\Coach\ProgressController;
use App\Http\Controllers\User\CartController;
use App\Http\Controllers\User\InvoiceController;
use App\Http\Controllers\User\HistoryController as UserHistoryController;
use App\Http\Controllers\User\PaymentController;
use App\Http\Controllers\User\ReviewController;
use App\Http\Controllers\User\TrainerController;
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

// NAVBAR ROUTES
Route::group([], function () {
    Route::view('/', 'frontend.welcome', ['title' => 'Home'])->name('home');
    Route::view('/about', 'frontend.user.about.index', ['title' => 'About'])->name('about');
});

// USER
Route::prefix('user')
    ->name('user.')
    ->controller(UserAuthController::class)
    ->group(function () {
        Route::get('register', 'register')->name('register.view');
        Route::post('register', 'store')->name('register.store');

        Route::get('login', 'login')->name('login.view');
        Route::post('login', 'authenticate')->name('login.authenticate');

        Route::post('logout', 'logout')->name('logout');
    });

// USER : PUBLIC ROUTES
Route::prefix('user')->name('user.')->group(function () {
    Route::get('trainer', [TrainerController::class, 'index'])->name('trainer.view');
    Route::get('trainer/{coach_domains}', [TrainerController::class, 'detail'])->name('trainer.detail');

    Route::get('review', [ReviewController::class, 'index'])->name('review.view');
});


// USER: PROTECTED ROUTES
Route::middleware('guest:user')
    ->prefix('user')
    ->name('user.')
    ->group(function () {
        Route::get('cart', [CartController::class, 'index'])->name('cart.view');
        Route::post('cart', [CartController::class, 'store'])->name('cart.store');
        Route::delete('cart/{rowId}/delete', [CartController::class, 'remove'])->name('cart.remove');
        Route::delete('cart/destroy', [CartController::class, 'destroy'])->name('cart.destroy');

        Route::get('payment', [PaymentController::class, 'index'])->name('payment.view');

        Route::post('invoice', [InvoiceController::class, 'handle'])->name('invoice.handle');
        Route::get('invoice/{invoice}', [InvoiceController::class, 'detail'])->name('invoice.detail');
        Route::post('invoice/{invoice}/paid', [InvoiceController::class, 'setPaid'])->name('invoice.paid');

        Route::get('history', [UserHistoryController::class, 'index'])->name('history.view');

        Route::get('edit', [UserAuthController::class, 'edit'])->name('settings.edit');
        Route::patch('update', [UserAuthController::class, 'update'])->name('settings.update');
    });

// COACH
Route::prefix('coach')
    ->name('coach.')
    ->controller(CoachAuthController::class)
    ->group(function () {
        Route::get('register', 'register')->name('register.view');
        Route::post('register', 'store')->name('register.store');

        Route::get('login', 'login')->name('login.view');
        Route::post('login', 'authenticate')->name('login.authenticate');

        Route::post('logout', 'logout')->name('logout');


    });

// COACH: PROTECTED ROUTES
Route::prefix('coach')
    ->name('coach.')
    ->middleware('guest:coach')
    ->group(function () {
        Route::get('customer', [CustomerController::class, 'index'])->name('customer');
        Route::patch('customer/{order_item_status}', [CustomerController::class, 'markAsDone'])->name('customer.done');

        Route::get('history', [CoachHistoryController::class, 'index'])->name('history');
        Route::get('progress', [ProgressController::class, 'index'])->name('progress');

        Route::resource('sports', DomainController::class)->except('show');

        Route::get('edit', [CoachAuthController::class, 'edit'])->name('settings.index');;
        Route::patch('update', [CoachAuthController::class, 'update'])->name('settings.update');;
    });

// ADMIN
Route::prefix('admin')
    ->name('admin.')
    ->controller(AdminAuthController::class)
    ->group(function () {
        Route::get('login', 'login')->name('login.view');
        Route::post('login', 'authenticate')->name('login.authenticate');

        Route::post('logout', 'logout')->name('logout');
    });

// ADMIN: PROTECTED ROUTES
Route::prefix('admin')
    ->controller(AdminController::class)
    ->name('admin.')
    ->group(function () {
        Route::get('overview', 'overview')->name('overview');
        Route::get('orders', 'orders')->name('orders');
        Route::get('coach', 'coach')->name('coach');
        Route::get('coach_progress', 'coach_progress')->name('coach_progress');
    });
