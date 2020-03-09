<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Summary extends Model
{
    protected $table = 'summary';

    protected $fillable = [
        'objective','overview','user_id'
    ];


    // relation belongs to
    public function user(){
        return $this->belongsTo(User::class);
    }
}
