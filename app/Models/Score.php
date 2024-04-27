<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Score extends Model
{
    protected $table = 'scores';

    protected $fillable = [
        'game_id',
        'player_id',
        'team_id',
        'type',
        'time',
    ];

    public function game()
    {
        return $this->belongsTo('App\Models\Game');
    }

    public function player()
    {
        return $this->belongsTo('App\Models\Player');
    }

    public function team()
    {
        return $this->belongsTo('App\Models\Team');
    }
}
