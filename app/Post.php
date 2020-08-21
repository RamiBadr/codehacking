<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    protected $fillable = [ 'user_id', 'category_id', 'photo_id','title', 'content' ];

    function user() {
       return $this->belongsTo(User::class, 'user_id');
    }

    function category() {
       return $this->belongsTo(Category::class, 'category_id');
    }

    function photo() {
        return $this->belongsTo(Photo::class, 'photo_id');
    }
}
