<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Score extends Model
{
    // Определите столбцы таблицы "scores"
    protected $fillable = [
        'game_id',
        'team_id',
        'player_id',
        'score',
        'created_at',
        'updated_at',
    ];

    // Определите отношения с другими моделями
    public function game()
    {
        return $this->belongsTo(Game::class);
    }

    public function team()
    {
        return $this->belongsTo(Team::class);
    }

    public function player()
    {
        return $this->belongsTo(Player::class);
    }
}
