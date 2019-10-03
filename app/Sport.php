<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use Nicolaslopezj\Searchable\SearchableTrait;

class Sport extends Model
{
    use SearchableTrait;

    protected $fillable = [
        'id','name','description','user_id','image','gender','practice_on'
    ];

    public $sports = null;

    protected $searchable = [

        'columns' => [

            'sports.title' => 7,
            'sports.practice_on' => 8,
            'sports.gender' => 9,
            'sports.description' => 10,
        ],

        'joins' => [

            'users' => ['user_id', 'sports.user_id'],

        ]

    ];

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

}



