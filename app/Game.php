<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Match extends Model
{
    // Определение столбцов таблицы
    protected $fillable = [
        'date',
        'time',
        'team_1_id',
        'team_2_id',
        'score_team_1',
        'score_team_2',
    ];

    // Отношения
    public function team1()
    {
        return $this->belongsTo(Team::class, 'team_1_id');
    }

    public function team2()
    {
        return $this->belongsTo(Team::class, 'team_2_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}

