<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PersonalInfo extends Model
{

    protected $table = 'personal_info';
    protected $appends = ['full_name'];

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'designation',
        'user_id',
        'profile_pic',

        'nationality',
        'is_nationality_active',

        'quote',
        'is_quote_active',

        'hometown',
        'is_hometown_active',

        'date_of_birth',
        'is_date_of_birth_active',

        'location',
        'is_location_active',

        'phone',
        'is_phone_active',

        'about',
        'is_about_active',

        'overview',
        'is_overview_active'
    ];


    // relation belongs to
    public function user(){
        return $this->belongsTo(User::class);
    }


    public function getFullNameAttribute(){
        return "{$this->first_name} {$this->last_name}";
    }

}
