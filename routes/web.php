<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\FakturController;
use App\Http\Controllers\KategoriController;
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


// Barang
Route::get('/add/barang', [BarangController::class, 'addBarang']) -> name('addBarang');
Route::post('/store/barang', [BarangController::class, 'storeBarang']) -> name('storeBarang');

Route::get('/', [BarangController::class, 'viewBarang']) -> name('viewBarang') -> middleware('auth');

Route::get('/edit/barang/{id}', [BarangController::class, 'editBarang']) -> name('editBarang');
Route::patch('/update/barang/{id}', [BarangController::class, 'updateBarang']) -> name('updateBarang');
Route::delete('/delete/barang/{id}', [BarangController::class, 'deleteBarang']) -> name('deleteBarang');

// Cart
Route::get('/add/to/cart/{id}', [CartController::class, 'addToCart']) -> name('addToCart');
Route::post('/store/to/cart/{id}', [CartController::class, 'storeToCart']) -> name('storeToCart');

// Faktur
Route::get('/print/faktur/', [FakturController::class, 'printFaktur']) -> name('printFaktur');
Route::post('/store/faktur/', [FakturController::class, 'storeFaktur']) -> name('storeFaktur');
Route::delete('/delete/barang/faktur/{id}', [FakturController::class, 'deleteBarangFaktur']) -> name('deleteBarangFaktur');

// Kategori
Route::get('/add/kategori', [KategoriController::class, 'addKategori']) -> name('addKategori');
Route::post('/store/kategori', [KategoriController::class, 'storeKategori']) -> name('storeKategori');

// Register
Route::get('/register', [AuthController::class, 'registerPage']) ->name('registerPage') -> middleware('guest') -> middleware('guest');
Route::post('/register', [AuthController::class, 'register']) -> name('register') -> middleware('guest');

// Login
Route::get('/login', [AuthController::class, 'loginPage']) ->name('loginPage') -> middleware('guest');
Route::post('/login', [AuthController::class, 'login']) -> name('login') -> middleware('guest');

// Logout
Route::post('logout', [AuthController::class, 'logout']) -> name('logout') -> middleware('auth');