<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

//dit model is voor de laatste nieuwes ondergedeelte van de vereiste
class Nieuws extends Model{
    
    protected $fillable = ['titel','nieuws','foto','verzondenOp'];



    protected $casts = ['verzondenOp' => 'datetime',];
}
