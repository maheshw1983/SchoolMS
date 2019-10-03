<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Nicolaslopezj\Searchable\SearchableTrait;
use Carbon\Carbon;

class Event extends Model
{

    use SearchableTrait;

    public $events = null;

    protected $searchable = [

        'columns' => [

            'events.title' => 6,
            'events.venue' => 8,
            'events.description' => 10,
        ],

        'joins' => [

            'users' => ['user_id', 'events.user_id'],

        ]

    ];

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function scopeFilter($query, $filters)
    {


        if (isset($filters['month'])) {

            $query->whereMonth('from_date', Carbon::parse($filters['month'])->month);
        }

        if (isset($filters['year'])) {
            $query->whereYear('from_date', $filters['year']);
        }
    }

    public static function archives()
    {
        return static::selectRaw(' year(from_date) year , monthname(from_date) month')
            ->groupBy('year', 'month')
            ->orderByRaw('min(from_date)')
            ->get();
    }

    public function society()
    {
        return $this->belongsTo(Society::class);
    }


}
