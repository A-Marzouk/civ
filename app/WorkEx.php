<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WorkEx extends Model
{
    protected $table = 'work_experience';
    protected $fillable = [
        'is_public','order','company_name','job_title','description','website','date_from','date_to','present','category','user_id','resume_link_id'
    ];


    // relation belongs to :

    public function user(){
        return $this->belongsTo(User::class);
    }
}
