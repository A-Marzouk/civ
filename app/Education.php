<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    protected $table = 'education';
    protected $fillable = [
        'institution_type','university_name','degree_title','date_from','date_to','present','user_id'
    ];

}
