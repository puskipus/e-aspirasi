<?php

use App\Http\Controllers\Aspirasi\DeleteAspirasiContoller;
use App\Http\Controllers\Aspirasi\DeleteKomentarController;
use App\Http\Controllers\Aspirasi\ShowMasingAspirasiController as AspirasiShowMasingAspirasiController;
use App\Http\Controllers\Aspirasi\StoreAspirasiController;
use App\Http\Controllers\Aspirasi\StoreKomentarController;
use App\Http\Controllers\Aspirasi\updateStatusController;
use App\Http\Controllers\ShowAspirasi;
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

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', ShowAspirasi::class)->middleware(['auth'])->name('dashboard');

Route::post('aspirasi', StoreAspirasiController::class)->name('aspirasi.store');
Route::get('aspirasi/{aspirasi}', AspirasiShowMasingAspirasiController::class)->name('aspirasi.show');
Route::post('aspirasi/{aspirasi}/komentar', StoreKomentarController::class)->name('aspirasi.komentar.store');
Route::post('aspirasi/{aspirasi}/status', updateStatusController::class)->name('aspirasi.update.status');
Route::delete('aspirasi/{aspirasi}/komentar/{komentar}', DeleteKomentarController::class)->name('aspirasi.komentar.destroy');
Route::delete('aspirasi/{aspirasi}', DeleteAspirasiContoller::class)->name('aspirasi.destroy');

require __DIR__.'/auth.php';
