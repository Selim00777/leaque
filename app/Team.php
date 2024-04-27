<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $table = 'teams';

    protected $fillable = [
        'name',
        'league_id',
    ];

    public function league()
    {
        return $this->belongsTo('App\Models\League');
    }

    public function players()
    {
        return $this->hasMany('App\Models\Player');
    }

    public function games1()
    {
        return $this->hasMany('App\Models\Game', 'team1_id');
    }

    public function games2()
    {
        return $this->hasMany('App\Models\Game', 'team2_id');
    }
}
