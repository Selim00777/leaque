<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    // Определение столбцов таблицы
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    // Отношения
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
