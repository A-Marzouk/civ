<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    protected $table = 'education';
    protected $fillable = [
        'is_public','institution_type','university_name','degree_title','date_from','date_to','present','user_id','resume_link_id','website','description','category','order','location'
    ];

    // relation belongs to
    public function user(){
        return $this->belongsTo(User::class);
    }

}
