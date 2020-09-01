<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Post extends Model
{

    use Sluggable;

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */

    protected $fillable = [ 'user_id', 'category_id', 'photo_id', 'title', 'content', 'slug'];

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title',
                'onUpdate' => true
            ],
            'alternate' => [
                'source' => 'subtitle',
            ]
        ];
    }

    function user() {
       return $this->belongsTo(User::class, 'user_id');
    }

    function category() {
       return $this->belongsTo(Category::class, 'category_id');
    }

    function photo() {
        return $this->belongsTo(Photo::class, 'photo_id');
    }

    function comments() {
        return $this->hasMany(Comment::class);
    }
}
