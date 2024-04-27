<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    protected $table = 'games';

    protected $fillable = [
        'date',
        'time',
        'location',
        'team1_id',
        'team2_id',
        'score1',
        'score2',
    ];

    public function team1()
    {
        return $this->belongsTo('App\Models\Team', 'team1_id');
    }

    public function team2()
    {
        return $this->belongsTo('App\Models\Team', 'team2_id');
    }

    public function scores()
    {
        return $this->hasMany('App\Models\Score');
    }

    public function comments()
    {
        return $this->hasMany('App\Models\Comment');
    }
}
