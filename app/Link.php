<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    protected $table = 'links';

    protected $fillable = [
        'is_public', 'category', 'link', 'link_title', 'is_active', 'user_id','resume_link_id', 'order'
    ];

    public $categories = [
        'professional',
        'social',
        'contact'
    ];

    // relation belongs to
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
