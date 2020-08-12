<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Promocode extends Model
{
    protected $table = 'promocodes';

    // relations belongs to many
    public function subscription(){
        return $this->belongsToMany(Subscription::class);
    }

}
