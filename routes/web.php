<?php

use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Dashboard;
use App\Http\Controllers\DashboardAdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardGudangController;
use App\Http\Controllers\DashboardTokoController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\PDFController;

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

Route::get('/Login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/Login', [LoginController::class, 'authenticate']);
Route::post('/Logout', [LoginController::class, 'logout'])->middleware('auth');
// Rute untuk login Google
Route::get('/login/google', [LoginController::class, 'redirectToGoogle'])->name('login.google');
Route::get('/login/google/callback', [LoginController::class, 'handleGoogleCallback']);
Route::get('logs', [\Rap2hpoutre\LaravelLogViewer\LogViewerController::class, 'index']);

Route::get('/api/products', [DashboardGudangController::class, 'index']);
Route::get('/api/products/{id}', [DashboardGudangController::class, 'show']);
Route::get('/', function () {
    return view('cobaa', [
        'title' => 'Login',
        'active' => 'login'
    ]);
})->middleware('guest');

Route::get('/Dashboard', [Dashboard::class, 'index'])->middleware('auth');
Route::post('/upload-pdf', [PDFController::class, 'uploadPDF'])->name('upload.pdf');


Route::post('/forgotpassword', [ForgotPasswordController::class, 'send']);

Route::middleware(['auth', 'CekRole:1'])->group(function () {
Route::get('/Dashboard/daftaruser', [DashboardAdminController::class, 'daftaruser']);
Route::get('/Dashboard/daftarproduk', [DashboardAdminController::class, 'daftarproduk']);
Route::get('/Dashboard/master/daftaruser', [DashboardAdminController::class, 'masteruser']);
Route::get('/Dashboard/master/daftarproduk', [DashboardAdminController::class, 'masterproduct']);
Route::get('/Dashboard/pendaftaranuser', [DashboardAdminController::class, 'pendaftaranuser']);
Route::get('/Dashboard/pendaftaranproduk', [DashboardAdminController::class, 'pendaftaranproduk']);
Route::post('/Dashboard/pendaftaranproduk', [DashboardAdminController::class, 'pendaftaranproduksimpan']);
Route::post('/Register', [RegisterController::class, 'store']);
Route::post('/Dashboard/prosesuseradd', [RegisterController::class, 'prosesuseradd']);
Route::post('/Dashboard/prosesuserhapus', [DashboardAdminController::class, 'prosesuserhapus']);
Route::post('/Dashboard/prosesuseredit', [DashboardAdminController::class, 'prosesuseredit']);
Route::post('/Dashboard/proseseditproduct', [DashboardAdminController::class, 'proseseditproduct']);
Route::post('/Dashboard/prosesaddproduct', [DashboardAdminController::class, 'prosesaddproduct']);
Route::post('/Dashboard/proseshapusproduct', [DashboardAdminController::class, 'proseshapusproduct']);
});

Route::middleware(['auth', 'CekRole:2,1'])->group(function () {
    Route::get('/Dashboard/toko/pemesananproduk', [DashboardTokoController::class, 'pemesananproduk']);
    Route::post('/Dashboard/toko/pemesananproduk', [DashboardTokoController::class, 'pemesananprodukpost']);
    Route::get('/Dashboard/toko/daftarpenjualanproduk', [DashboardTokoController::class, 'daftarpenjualanproduk']);
    Route::get('/Dashboard/toko/detailpenjualanproduk', [DashboardTokoController::class, 'detailpenjualanproduk']);
    Route::get('/Dashboard/toko/daftarpenjualan/detail/{id}', [DashboardTokoController::class, 'detail']);
    Route::get('/Dashboard/toko/getProductDetails/{productID}', [DashboardTokoController::class, 'getProductDetails']);
});

Route::middleware(['auth', 'CekRole:3,1,2'])->group(function () {
    Route::get('/Dashboard/stokgudang', [DashboardGudangController::class, 'stokgudang']);
    Route::get('/Dashboard/stoktoko', [DashboardGudangController::class, 'stoktoko']);
});

Route::middleware(['auth', 'CekRole:3,1'])->group(function () {
    Route::delete('/Dashboard/destroy/pemesananproduk/{id}', [DashboardGudangController::class, 'destroy']);
    Route::get('/Dashboard/daftarpembelianproduk', [DashboardGudangController::class, 'daftarpembelianproduk']);
    Route::get('/Dashboard/gudang/daftarpemesananproduk', [DashboardGudangController::class, 'daftarpemesananproduk']);
    Route::get('/Dashboard/pembelianproduk', [DashboardGudangController::class, 'pembelianproduk']);
    Route::post('/Dashboard/pembelianproduk', [DashboardGudangController::class, 'pembelianprodukpost']);
    Route::get('/Dashboard/pemesananproduk', [DashboardGudangController::class, 'pemesananproduk']);
    Route::post('/Dashboard/pemesananproduk', [DashboardGudangController::class, 'pemesananprodukpost']);
});
Auth::routes();

