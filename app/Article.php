<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $guarded = [];

    public function author()
    {
//        return $this->belongsTo(User::class); // this looks for user_id == function name + id
        return $this->belongsTo(User::class, 'user_id'); // this looks for user_id == function name + id
    }

    public function tag()
    {
        return $this->belongsToMany(Tag::class);
    }
}
