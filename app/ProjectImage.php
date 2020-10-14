<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class ProjectImage extends Model
{
    protected $table = 'project_images';
    protected $fillable = ['src','is_main','project_id'];

    // relation belongs to
    public function project(){
        return $this->belongsTo(Project::class);
    }

    public function getSrcAttribute($value){
        if(Str::of($value)->contains('http') || Str::of($value)->contains('projectImages')){
            return $value;
        }
        return asset('storage/'. $value);
    }


}
