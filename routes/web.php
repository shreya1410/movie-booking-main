<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MoviesController;
use App\Http\Controllers\CastsController;

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


Route::get('all_movies',[MoviesController::class,'allmovies']);
Route::post('save_movies',[MoviesController::class,'savemovies']);
Route::get('edit_movie/{id}',[MoviesController::class,'edit_movie']);
Route::put('update_movie',[MoviesController::class,'update_movie']);
Route::delete('delete_movie/{id}',[MoviesController::class,'deletemovie']);



Route::get('all_cast',[CastsController::class,'allcast']);
Route::post('save_cast',[CastsController::class,'savecast']);
Route::get('edit_cast/{id}',[CastsController::class,'editcast']);
Route::put('update_cast',[CastsController::class,'updatecast']);
Route::delete('delete_cast/{id}',[CastsController::class,'deletecast']);
