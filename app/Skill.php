<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{

    protected $table = 'skills';
    protected $fillable = [
        'title','category','percentage','user_id'
    ];


    public function user(){
       return $this->belongsTo(User::class);
    }

}
