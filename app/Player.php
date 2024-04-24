<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    // Определение столбцов таблицы
    protected $fillable = [
        'name',
        'surname',
        'date_of_birth',
        'team_id',
    ];

    // Отношения
    public function team()
    {
        return $this->belongsTo(Team::class);
    }

    public function matches()
    {
        return $this->belongsToMany(Match::class);
    }
}

