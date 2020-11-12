<?php

namespace App;

use App\Billing\paymentGatewayInfo;
use App\Traits\Billable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use PayPal\Api\Payment;
use Spatie\Permission\Traits\HasRoles;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;


class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable, HasRoles, HasApiTokens;
    use SoftDeletes;
    use Billable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'username', 'theme_id', 'email', 'password', 'api_token', 'github_id', 'google_id', 'linkedin_id', 'facebook_id', 'instagram_id', 'last_activity', 'resume_link_id', 'deleted_at'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public static $defaultRelations = [
        'permissions',
        'tabs',
        'skills',
        'preferences',
        'paymentMethods',
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
        'subscription',
        'payments',
        'paymentGatewayInfo',
    ];
    public static $excludedFromVersionFilter = [
        'permissions',
        'projects.images',
        'testimonials',
        'languages',
        'resumeLinks',
        'defaultResumeLink',
        'subscription',
        'payments',
        'paymentGatewayInfo',
        'theme',
    ];
    public static $defaultOneToOneRelations = [
        'personalInfo',
        'defaultResumeLink',
        'summary',
        'theme',
        'subscription'
    ];
    public static $defaultOneToManyRelations = [
        'tabs',
        'skills',
        'preferences',
        'paymentMethods',
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
        'last_activity' => 'datetime',
    ];


    public function getIsAdminAttribute()
    {
        return $this->hasRole('admin');
    }

    public function getIsAgentAttribute()
    {
        return $this->hasRole('agent');
    }

    public static function withAllRelations($username, $resume_link_id = '')
    {
        $defaultRelations = self::$defaultRelations;

        if ($resume_link_id !== '') {
            $defaultRelations = [];
            foreach (self::$defaultRelations as $relation) {
                if (in_array($relation, self::$excludedFromVersionFilter)) {
                    $defaultRelations[] = $relation;
                    continue;
                }
                $defaultRelations[$relation] = function ($q) use ($resume_link_id) {
                    $q->where('resume_link_id', $resume_link_id);
                };
            }
            $defaultRelations['projects'] = function ($q) use ($resume_link_id) {
                $q->where('resume_link_id', $resume_link_id);
            };
        }

        return User::where('username', $username)->with($defaultRelations)->first();
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

    public function payments()
    {
        return $this->hasMany(Billing\Payment::class);
    }

    public function preferences()
    {
        return $this->hasMany(Preference::class);
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

    public function paymentMethods()
    {
        return $this->hasMany(PaymentMethod::class);
    }

    // many to many relationships:
    public function languages()
    {
        return $this->belongsToMany(Language::class)->wherePivot('resume_link_id', auth()->user()->resume_link_id ?? null);
    }


    // relations has One
    public function personalInfo()
    {
        return $this->hasOne(PersonalInfo::class);
    }

    public function paymentGatewayInfo()
    {
        return $this->hasOne(paymentGatewayInfo::class);
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

    public function theme()
    {
        return $this->belongsTo(Theme::class);
    }

    public function defaultResumeLink()
    {
        return $this->belongsTo(ResumeLink::class, 'resume_link_id');
    }


    // user helper functions :
    public function updateLastActivity()
    {
        $this->update([
            'last_activity' => Carbon::now()->toDateTimeString()
        ]);
    }

    // user Accessors & Mutators:

    public function getLastActivityAttribute($value)
    {
        $time = new Carbon($value);
        return $time->diffForHumans();
    }

    // Get user links where category == 'social'
    public function getSocialLinks()
    {
        return $this->links->filter(function ($value, $key) {
            return $value->category == 'social';
        });
    }

    public function getPersonalWebsite()
    {
        return $this->links->filter(function ($value, $key) {
            return $value->category == 'professional' && $value->link_title == 'Website';
        })[0];
    }

    public function getPublicWorkExperience()
    {
        return $this->workExperience->filter(function ($value, $key) {
            return $value->is_public;
        });
    }

    public function getPublicEducation()
    {
        return $this->education->filter(function ($value, $key) {
            return $value->is_public;
        });
    }

    public function getPublicSkills()
    {
        return $this->skills->filter(function ($value, $key) {
            return $value->is_public;
        });
    }
}
