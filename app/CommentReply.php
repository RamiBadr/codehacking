<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CommentReply extends Model
{
    protected $fillable = ['comment_id', 'author', 'email', 'photo', 'content', 'is_active'];

    function comment() {
        return $this->belongsTo(Comment::class, 'comment_id');
    }

   
}
