<?php

namespace App\Http\Controllers;

use App\Models\theatre;
use Illuminate\Http\Request;

class TheatreController extends Controller
{
    public function alltheatre(){
        $theatres = theatre::all();
        return response()->json($theatres);

    }

    public function savetheatre(){
        $theatres = new theatre();
        $theatres->name = request()->name;
        $theatres->showtime= request()->showtime;
        $theatres->city = request()->city;
        $theatres->save();

    }

    public function editthetre($id){
        $theatre = theatre::find($id);
        return response()->json($theatre);

    }

    public function updatetheatre(){
        $theatres = theatre::find(request()->id);
        $theatres->name = request()->name;
        $theatres->showtime= request()->showtime;
        $theatres->city = request()->city;
        $theatres->update();
    }

    public function deletetheatre($id){
        $theatre = theatre::find($id)->delete();

    }
}
