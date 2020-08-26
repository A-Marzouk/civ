<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Promocode extends Model
{
    protected $table = 'promocodes';
    protected $fillable = [
        'name','free_period','expires_at','is_active'
    ];
    // relations belongs to many
    public function subscription(){
        return $this->belongsToMany(Subscription::class);
    }

}
