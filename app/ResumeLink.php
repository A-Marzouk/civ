<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ResumeLink extends Model
{
    protected $guarded = [];

    public function users()
    {
        return $this->hasMany(User::class);
    }

}
