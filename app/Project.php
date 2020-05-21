<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{

    public function user()
    {
        return $this->belongsTo(User::class); // Similar to "SELECT * FROM user where project_id = this->$id"
    }

}

