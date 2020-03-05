<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WorkEx extends Model
{
    protected $table = 'work_experience';
    protected $fillable = [
        'company_name','job_title','description','website','date_from','date_to','present','user_id'
    ];
}
