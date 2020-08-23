<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hobby extends Model
{
    protected $table = 'hobbies';
    protected $fillable = [
       'title','category','user_id','resume_link_id','order','is_public'
    ];

    public function user(){
        return  $this->belongsTo(User::class);
    }
}
