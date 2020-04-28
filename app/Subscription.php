<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{

    protected $table = 'subscriptions';

    protected $fillable= [
        'payment_method',
        'sub_frequency',
        'sub_status',
        'sub_id',
        'user_id',
    ];

    // relation belongs to
    public function user(){
        return $this->belongsTo(User::class);
    }


}
