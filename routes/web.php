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
    //Pembayaran
        Route::get('/img/pembayaran/{file}', [App\Http\Controllers\ImgController::class, 'buktiTF'])->name('img.tf'); 

        Route::get('/kelola/pembayaran', [App\Http\Controllers\AdmPembayaranController::class, 'index'])->name('admin.pembayaran'); 
        Route::get('/kelola/pembayaran/acc/{id}', [App\Http\Controllers\AdmPembayaranController::class, 'acc'])->name('admin.pembayaran.acc');

        Route::post('/kelola/pembayaran/download-laporan', [App\Http\Controllers\AdmPembayaranController::class, 'export'])->name('admin.pembayaran.export');
        Route::get('/kelola/pembayaran/revoke/{id}', [App\Http\Controllers\AdmPembayaranController::class, 'revoke'])->name('admin.pembayaran.revoke');
    //Pengguna
        Route::get('/penguna', [App\Http\Controllers\UserController::class, 'index'])->name('pengguna');
        Route::get('/penguna/create', [App\Http\Controllers\UserController::class, 'create'])->name('pengguna.create');
        Route::post('/penguna/save', [App\Http\Controllers\UserController::class, 'save'])->name('pengguna.save');
        Route::post('/penguna/update', [App\Http\Controllers\UserController::class, 'update'])->name('pengguna.update');
        Route::get('/penguna/edit/{id}', [App\Http\Controllers\UserController::class, 'edit'])->name('pengguna.edit');
        


    //Presensi
        Route::get('/presensi', [App\Http\Controllers\PresensiController::class, 'index'])->name('presensi');
        Route::get('/presensi/create', [App\Http\Controllers\PresensiController::class, 'create'])->name('presensi.create');
        Route::post('/presensi/export', [App\Http\Controllers\PresensiController::class, 'export'])->name('presensi.export');
        Route::post('/presensi/save', [App\Http\Controllers\PresensiController::class, 'save'])->name('presensi.save');
        Route::post('/presensi/update', [App\Http\Controllers\PresensiController::class, 'update'])->name('presensi.update');
        Route::get('/presensi/edit/{id}', [App\Http\Controllers\PresensiController::class, 'edit'])->name('presensi.edit');
        Route::get('/presensi/delete/{id}', [App\Http\Controllers\PresensiController::class, 'delete'])->name('presensi.delete');

    //Presensi
        Route::get('/biaya-sanggar', [App\Http\Controllers\BiayaSanggarController::class, 'index'])->name('biaya');
        Route::post('/biaya-sanggar/update', [App\Http\Controllers\BiayaSanggarController::class, 'update'])->name('biaya.update');
        
        
// END ADMIN
// MEMBER
    Route::get('/pembayaran', [App\Http\Controllers\PembayaranController::class, 'index'])->name('member.pembayaran');
    Route::get('/pembayaran/checkout', [App\Http\Controllers\PembayaranController::class, 'checkout'])->name('member.pembayaran.proses'); 
    Route::get('/pembayaran/riwayat-pembayaran', [App\Http\Controllers\PembayaranController::class, 'riwayat_pembayaran'])->name('member.pembayaran.history'); 
    Route::post('/pembayaran/checkout/upload', [App\Http\Controllers\PembayaranController::class, 'upload'])->name('member.pembayaran.upload');
//END MEMBER
});