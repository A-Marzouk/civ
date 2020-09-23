<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaymentMethod extends Model
{
    protected $guarded = [];
    protected $table = 'payment_methods';

    // relation belongs to
    public function user(){
        return $this->belongsTo(User::class);
    }

}
