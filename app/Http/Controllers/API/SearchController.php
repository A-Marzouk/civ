<?php

namespace App\Http\Controllers\API;


use App\Http\Controllers\Controller;
use App\ResumeLink;
use App\User;
use Illuminate\Support\Facades\URL;

class SearchController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function getApprovedProfiles(){
        // return all approved civ profiles.
    }

    public function getWorkForceVisibleProfiles(){

        $user = User::where('username', '123workforce')->firstOrFail();

        $profiles = ResumeLink::where([
            ['user_id', $user->id],
            ['url','!=', ''],
            ['is_public', '1'],
        ])->get();


        return $this->formatResults($profiles);
    }

    protected function formatResults($profiles){
        $users=[];

        foreach ($profiles as $profile){
            $user = User::withAllRelations('123workforce', $profile->id);
            $baseURL = URL::to('/');

            $formattedUser = [
                'id'=> $profile->id,
                'name' => $user->personalInfo->first_name . ' ' . $user->personalInfo->last_name,
                'job_title' => $user->personalInfo->designation,
                'location' => $user->personalInfo->location,
                'preview' => 'resumeApp/public/images/theme-holder.svg',
                'url' => $baseURL . '/' . $user->username . '/' . $profile->url,
                // new end points:
                'avatar'=> $user->personalInfo->profile_pic,
                'hourlyRate'=> $user->paymentInfo[0]->salary,
                'projects' => $user->projects,
                'skills' => $user->skills,
            ];

            $users[] = $formattedUser;
        }

        return $users;
    }

}