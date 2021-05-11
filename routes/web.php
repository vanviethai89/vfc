<?php

use App\Http\Controllers\PrayerController;
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

//Route::get('/', function () {
//    return view('welcome');
//});

Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/', [App\Http\Controllers\PrayerController::class, 'index'])->name('prayer.index');
Route::get('/prayer/{id}', [App\Http\Controllers\PrayerController::class, 'show'])->name('prayer.show');
Route::get('/prayer/create', [App\Http\Controllers\PrayerController::class, 'create'])->name('prayer.create');
Route::post('/prayer', [App\Http\Controllers\PrayerController::class, 'store'])->name('prayer.store');
Route::get('/prayer/{id}/edit', [App\Http\Controllers\PrayerController::class, 'edit'])->name('prayer.edit');
Route::put('/prayer/{id}', [App\Http\Controllers\PrayerController::class, 'update'])->name('prayer.update');
Route::delete('/prayer/{id}', [App\Http\Controllers\PrayerController::class, 'destroy'])->name('prayer.destroy');

Route::post('/prayer/{id}/increase-total-prayer', [App\Http\Controllers\PrayerController::class, 'increaseTotalPrayer'])->name('prayer.increase_total_prayer');
