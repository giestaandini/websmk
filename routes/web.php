<?php

use App\Http\Controllers\BeritaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\KontrolController;

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
    return redirect('berita');
});

Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');

Route::post('register', [RegisterController::class, 'register']);

Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');

Route::post('login', [LoginController::class, 'login']);

Route::post('logout', [LoginController::class, 'logout'])->middleware('auth')->name('logout');

Route::get('member', [HomeController::class, 'index'])->middleware('auth')->name('member');

Route::get('admin', [DashboardController::class, 'index'])->middleware('auth', 'admin')->name('admin');

Route::get('/dashboard', function() {
    return view('backend.index');
})->middleware('auth');

Route::controller(KategoriController::class)->prefix('kategori')->group(function() {
    Route::get('', 'index')->name('kategori');
    Route::get('create', 'create')->name('kategori.create');
    Route::post('store', 'store')->name('kategori.store');
    Route::delete('destroy/{id}', 'destroy')->name('kategori.destroy');
});

Route::controller(BeritaController::class)->prefix('beritaback')->group(function() {
    Route::get('', 'index')->name('beritaback');
    Route::get('create', 'create')->name('beritaback.create');
    Route::post('store', 'store')->name('beritaback.store');
    Route::get('edit/{id}', 'edit')->name('beritaback.edit');
    Route::put('edit/{id}', 'update')->name('beritaback.update');
    Route::get('show/{id}', 'show')->name('beritaback.show');
    Route::delete('destroy/{id}', 'destroy')->name('beritaback.destroy');
});

Route::get('berita', [BeritaController::class, 'berita'])->name('berita');
Route::get('post', [BeritaController::class, 'post'])->name('post');
Route::get('detail/{id}', [BeritaController::class, 'detail'])->name('detail');