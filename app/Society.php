<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Nicolaslopezj\Searchable\SearchableTrait;

class Society extends Model
{
    use SearchableTrait;

    public $societies = null;

    protected $fillable = [
        'title','meetingsOn','description','president','image','secretary','treasurer'
    ];

    protected $searchable = [

        'columns' => [

            'societies.title' => 1,
            'societies.meetingsOn' => 3,
            'societies.description' => 4,
        ],

        'joins' => [

            'users' => ['user_id', 'societies.user_id'],

        ]

    ];

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function events()
    {
        return $this->hasMany(Event::class);
    }

}
