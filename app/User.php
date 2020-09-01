<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'is_active', 'role_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    function roles() {
        return $this->belongsTo(Role::class, 'role_id');
    }

    function photos() {
        return $this->belongsTo(Photo::class, 'photo_id');
    }

    function posts() {
        return $this->hasMany(Post::class);
    }

    function isAdmin() {
        if($this->roles->name == 'admin') {
            return true;
        }
        return false;
    }

    function isActive() {
        if($this->is_active) {
            return true;
        }
        return false;
    }

}
