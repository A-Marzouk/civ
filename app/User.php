<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Carbon\Carbon;


class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable, HasRoles, HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'username', 'theme_id', 'email', 'password', 'api_token', 'github_id', 'google_id', 'linkedin_id', 'facebook_id', 'instagram_id','last_activity'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public static $defaultRelations =
        [
            'permissions',
            'tabs',
            'skills',
            'hobbies',
            'education',
            'workExperience',
            'links',
            'projects.images',
            'achievements',
            'media',
            'references',
            'testimonials',
            'imports',
            'downloads',
            'languages',
            'personalInfo',
            'availabilityInfo',
            'paymentInfo',
            'resumeLinks',
            'defaultResumeLink',
            'summary',
            'theme',
            'subscription'
        ];

    public static $defaultOneToOneRelations = [
        'personalInfo',
        'availabilityInfo',
        'paymentInfo',
        'defaultResumeLink',
        'summary',
        'theme',
        'subscription'
    ];
    public static $defaultOneToManyRelations = [
        'tabs',
        'skills',
        'references',
        'hobbies',
        'education',
        'workExperience',
        'links',
        'resumeLinks',
        'projects',
        'achievements',
        'media',
        'testimonials',
        'imports',
        'downloads',
        'languages'
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

    //user with all relations

    public static function withAllRelations($username)
    {
        return User::where('username', $username)->with(self::$defaultRelations)->first();
    }

    public function testName()
    {
        return $this->name;
    }


    // relations has Many
    public function tabs()
    {
        return $this->hasMany(Tab::class)->orderBy('order');
    }

    public function skills()
    {
        return $this->hasMany(Skill::class)->orderBy('order');
    }

    public function downloads()
    {
        return $this->hasMany(Download::class)->orderBy('order');
    }

    public function hobbies()
    {
        return $this->hasMany(Hobby::class)->orderBy('order');
    }

    public function education()
    {
        return $this->hasMany(Education::class)->orderBy('order');
    }

    public function workExperience()
    {
        return $this->hasMany(WorkEx::class)->orderBy('order');
    }

    public function links()
    {
        return $this->hasMany(Link::class)->orderBy('order');
    }

    public function resumeLinks()
    {
        return $this->hasMany(ResumeLink::class)->orderBy('order');
    }

    public function projects()
    {
        return $this->hasMany(Project::class)->orderBy('order');
    }

    public function achievements()
    {
        return $this->hasMany(Achievement::class)->orderBy('order');;
    }

    public function media()
    {
        return $this->hasMany(Media::class)->orderBy('order');;
    }

    public function imports()
    {
        return $this->hasMany(Import::class);
    }

    public function testimonials()
    {
        return $this->hasMany(Testimonial::class);
    }


    // many to many relationships:
    public function languages()
    {
        return $this->belongsToMany(Language::class);
    }


    // relations has One
    public function personalInfo()
    {
        return $this->hasOne(PersonalInfo::class);
    }

    public function subscription()
    {
        return $this->hasOne(Subscription::class);
    }


    public function paymentInfo()
    {
        return $this->hasMany(PaymentInfo::class);
    }

    public function availabilityInfo()
    {
        return $this->hasMany(AvailabilityInfo::class);
    }

    public function summary()
    {
        return $this->hasOne(Summary::class);
    }

    public function references()
    {
        return $this->hasMany(Reference::class);
    }

    public function referee()
    {
        return $this->hasOne(Referee::class);
    }

    public function theme(){
        return $this->belongsTo(Theme::class);
    }

    public function defaultResumeLink(){
        return $this->belongsTo(ResumeLink::class);
    }



    // user helper functions :
    public function updateLastActivity(){
        $this->update([
            'last_activity' => Carbon::now()->toDateTimeString()
        ]);
    }

    // user Accessors & Mutators:

    public function getLastActivityAttribute($value)
    {
        return $this->getTimeDifferenceInSeconds($value);
    }


    protected function getTimeDifferenceInSeconds($value){
        // return time difference in seconds
        $start  = new Carbon(Carbon::now()->toDateTimeString());
        $end    = new Carbon($value);
        $totalDuration = $end->diffInSeconds($start);

        return $totalDuration;
    }

}
