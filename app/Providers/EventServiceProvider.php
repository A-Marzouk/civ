<?php

namespace App\Providers;

use App\AvailabilityInfo;
use App\Link;
use App\PaymentInfo;
use App\PersonalInfo;
use App\Referee;
use App\Reference;
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

        User::created(function ($user) {
            // create default one to one relations needed for user.

            // personal info
            PersonalInfo::create([
                'user_id' => $user->id,
                'full_name' => $user->name,
                'email' => $user->email
            ]);

            // payment_info
            PaymentInfo::insert([
                [
                    'user_id' => $user->id,
                    'salary_frequency' => 'hourly',
                    'salary' => 3,
                    'currency' => 'usd'
                ],
                [
                    'user_id' => $user->id,
                    'salary_frequency' => 'weekly',
                    'salary' => 30,
                    'currency' => 'usd'
                ],
                [
                    'user_id' => $user->id,
                    'salary_frequency' => 'monthly',
                    'salary' => 300,
                    'currency' => 'usd'
                ],
                [
                    'user_id' => $user->id,
                    'salary_frequency' => 'yearly',
                    'salary' => 3000,
                    'currency' => 'usd'
                ]
            ]);

            // availability info
            AvailabilityInfo::insert([
                [
                    'user_id' => $user->id,
                    'available_hours_frequency' => 'weekly',
                    'available_hours' => 40
                ],
                [
                    'user_id' => $user->id,
                    'available_hours_frequency' => 'monthly',
                    'available_hours' => 400
                ],
                [
                    'user_id' => $user->id,
                    'available_hours_frequency' => 'yearly',
                    'available_hours' => 4000
                ]
            ]);

            // summary
            Summary::create([
                'user_id' => $user->id,
                'objective' => '',
                'overview' => '',
            ]);

            // Reference
            Reference::create([
                'user_id' => $user->id,
            ]);

            // Referee
            Referee::create([
                'user_id' => $user->id,
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
