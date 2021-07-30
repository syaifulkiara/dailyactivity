<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ActivityController;

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
Route::get('/print', function () {
    return view('activity.print');
});
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/monitoring', [App\Http\Controllers\MonitoringController::class, 'index'])->name('monitoring');
Route::resource('activity', ActivityController::class);
Route::get('/print', [App\Http\Controllers\PrintController::class, 'index'])->name('print');
Route::get('profile', [App\Http\Controllers\ProfileController::class, 'index'])->name('profile');
Route::get('/profile/{id}/edit', [App\Http\Controllers\ProfileController::class, 'edit'])->name('profile.edit');
Route::post('/profile/{id}/update', [App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');
Route::get('/profile/changepassword', [App\Http\Controllers\ProfileController::class,'changepassword'])->name('changepassword');
Route::post('/profile/updatepassword', [App\Http\Controllers\ProfileController::class,'updatepassword'])->name('updatepassword');
