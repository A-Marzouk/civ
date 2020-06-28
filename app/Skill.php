<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{

    protected $table = 'skills';
    protected $fillable = [
        'is_public','title','category','percentage','user_id','order'
    ];


    public function user(){
       return $this->belongsTo(User::class);
    }

}
