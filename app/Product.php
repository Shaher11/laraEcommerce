<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $fillable = [
        'name', 'description', 'image', 'price','type','brands',
    ];


//    //Add Dollar sign
//    public function getPriceAttribute($value){
//
//        $newform = '$'.$value;
//        return $newform;
//    }


}
