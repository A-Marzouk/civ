<?php

namespace App\Observers;

use App\Tab;
use App\User;
use App\AvailabilityInfo;
use App\Link;
use App\PaymentInfo;
use App\PersonalInfo;
use App\Referee;
use App\Reference;
use App\Summary;
use Illuminate\Support\Facades\Session;

class UserObserver
{
    /**
     * Handle the user "created" event.
     *
     * @param  \App\User $user
     * @return void
     */
    public function created(User $user)
    {

        $this->assignDefaultValuesForNewUser($user);

    }

    /**
     * Handle the user "updated" event.
     *
     * @param  \App\User $user
     * @return void
     */
    public function updated(User $user)
    {
        //
    }

    /**
     * Handle the user "deleted" event.
     *
     * @param  \App\User $user
     * @return void
     */
    public function deleted(User $user)
    {
        // delete all user relations :

        foreach (User::$defaultOneToOneRelations as $relation) {
            $user->$relation()->delete();
        }

        foreach (User::$defaultOneToManyRelations as $relation) {
            foreach ($user->$relation as $model) {
                $model->delete();
            }
        }

    }

    /**
     * Handle the user "restored" event.
     *
     * @param  \App\User $user
     * @return void
     */
    public function restored(User $user)
    {
        //
    }

    /**
     * Handle the user "force deleted" event.
     *
     * @param  \App\User $user
     * @return void
     */
    public function forceDeleted(User $user)
    {
        //
    }

    protected function assignDefaultValuesForNewUser($user){

        // Main default tabs
        Tab::insert([
            [
                'user_id' => $user->id,
                'order' => 1,
                'is_public' => true,
                'title' => 'work_experience',
                'label' => 'Work Experience'
            ],
            [
                'user_id' => $user->id,
                'order' => 1,
                'is_public' => true,
                'title' => 'education',
                'label' => 'Education'
            ],
            [
                'user_id' => $user->id,
                'order' => 1,
                'is_public' => true,
                'title' => 'skills',
                'label' => 'Skills'
            ],
            [
                'user_id' => $user->id,
                'order' => 1,
                'is_public' => true,
                'title' => 'portfolio',
                'label' => 'Portfolio'
            ],
            [
                'user_id' => $user->id,
                'order' => 1,
                'is_public' => true,
                'title' => 'about_me',
                'label' => 'About Me'
            ],
            [
                'user_id' => $user->id,
                'order' => 1,
                'is_public' => true,
                'title' => 'media',
                'label' => 'Media'
            ]
        ]);

        // personal info
        PersonalInfo::create([
            'user_id' => $user->id,
            'first_name' => $user->name,
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
    }
}
