<?php

namespace App\Observers;

use App\Mail\AccountDeactivated;
use App\Mail\AccountRestored;
use App\ResumeLink;
use App\Tab;
use App\User;
use App\AvailabilityInfo;
use App\PaymentInfo;
use App\PersonalInfo;
use App\Summary;
use Illuminate\Support\Facades\Mail;

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
     * Handle the user "before deleting" event.
     *
     * @param  \App\User $user
     * @return void
     *
     */

    public function deleting(User $user)
    {
        // delete all user relations : // TODO: subscription hold off.
        if($user->isForceDeleting()){
            // delete resume links:
            $resumeLinks = $user->resumeLinks;
            foreach ($resumeLinks as $link){
                $link->delete();
            }

            // delete subscription:
            $subscription = $user->subscription;
            if($subscription){
                $subscription->delete();
            }


            // delete subscription:
            $permissions = $user->permissions;
            if($permissions){
                foreach ($permissions as $permission){
                    $permission->delete();
                }
            }
        }else{
            // soft delete
            $this->notifyUser($user);
        }

    }

    protected function notifyUser($user){
        Mail::to($user)->send(new AccountDeactivated($user));
    }


    /**
     * Handle the user "deleted" event.
     *
     * @param  \App\User $user
     * @return void
     */
    public function deleted(User $user)
    {


    }

    /**
     * Handle the user "restored" event.
     *
     * @param  \App\User $user
     * @return void
     */
    public function restored(User $user)
    {
        // send a notification email that he is restored.
        Mail::to($user)->send(new AccountRestored($user));
        // TODO: Cancel cron jobs reminders.
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
            'title' => 'civ.ie/',
            'theme_id' => 1,
            'order' => 1,
            'is_public' => true
        ]);

        $user->update([
            'resume_link_id' => $resumeLink->id,
        ]);
    }
}
