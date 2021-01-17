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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::post('/check/{festival}', [App\Http\Controllers\ChecksController::class, 'store']);
Route::post('/status/{festival}', [App\Http\Controllers\FestivalController::class, 'statusUpdate']);

Route::get('/festival/create', [App\Http\Controllers\FestivalController::class, 'create']);
Route::post('/festival', [App\Http\Controllers\FestivalController::class, 'store']);
Route::get('/festival/{festival}', [App\Http\Controllers\FestivalController::class, 'show'])->name('festivalprofile.show');
Route::get('/festival/{festival}/edit', [App\Http\Controllers\FestivalController::class, 'edit'])->name('festivalprofile.edit');
Route::post('/festival/{festival}/comments', [App\Http\Controllers\CommentController::class, 'store']);
Route::patch('/festival/{festival}', [App\Http\Controllers\FestivalController::class, 'update'])->name('festivalprofile.update');
Route::delete('/festival/delete/{festival}', [App\Http\Controllers\FestivalController::class, 'delete'])->name('festivalprofile.delete');

Route::delete('/comment/delete/{festivalComment}', [App\Http\Controllers\CommentController::class, 'delete'])->name('comment.delete');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/search', [App\Http\Controllers\SearchController::class, 'search']);


Route::get('/user/{user}', [App\Http\Controllers\UserProfileController::class, 'index'])->name('userprofile.show');
Route::get('/user/{user}/edit', [App\Http\Controllers\UserProfileController::class, 'edit'])->name('userprofile.edit');
Route::patch('/user/{user}', [App\Http\Controllers\UserProfileController::class, 'update'])->name('userprofile.update');
Route::delete('/user/delete/{user}', [App\Http\Controllers\UserProfileController::class, 'delete'])->name('userprofile.delete');

Route::get('/admin/festival', [App\Http\Controllers\AdminController::class, 'indexFestival']);
Route::get('/admin/user', [App\Http\Controllers\AdminController::class, 'indexUser']);


