<?php

namespace App\Http\Controllers;

use App\Models\casts;
use Illuminate\Http\Request;

class CastsController extends Controller
{

    public function allcast()
    {
        $casts = casts::all();
        return response()->json($casts);
    }
    public function savecast(){
         $casts = new casts();
         $casts->name=request()->name;
        $casts->bio = request()->bio;
        $casts->birth_date = request()->birth_date;
        $casts->save();
    }

   public function editcast($id){
        $casts = casts::find($id);
        return response()->json($casts);
   }

   public function updatecast()
   {

       $casts = casts::find(request()->id);
       $casts->name=request()->name;
       $casts->bio = request()->bio;
      // $casts->birth_date = request()->birth_date;
       $casts->update();

   }
   public function deletecast($id){
        $casts = casts::find($id)->delete();
   }
}
