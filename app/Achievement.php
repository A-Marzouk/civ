<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Achievement extends Model
{

    protected $table = 'achievements';
    protected $fillable = [
        'is_public','type','title','year','description','image_src','url','user_id','category','order'
    ];

    // relation belongs to
    public function user(){
        return $this->belongsTo(User::class);
    }
}
