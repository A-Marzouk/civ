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
    public function education(){
        return $this->hasMany(Education::class);
    }
    public function workExperience(){
        return $this->hasMany(WorkEx::class);
    }
    public function links(){
        return $this->hasMany(Link::class);
    }
    public function projects()
    {
        return $this->hasMany(Project::class);
    }
    public function achievements()
    {
        return $this->hasMany(Achievement::class);
    }
    public function media()
    {
        return $this->hasMany(Media::class);
    }
    public function references()
    {
        return $this->hasMany(Reference::class);
    }



    // many to many relationships:
    public function languages()
    {
        return $this->belongsToMany(Language::class);
    }



    // relations has One
    public function personalInfo(){
        return $this->hasOne(PersonalInfo::class);
    }
   public function paymentInfo(){
        return $this->hasOne(PaymentInfo::class);
    }

}
