<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectImage extends Model
{
    protected $table = 'project_images';
    protected $fillable = ['src','is_main','project_id'];

    // relation belongs to
    public function project(){
        return $this->belongsTo(Project::class);
    }

}
