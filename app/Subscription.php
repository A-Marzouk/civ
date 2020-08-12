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
        'customer_id',
        'paypal_agreement_id',
        'user_id',
        'promocode_id',
    ];

    // relations belongs to
    public function user(){
        return $this->belongsTo(User::class);
    }

    // relations has one:
    public function promocode(){
        return $this->hasOne(Promocode::class);
    }


}
