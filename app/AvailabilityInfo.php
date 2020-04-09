<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AvailabilityInfo extends Model
{

    protected $table = 'availability_info';

    protected $fillable = [
        'available_hours', 'available_hours_frequency', 'user_id'
    ];


    // relation belongs to
    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
