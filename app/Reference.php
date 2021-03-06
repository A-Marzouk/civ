<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reference extends Model
{
    protected $table= 'references';
    protected $fillable = [
        'is_public','user_id','resume_link_id','name','title','phone','email','company','address','reference_text','notes','type','url','image','order'
    ];


    // relation belongs to
    public function user(){
        return $this->belongsTo(User::class);
    }
}
