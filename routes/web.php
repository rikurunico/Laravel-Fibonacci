<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;

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

Route::middleware(['guest'])->group(function () {
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login', [LoginController::class, 'login'])->name('loginPost');
    Route::post('/register', [LoginController::class, 'register'])->name('registerPost');
    Route::get('/register', [LoginController::class, 'registerPage'])->name('register');
});

Route::middleware(['auth'])->group(function () {
    Route::resource('/home', HomeController::class);
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
});
