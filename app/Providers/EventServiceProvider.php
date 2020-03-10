<?php

namespace App\Providers;

use App\Link;
use App\PaymentInfo;
use App\PersonalInfo;
use App\Summary;
use App\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        \SocialiteProviders\Manager\SocialiteWasCalled::class => [
            // add your listeners (aka providers) here
            'SocialiteProviders\\Instagram\\InstagramExtendSocialite@handle',
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        User::created(function($user)
        {
            // create default one to one relations needed for user.

                // personal info
            PersonalInfo::create([
                'user_id' => $user->id,
                'full_name' => $user->name,
                'email' => $user->email
            ]);

                // payment_info
            PaymentInfo::create([
                'user_id' => $user->id,
                'salary_frequency' => 'hourly',
                'salary' => 3,
                'available_hours_frequency' => 'weekly',
                'available_hours' => 40
            ]);

            // summary
            Summary::create([
                'user_id' => $user->id,
                'objective' => '',
                'overview' => '',
            ]);

            // Profile Link
            Link::create([
                'user_id' => $user->id,
                'category' => 'profile_link',
            ]);

            // Payment Link
            Link::create([
                'user_id' => $user->id,
                'category' => 'payment_link',
            ]);

        });
    }
}
