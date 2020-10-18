<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class PersonalInfo extends Model
{

    protected $table = 'personal_info';
    protected $appends = ['full_name'];
    protected $guarded = [];


    // relation belongs to
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function getProfilePicAttribute($value){
        if(Str::of($value)->contains('holder.png') || Str::of($value)->contains('http')){
            return $value;
        }
        return asset('storage/'. $value);
    }


    public function getFullNameAttribute(){
        return "{$this->first_name} {$this->last_name}";
    }
    public function setFullNameAttribute($value){
        $nameArray = explode(trim($value)," ");
        if(isset($nameArray[0])){
            $this->attributes['first_name'] = $nameArray[0];
        }
        if(isset($nameArray[1])){
            $this->attributes['last_name']  = $nameArray[1];
        }
    }

}
