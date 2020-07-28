<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tab extends Model
{
    protected $table ='tabs';
    protected $fillable = [
        'is_public','title','label','order','user_id'
    ];

    public static $defaultTabs = ['work_experience', 'education', 'about_me', 'portfolio', 'skills'];

    // relation belongs to
    public function user(){
        return $this->belongsTo(User::class);
    }
}
