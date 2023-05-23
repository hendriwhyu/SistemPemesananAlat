<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

use App\Http\Controllers\ClientController;
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

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login-proses', [AuthController::class, 'authentication']);
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'makeAccount'])->name('add-register');
// Route::get('/logout',[AuthController::class, 'logout'])->name('logout');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Route::middleware(['auth', 'cekUser:1'])->group(function () {
//     Route::get('/dashboard', [AdminController::class, 'dashboard']);
// });

Route::prefix('admin')->middleware('auth', 'isAdmin')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
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
});

Route::prefix('client')->middleware('auth', 'isClient')->group(function () {
    Route::get('/dashboard', [ClientController::class, 'dashboard'])->name('client.dashboard');
});
