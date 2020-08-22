<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    protected $table = 'media';

    protected $fillable = [
        'is_public','title','url','type','transcript','user_id','resume_link_id','order'
    ];


    // relation belongs to
    public function user(){
        return $this->belongsTo(User::class);
    }
}
