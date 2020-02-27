<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable,HasRoles,HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','username','email', 'password','api_token','github_id','google_id','linkedin_id','facebook_id','instagram_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function getIsAdminAttribute()
    {
        return $this->hasRole('admin');
    }

    public function getIsAgentAttribute()
    {
        return $this->hasRole('agent');
    }


    // relations has Many
    public function skills(){
        return $this->hasMany(Skill::class);
    }
    public function hobbies(){
        return $this->hasMany(Hobby::class);
    }
}
