<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['post_id', 'author', 'email', 'photo', 'content', 'is_active'];

    function Post() {
        return $this->belongsTo(Post::class, 'post_id');
    }

    function replies() {
        return $this->hasMany(CommentReply::class);
    }
}
