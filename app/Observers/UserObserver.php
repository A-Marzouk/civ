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
            'title' => 'default',
            'theme_id' => 1,
            'order' => 1,
            'is_public' => true
        ]);

        $user->update([
            'resume_link_id' => $resumeLink->id,
        ]);
    }
}
