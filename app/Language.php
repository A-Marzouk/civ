<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    protected $table = 'languages';

    public function users(){
        return $this->belongsToMany(User::class);
    }

    public static function englishLanguageID(){
        return Language::where('name', 'english')->first()->id ?? '';
    }
}
