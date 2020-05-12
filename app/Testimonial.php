<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    protected $table = 'testimonials';
    protected $fillable = [
        'is_public','name','company','title','description','user_id'
    ];

    // relation belongs to
    public function user(){
        return $this->belongsTo(User::class);
    }
}
