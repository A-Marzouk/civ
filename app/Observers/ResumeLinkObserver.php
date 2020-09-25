<?php

namespace App\Observers;

use App\AvailabilityInfo;
use App\PaymentInfo;
use App\PersonalInfo;
use App\ResumeLink;
use App\Summary;
use App\Tab;
use App\User;
use Illuminate\Database\Eloquent\Builder;

class ResumeLinkObserver
{
    /**
     * Handle the ResumeLink "created" event.
     *
     * @param  \App\ResumeLink  $resumeLink
     * @return void
     */
    public function created(ResumeLink $resumeLink)
    {
        $this->assignDefaultValuesForNewResumeLink($resumeLink);
    }

    /**
     * Handle the ResumeLink "updated" event.
     *
     * @param  \App\ResumeLink  $resumeLink
     * @return void
     */
    public function updated(ResumeLink $resumeLink)
    {
        //
    }

    /**
     * Handle the ResumeLink "deleted" event.
     *
     * @param  \App\ResumeLink  $resumeLink
     * @return void
     */
    public function deleted(ResumeLink $resumeLink)
    {

        // delete all user relations that has the resume_link_id of the deleted resume link.


        $user = User::withTrashed()->where([
            'id' => $resumeLink->user_id,
        ])->first();

        foreach (User::$defaultOneToOneRelations as $relation) {
            if(in_array($relation, User::$excludedFromVersionFilter)){
                continue;
            }

            $user->$relation()
                ->where(function (Builder $query) use ($resumeLink) {
                return $query->where('resume_link_id', $resumeLink->id);
            })->delete();

        }

        foreach (User::$defaultOneToManyRelations as $relation) {
            if(in_array($relation, User::$excludedFromVersionFilter)){
                continue;
            }

            $relations = $user->$relation()
                ->where(function (Builder $query) use ($resumeLink) {
                    return $query->where('resume_link_id', $resumeLink->id);
                })->get();

            foreach ($relations as $model) {
                $model->delete();
            }
        }

        $defaultResumeLink = ResumeLink::where([
            ['url',''],
            ['user_id', $user->id]
        ])->first();

        if($defaultResumeLink){
            $user->update([
                'resume_link_id' => $defaultResumeLink->id
            ]);
        }

    }

    /**
     * Handle the ResumeLink "restored" event.
     *
     * @param  \App\ResumeLink  $resumeLink
     * @return void
     */
    public function restored(ResumeLink $resumeLink)
    {
        //
    }

    /**
     * Handle the ResumeLink "force deleted" event.
     *
     * @param  \App\ResumeLink  $resumeLink
     * @return void
     */
    public function forceDeleted(ResumeLink $resumeLink)
    {
        //
    }

    protected function assignDefaultValuesForNewResumeLink($resumeLink){
        // Main default tabs
        
        $user = User::find($resumeLink->user_id);
        $defaultTabs = [];
        foreach (Tab::$defaultTabs as $index => $tabTitle){
            $defaultTabs[] = [
                'user_id' => $user->id,
                'resume_link_id' => $resumeLink->id,
                'order' => $index + 1,
                'is_public' => true,
                'title' => $tabTitle,
                'label' => ucwords(str_replace('_',' ', $tabTitle))
            ];
        }

        Tab::insert($defaultTabs);

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
                'salary' => 10,
                'currency' => 'usd'
            ],
            [
                'user_id' => $user->id,
                'resume_link_id' => $resumeLink->id,
                'salary_frequency' => 'weekly',
                'salary' => 100,
                'currency' => 'usd'
            ],
            [
                'user_id' => $user->id,
                'resume_link_id' => $resumeLink->id,
                'salary_frequency' => 'monthly',
                'salary' => 1000,
                'currency' => 'usd'
            ],
            [
                'user_id' => $user->id,
                'resume_link_id' => $resumeLink->id,
                'salary_frequency' => 'yearly',
                'salary' => 10000,
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
