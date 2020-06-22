<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $table ='projects';
    protected $fillable = [
        'is_public','name','description','link','skills','software','order','user_id'
    ];


    // relation belongs to
    public function user(){
        return $this->belongsTo(User::class);
    }

    // relation has many:
    public function images(){
        return $this->hasMany(ProjectImage::class);
    }
}
