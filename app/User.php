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
            'skills',
            'hobbies',
            'education',
            'workExperience',
            'links',
            'projects.images',
            'achievements',
            'media',
            'reference',
            'referee',
            'testimonials',
            'imports',
            'languages',
            'personalInfo',
            'availabilityInfo',
            'paymentInfo',
            'summary',
            'theme',
            'subscription'
        ];

    public static $defaultOneToOneRelations = [
        'reference',
        'referee',
        'personalInfo',
        'availabilityInfo',
        'paymentInfo',
        'summary',
        'theme',
        'subscription'
    ];
    public static $defaultOneToManyRelations = [
        'skills',
        'hobbies',
        'education',
        'workExperience',
        'links',
        'projects',
        'achievements',
        'media',
        'testimonials',
        'imports',
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
    public function skills()
    {
        return $this->hasMany(Skill::class);
    }

    public function hobbies()
    {
        return $this->hasMany(Hobby::class);
    }

    public function education()
    {
        return $this->hasMany(Education::class);
    }

    public function workExperience()
    {
        return $this->hasMany(WorkEx::class);
    }

    public function links()
    {
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

    public function reference()
    {
        return $this->hasOne(Reference::class);
    }

    public function referee()
    {
        return $this->hasOne(Referee::class);
    }

    public function theme(){
        return $this->belongsTo(Theme::class);
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
