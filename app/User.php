<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function articles()
    {
        return $this->hasMany(Article::class); // Similar to "SELECT * FROM articles WHERE user_id = $this->id"
    }

    public function projects()
    {
        return $this->hasMany(Article::class); // Similar to "SELECT * FROM projects WHERE user_id = $this->id"
    }
}

// Considering those functions as SQL queries, we have with the following code, this output
// $user = User::find(1)   // equals: "SELECT * FROM user WHERE id = 1"
// $user->projects  // equals: "SELECT * FROM projects WHERE user_id = $this->id"
