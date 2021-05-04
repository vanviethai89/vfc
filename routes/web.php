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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/prayer', [App\Http\Controllers\PrayerController::class, 'index'])->name('prayer');
Route::get('/prayer/create', [App\Http\Controllers\PrayerController::class, 'create'])->name('prayer.create');
Route::post('/prayer/create', [App\Http\Controllers\PrayerController::class, 'store'])->name('prayer.store');
Route::get('/prayer/edit/{id}', [App\Http\Controllers\PrayerController::class, 'edit'])->name('prayer.edit');
Route::put('/prayer/update/{id}', [App\Http\Controllers\PrayerController::class, 'update'])->name('prayer.update');
Route::delete('/prayer/delete/{id}', [App\Http\Controllers\PrayerController::class, 'delete'])->name('prayer.delete');
