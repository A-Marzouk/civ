<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AvailabilityInfo extends Model
{

    protected $table = 'availability_info';

    protected $fillable = [
        'is_public','available_hours', 'user_id','resume_link_id'
    ];


    // relation belongs to
    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
