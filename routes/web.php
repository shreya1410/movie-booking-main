<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MoviesController;
use App\Http\Controllers\CastsController;
use App\Http\Controllers\TheatreController;

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


Route::get('/user', function () {
    return view('user/Home');
});


//movies routes
Route::get('all_movies',[MoviesController::class,'allmovies']);
Route::post('save_movies',[MoviesController::class,'savemovies']);
Route::get('edit_movie/{id}',[MoviesController::class,'edit_movie']);
Route::put('update_movie',[MoviesController::class,'update_movie']);
Route::delete('delete_movie/{id}',[MoviesController::class,'deletemovie']);


//cast routes
Route::get('all_cast',[CastsController::class,'allcast']);
Route::post('save_cast',[CastsController::class,'savecast']);
Route::get('edit_cast/{id}',[CastsController::class,'editcast']);
Route::put('update_cast',[CastsController::class,'updatecast']);
Route::delete('delete_cast/{id}',[CastsController::class,'deletecast']);


//Theatre routes
Route::get('all_theatre',[TheatreController::class,'alltheatre']);
Route::post('save_theatre',[TheatreController::class,'savetheatre']);
Route::get('edit_theatre/{id}',[TheatreController::class,'editthetre']);
Route::put('update_theatre',[TheatreController::class,'updatetheatre']);
Route::delete('delete_theatre/{id}',[TheatreController::class,'deletetheatre']);
