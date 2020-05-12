<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Referee extends Model
{
    protected $table= 'referee';
    protected $fillable = [
        'is_public','user_id','name','title','phone','email','contact_email','company','address','reference_text','notes'
    ];


    // relation belongs to
    public function user(){
        return $this->belongsTo(User::class);
    }
}
