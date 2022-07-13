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
//Admin
    //Pengguna
        Route::get('/penguna', [App\Http\Controllers\UserController::class, 'index'])->name('pengguna');
        Route::get('/penguna/create', [App\Http\Controllers\UserController::class, 'create'])->name('pengguna.create');
        Route::post('/penguna/save', [App\Http\Controllers\UserController::class, 'save'])->name('pengguna.save');
        Route::post('/penguna/update', [App\Http\Controllers\UserController::class, 'update'])->name('pengguna.update');
        Route::get('/penguna/edit/{id}', [App\Http\Controllers\UserController::class, 'edit'])->name('pengguna.edit');
        


    //Presensi
        Route::get('/presensi', [App\Http\Controllers\PresensiController::class, 'index'])->name('presensi');
        Route::get('/presensi/create', [App\Http\Controllers\PresensiController::class, 'create'])->name('presensi.create');
        Route::post('/presensi/save', [App\Http\Controllers\PresensiController::class, 'save'])->name('presensi.save');
        Route::post('/presensi/update', [App\Http\Controllers\PresensiController::class, 'update'])->name('presensi.update');
        Route::get('/presensi/edit/{id}', [App\Http\Controllers\PresensiController::class, 'edit'])->name('presensi.edit');
        Route::get('/presensi/delete/{id}', [App\Http\Controllers\PresensiController::class, 'delete'])->name('presensi.delete');
        
        
// END ADMIN
});