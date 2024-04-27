<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'users';

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function games()
    {
        return $this->belongsToMany(Game::class, 'user_games');
    }

    public function teams()
    {
        return $this->belongsToMany(Team::class, 'user_teams');
    }

    public function players()
    {
        return $this->hasMany(Player::class);
    }

    public function scores()
    {
        return $this->hasMany(Score::class);
    }
}
