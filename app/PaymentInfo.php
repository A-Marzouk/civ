<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaymentInfo extends Model
{
    protected $table = 'payment_info';

    protected $fillable = [
       'salary','currency','user_id'
    ];


    // relation belongs to
    public function user(){
        return $this->belongsTo(User::class);
    }
}
