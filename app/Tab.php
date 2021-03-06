<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tab extends Model
{
    protected $table ='tabs';
    protected $fillable = [
        'is_public','title','label','order','user_id','resume_link_id'
    ];

    public static $defaultTabs = ['portfolio', 'work_experience', 'education', 'about_me', 'skills', 'media', 'hobbies', 'references', 'achievements', 'pay_availability', 'links'];

    // relation belongs to
    public function user(){
        return $this->belongsTo(User::class);
    }
}
