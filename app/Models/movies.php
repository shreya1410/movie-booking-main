<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class movies extends Model
{
    use HasFactory;
    protected $guarded=[];
    public function theatre(){
        return $this->belongsToMany('App\Models\theatre','movie_theatres');
    }

    public function casts(){
        return $this->belongsToMany('App\Models\casts','movie_cast');
    }
}
