<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    protected $table = 'media';

    protected $fillable = [

    ];


    // relation belongs to
    public function user(){
        return $this->belongsTo(User::class);
    }
}
