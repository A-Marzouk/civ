<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    protected $table = 'links';

    protected $fillable = [
        'category','link','link_title','is_active', 'user_id'
    ];


    // relation belongs to
    public function user(){
        return $this->belongsTo(User::class);
    }
}
