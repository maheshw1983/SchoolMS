<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password' , 'role_id','gender', 'birthday'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function sports()
    {
        return $this->belongsToMany(Sport::class);
    }

    public function societies()
    {
        return $this->belongsToMany(Society::class);
    }

    public function isAdmin()
    {
        if($this->admin)
        {
            return true;
        }

        return false;
    }


}
