<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Media extends Model
{
    protected $table = 'media';

    protected $fillable = [
        'is_public','title','url','type','transcript','user_id','resume_link_id','media_preview','order'
    ];


    // relation belongs to
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function getUrlAttribute($value){
        if(Str::of($value)->contains('http')){
            return $value;
        }
        return asset('storage/'. $value);
    }

    public function getMediaPreviewAttribute($value){
        return asset('storage/'. $value);
    }
}
