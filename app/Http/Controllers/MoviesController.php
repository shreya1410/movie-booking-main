<?php

namespace App\Http\Controllers;

use App\Models\movies;
use Illuminate\Http\Request;

class MoviesController extends Controller
{
    public function allmovies(){
        $movies = movies::all();
        return response()->json($movies);
    }

    public function savemovies(){
        $movie = new movies();
        $movie->title = request()->title;
        $movie->overview = request()->overview;
        $movie->release_year = request()->release_year;
        $movie->save();
    }

    public function edit_movie($id){
        $movies = movies::find($id);
        return response()->json($movies);

    }

    public function update_movie(){
        $movies = movies::find(request()->id);
        $movies->title = request()->title;
        $movies->overview = request()->overview;
        $movies->release_year = request()->release_year;
        $movies->update();
    }


    public function deletemovie($id){
        $movies = movies::find($id)->delete();
    }
}
