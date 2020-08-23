<?php

namespace App\Observers;

use App\ResumeLink;
use App\Tab;
use App\User;
use App\AvailabilityInfo;
use App\PaymentInfo;
use App\PersonalInfo;
use App\Summary;

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


        // default resume link
        $resumeLink = ResumeLink::create([
            'user_id' => $user->id,
            'url' => '',
            'theme_id' => 1,
            'order' => 1,
            'is_public' => true
        ]);

        $user->update([
            'resume_link_id' => $resumeLink->id,
        ]);

        // Main default tabs
        Tab::insert([
            [
                'user_id' => $user->id,
                'resume_link_id' => $resumeLink->id,
                'order' => 1,
                'is_public' => true,
                'title' => 'work_experience',
                'label' => 'Work Experience'
            ],
            [
                'user_id' => $user->id,
                'resume_link_id' => $resumeLink->id,
                'order' => 1,
                'is_public' => true,
                'title' => 'education',
                'label' => 'Education'
            ],
            [
                'user_id' => $user->id,
                'resume_link_id' => $resumeLink->id,
                'order' => 1,
                'is_public' => true,
                'title' => 'skills',
                'label' => 'Skills'
            ],
            [
                'user_id' => $user->id,
                'resume_link_id' => $resumeLink->id,
                'order' => 1,
                'is_public' => true,
                'title' => 'portfolio',
                'label' => 'Portfolio'
            ],
            [
                'user_id' => $user->id,
                'resume_link_id' => $resumeLink->id,
                'order' => 1,
                'is_public' => true,
                'title' => 'about_me',
                'label' => 'About Me'
            ],
            [
                'user_id' => $user->id,
                'resume_link_id' => $resumeLink->id,
                'order' => 1,
                'is_public' => true,
                'title' => 'media',
                'label' => 'Media'
            ]
        ]);

        // personal info
        PersonalInfo::create([
            'user_id' => $user->id,
            'resume_link_id' => $resumeLink->id,
            'first_name' => $user->name,
            'email' => $user->email
        ]);


        // payment_info
        PaymentInfo::insert([
            [
                'user_id' => $user->id,
                'resume_link_id' => $resumeLink->id,
                'salary_frequency' => 'hourly',
                'salary' => 3,
                'currency' => 'usd'
            ],
            [
                'user_id' => $user->id,
                'resume_link_id' => $resumeLink->id,
                'salary_frequency' => 'weekly',
                'salary' => 30,
                'currency' => 'usd'
            ],
            [
                'user_id' => $user->id,
                'resume_link_id' => $resumeLink->id,
                'salary_frequency' => 'monthly',
                'salary' => 300,
                'currency' => 'usd'
            ],
            [
                'user_id' => $user->id,
                'resume_link_id' => $resumeLink->id,
                'salary_frequency' => 'yearly',
                'salary' => 3000,
                'currency' => 'usd'
            ]
        ]);

        // availability info
        AvailabilityInfo::insert([
            [
                'user_id' => $user->id,
                'resume_link_id' => $resumeLink->id,
                'available_hours_frequency' => 'weekly',
                'available_hours' => 40
            ],
            [
                'user_id' => $user->id,
                'resume_link_id' => $resumeLink->id,
                'available_hours_frequency' => 'monthly',
                'available_hours' => 400
            ],
            [
                'user_id' => $user->id,
                'resume_link_id' => $resumeLink->id,
                'available_hours_frequency' => 'yearly',
                'available_hours' => 4000
            ]
        ]);

        // summary
        Summary::create([
            'user_id' => $user->id,
            'resume_link_id' => $resumeLink->id,
            'objective' => '',
            'overview' => '',
        ]);
    }
}
