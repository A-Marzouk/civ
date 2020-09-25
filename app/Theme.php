<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Theme extends Model
{

    protected $table = 'themes';
    protected $fillable = [
        'title',
        'category',
        'job_title',
        'emotions',
        'design_style',
        'color',
        'code',
        'developer',
        'is_active',
        'image',
        'order',
    ];


    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function getSlugAttribute(): string
    {
        return str_slug($this->title);
    }

    public function getUrlAttribute(): string
    {
        return action('ResumeController@themePreview', [$this->id, $this->slug]);
    }
}
