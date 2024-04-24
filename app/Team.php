<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    // Определение столбцов таблицы
    protected $fillable = [
        'name',
        'city',
        'foundation_date',
    ];

    // Отношения
    public function players()
    {
        return $this->hasMany(Player::class);
    }

    public function matches()
    {
        return $this->belongsToMany(Match::class);
    }
}
