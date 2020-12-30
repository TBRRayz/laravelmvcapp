<?php

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

Route::get('/festival/create', [App\Http\Controllers\FestivalController::class, 'create']);
Route::post('/festival', [App\Http\Controllers\FestivalController::class, 'store']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/user/{user}', [App\Http\Controllers\UserProfileController::class, 'index'])->name('userprofile.show');
Route::get('/festival/{festival}', [App\Http\Controllers\FestivalProfileController::class, 'index'])->name('festivalprofile.show');
