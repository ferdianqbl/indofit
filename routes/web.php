<?php

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

Route::get('/', function () {
    return view('welcome');
});

// USER
Route::get('/login', function () {
    return view('frontend.login.login');
});

Route::get('/register', function () {
    return view('frontend.login.register');
});



// TRAINER



// ADMIN
