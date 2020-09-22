<?php

namespace App\Providers;

use App\Observers\ProjectObserver;
use App\Observers\ResumeLinkObserver;
use App\Observers\UserObserver;
use App\Project;
use App\ResumeLink;
use App\User;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Stripe\Stripe;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        User::observe(UserObserver::class);
        Project::observe(ProjectObserver::class);
        ResumeLink::observe(ResumeLinkObserver::class);

        // Stripe key:
        Stripe::setApiKey(config('services.stripe.secret'));

    }
}
