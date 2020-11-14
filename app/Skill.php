<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{

    protected $table = 'skills';
    protected $fillable = [
        'is_public','title','category','percentage','user_id','resume_link_id','order'
    ];


    public function user(){
       return $this->belongsTo(User::class);
    }

    /**
     * Receives an skills array and return all the skill categories availables
     *
     * @param Illuminate\Support\Collection $skills
     * @return array
     */
    public static function filterCategories($skills) {
        $categories = [];
        
        $skills->each(function ($item, $key) use (&$categories) {
            if (!in_array($item->category, $categories)) {
                array_push($categories, $item->category);
            }
        });
        return $categories;
    }
}
