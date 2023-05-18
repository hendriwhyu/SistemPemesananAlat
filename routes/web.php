<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClientController;

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

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login/proses', [AuthController::class, 'authentication']);
Route::get('/register', [AuthController::class, 'register'])->name('register');
// Route::get('/logout',[AuthController::class, 'logout'])->name('logout');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Route::middleware(['auth', 'cekUser:1'])->group(function () {
//     Route::get('/dashboard', [AdminController::class, 'dashboard']);
// });

Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/kategori', [AdminController::class, 'kategori'])->name('admin.kategori');
    Route::post('/kategori', [AdminController::class, 'AddKategori']);
    Route::put('/kategori/edit', [AdminController::class, 'edit']);
    Route::delete('/kategori/delete', [AdminController::class, 'delete']);
    Route::get('/detail-kategori/{name_categories}', [UnitController::class, 'show']);
});

Route::prefix('client')->middleware('auth')->group(function () {
    Route::get('/dashboard', [ClientController::class, 'dashboard'])->name('client.dashboard');
});
