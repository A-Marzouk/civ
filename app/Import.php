<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Import extends Model
{
    protected $table = 'imports';
    protected $fillable = [
        'title','url','user_id'
    ];

    public function user(){
        return  $this->belongsTo(User::class);
    }
}
