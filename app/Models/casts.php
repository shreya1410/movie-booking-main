<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class casts extends Model
{
    use HasFactory;
    public function movies(){
        return $this->belongsToMany('App\Models\movies','movie_cast');
    }
}
