<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

use App\Http\Controllers\ClientController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\RentalController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [LandingPageController::class, 'home'])->name('welcome');
Route::get('/about', [LandingPageController::class, 'about'])->name('about');
Route::get('/unit', [LandingPageController::class, 'unit'])->name('unit');

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login-proses', [AuthController::class, 'authentication']);
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'makeAccount'])->name('add-register');
// Route::get('/logout',[AuthController::class, 'logout'])->name('logout');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Route::middleware(['auth', 'cekUser:1'])->group(function () {
//     Route::get('/dashboard', [AdminController::class, 'dashboard']);
// });
Route::get('/api/unit/{kode}', [UnitController::class, 'getUnitData']);

Route::prefix('admin')->middleware('auth', 'isAdmin')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/profile', [UserController::class, 'profile'])->name('admin.profile');
    Route::put('/profile/change', [UserController::class, 'editProfile'])->name('admin.profile-change');
    Route::put('/profile/password', [UserController::class, 'editPassword'])->name('admin.profile-password');
    Route::get('/kategori', [AdminController::class, 'kategori'])->name('admin.kategori');
    Route::post('/kategori', [AdminController::class, 'AddKategori']);
    Route::put('/kategori/edit', [AdminController::class, 'edit']);
    Route::delete('/kategori/delete', [AdminController::class, 'delete']);
    Route::get('/detail-kategori/{name_categories}', [UnitController::class, 'show'])->name('admin.Unit');
    Route::post('/detail-kategori/{name_categories}', [UnitController::class, 'addUnit']);
    Route::put('/detail-kategori/{name_categories}', [UnitController::class, 'edit'])->name('admin.editUnit');
    Route::put('/detail-kategori/{name_categories}/detail-unit', [UnitController::class, 'detailUpdate'])->name('admin.editDetailUnit');
    Route::delete('/detail-kategori/{name_categories}', [UnitController::class, 'delete']);

    Route::get('/user', [UserController::class, 'user'])->name('admin.user');
    Route::post('/user-add', [UserController::class, 'addUser']);
    Route::put('/user-edit', [UserController::class, 'update']);
    Route::delete('/user-delete', [UserController::class, 'delete']);

    Route::get('/history', [RentalController::class, 'index'])->name('admin.historyrental');
    Route::put('/verified-stat', [RentalController::class, 'verifRental'])->name('admin.verified');
    Route::put('/verified-denda', [RentalController::class, 'verifDenda'])->name('admin.verifDenda');
});

Route::prefix('client')->middleware('auth', 'isClient')->group(function () {
    Route::get('/dashboard', [ClientController::class, 'dashboard'])->name('client.dashboard');
    Route::get('/pemesanan', [RentalController::class, 'pemesanan'])->name('client.pemesanan');
    Route::get('/pemesanan/{kode}', [RentalController::class, 'detailPemesanan'])->name('client.detailPemesanan');
    Route::post('/pemesanan', [RentalController::class, 'store'])->name('client.addpesanan');
    
    Route::get('/history', [RentalController::class, 'index'])->name('client.historyrental');
    Route::put('/upload-bukti', [RentalController::class, 'uploadBukti'])->name('client.uploadbukti');
    Route::put('/bayar-denda', [RentalController::class, 'bayarDenda'])->name('client.bayarDenda');
    Route::get('/profile', [UserController::class, 'profile'])->name('client.profile');
    Route::put('/profile/change', [UserController::class, 'editProfile'])->name('client.profile-change');
    Route::put('/profile/password', [UserController::class, 'editPassword'])->name('client.profile-password');
});

Route::prefix('manager')->middleware('auth', 'isManager')->group(function () {
    Route::get('/dashboard', [ManagerController::class, 'dashboard'])->name('manager.dashboard');
    // Route::get('/unit', [ManagerController::class, 'unit'])->name('manager.unit');
    Route::get('/kategori', [ManagerController::class, 'kategori'])->name('manager.kategori');
    Route::get('/detail-kategori/{name_categories}', [ManagerController::class, 'show'])->name('manager.Unit');
    // Route::get('/unit/{name_categories}', [ManagerController::class, 'unit'])->name('manager.unit');
    Route::put('/detail-kategori/{name_categories}/detail-unit', [ManagerController::class, 'detailUpdate'])->name('manager.editDetailUnit');

    Route::get('/histori', [ManagerController::class, 'histori'])->name('manager.histori');
    Route::get('/profile', [UserController::class, 'profile'])->name('manager.profile');
    Route::put('/profile/change', [UserController::class, 'editProfile'])->name('manager.profile-change');
    Route::put('/profile/password', [UserController::class, 'editPassword'])->name('manager.profile-password');
});

