<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PersonalInfo extends Model
{

    protected $table = 'personal_info';

    protected $fillable = [
        'full_name','email','designation', 'phone','about','user_id'
    ];


    // relation belongs to
    public function user(){
        return $this->belongsTo(User::class);
    }
}
