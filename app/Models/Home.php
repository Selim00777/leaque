<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Home extends Model
{
    // No additional methods or relationships needed for basic usage

    protected $fillable = [
        'title',
        'description',
        'welcome_message',
    ];
}
