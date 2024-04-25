<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Hash;

class User extends Model
{
    use SoftDeletes;

    // Table name in the database
    protected $table = 'users';

    // Fillable attributes (columns that can be updated)
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'team_id',
        'profile_picture',
    ];

    // Hidden attributes (columns that should not be returned in JSON responses)
    protected $hidden = [
        'password',
        'remember_token',
    ];

    // Cast attributes (data types for specific columns)
    protected $casts = [
        'email' => 'string',
        'password' => 'string',
        'role' => 'string',
        'team_id' => 'integer',
    ];

    // Define relationships with other models
    public function team()
    {
        return $this->belongsTo(Team::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function games()
    {
        return $this->belongsToMany(Game::class);
    }

    public function statistics()
    {
        return $this->hasOne(UserStatistic::class);
    }

    public function followers()
    {
        return $this->belongsToMany(User::class, 'user_followers', 'user_id', 'follower_id');
    }

    public function following()
    {
        return $this->belongsToMany(User::class, 'user_followers', 'follower_id', 'user_id');
    }

    // Custom methods
    public function isPlayer()
    {
        return $this->role === 'player';
    }

    public function isAdmin()
    {
        return $this->role === 'admin';
    }

    public function isCoach()
    {
        return $this->role === 'coach';
    }

    public function isFan()
    {
        return $this->role === 'fan';
    }

    // Set the password attribute as hashed before saving
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = Hash::make($value);
    }

    // Check if the user is following another user
    public function isFollowing($userId)
    {
        return $this->following()->where('user_id', $userId)->exists();
    }

    // Follow another user
    public function follow($userId)
    {
        $this->following()->attach($userId);
    }

    // Unfollow another user
    public function unfollow($userId)
    {
        $this->following()->detach($userId);
    }
}
