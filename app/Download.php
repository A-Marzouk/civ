<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Download extends Model
{
    protected $table ='downloads';
    protected $fillable = [
        'is_public','title','label','url','order','user_id','resume_link_id'
    ];


    // relation belongs to
    public function user(){
        return $this->belongsTo(User::class);
    }
}
