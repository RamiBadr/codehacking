<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $prefix = 'images/';
    protected $fillable = ['path'];


    function getPathAttribute($value) {
        return $this->prefix . $value;
    } 
}
