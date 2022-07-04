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
Auth::routes();

Route::get('/', [App\Http\Controllers\LandingPage::class, 'index'])->name('landing');

// User Routes
Route::group(['middleware' => ['auth']], function () {

    Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');
//Pengguna
    Route::get('/penguna', [App\Http\Controllers\UserController::class, 'index'])->name('pengguna');
    Route::get('/penguna/create', [App\Http\Controllers\UserController::class, 'create'])->name('pengguna.create');
    Route::post('/penguna/save', [App\Http\Controllers\UserController::class, 'save'])->name('pengguna.save');
    Route::post('/penguna/update', [App\Http\Controllers\UserController::class, 'update'])->name('pengguna.update');
    Route::get('/penguna/edit/{id}', [App\Http\Controllers\UserController::class, 'edit'])->name('pengguna.edit');
    
    });