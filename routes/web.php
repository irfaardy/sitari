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

    Route::get('/home', function(){
        return redirect('/dashboard');
    })->name('dashboard');
    Route::group(['middleware' => ['sudah_bayar_pendaftaran']], function () {
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
        Route::get('/absensi-hari-ini', [App\Http\Controllers\PresensiController::class, 'presensi_self'])->name('presensi.now');
        Route::post('/absensi-hari-ini/action', [App\Http\Controllers\PresensiController::class, 'presensi_self_act'])->name('presensi.action');
        
        
        //news
        Route::get('/pengumuman', [App\Http\Controllers\PengumumanController::class, 'index'])->name('pengumuman');
        Route::get('/pengumuman/create', [App\Http\Controllers\PengumumanController::class, 'create'])->name('pengumuman.create');
        Route::get('/news/detail/{id}', [App\Http\Controllers\PengumumanController::class, 'detail'])->name('pengumuman.detail');
        Route::post('/pengumuman/save', [App\Http\Controllers\PengumumanController::class, 'save'])->name('pengumuman.save');
        Route::post('/pengumuman/update', [App\Http\Controllers\PengumumanController::class, 'update'])->name('pengumuman.update');
        Route::get('/pengumuman/edit/{id}', [App\Http\Controllers\PengumumanController::class, 'edit'])->name('pengumuman.edit');
        Route::get('/pengumuman/delete/{id}', [App\Http\Controllers\PengumumanController::class, 'delete'])->name('pengumuman.delete');
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
        Route::post('/pembayaran/checkout/upload', [App\Http\Controllers\PembayaranController::class, 'upload'])->name('member.pembayaran.upload');
    });
        
        Route::get('/pendaftaran', [App\Http\Controllers\PembayaranController::class, 'pembayaran_pertama'])->name('member.pembayaran.pertama');
        Route::get('/pendaftaran/checkout', [App\Http\Controllers\PembayaranController::class, 'checkout_pendaftaran'])->name('member.pembayaran.pendaftaran'); 
        Route::post('/pendaftaran/checkout/upload', [App\Http\Controllers\PembayaranController::class, 'upload_pendaftaran'])->name('member.pembayaran.upload.pendaftaran');
        Route::get('/pembayaran/riwayat-pembayaran', [App\Http\Controllers\PembayaranController::class, 'riwayat_pembayaran'])->name('member.pembayaran.history'); 
        //END MEMBER
});