<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    // Определение столбцов таблицы
    protected $fillable = [
        'user_id',
        'match_id',
        'content',
        'created_at',
        'updated_at',
    ];

    // Отношения
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function match()
    {
        return $this->belongsTo(Match::class);
    }
}
