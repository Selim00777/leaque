<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    protected $table = 'players';

    protected $fillable = [
        'name',
        'team_id',
        'number',
        'position',
    ];

    public function team()
    {
        return $this->belongsTo('App\Models\Team');
    }

    public function scores()
    {
        return $this->hasMany('App\Models\Score');
    }
}
