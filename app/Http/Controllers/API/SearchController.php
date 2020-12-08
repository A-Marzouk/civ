<?php

namespace App\Http\Controllers\API;


use App\Http\Controllers\Controller;
use App\ResumeLink;
use App\User;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;

class SearchController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function getApprovedProfiles(){
        // return all approved civ profiles.
    }

    public function getWorkForceVisibleProfiles($count = 25 ){

        $user = User::where('username', '123workforce')->firstOrFail();

        $paginatedResult = ResumeLink::where([
            ['user_id', $user->id],
            ['url','!=', ''],
            ['is_public', '1']
        ])->paginate(request('count') ?? $count)->toArray();


        $paginatedResult["data"] = $this->formatResults($paginatedResult["data"]);


        return $paginatedResult;

    }

    protected function formatResults($profiles){
        $users=[];

        foreach ($profiles as $profile){
            $user = User::withAllRelations('123workforce', $profile['id']);
            $baseURL = URL::to('/');

            $projects = $user->projects ;

            foreach ($projects as $project){
                foreach ($project->images as &$image){
                    if(Str::of($image->src)->contains('behance.net')){
                        // image from Behance
                        $image['preview'] = str_replace('original','202', $image->src);
                    }else{
                        $image['preview'] = str_replace('projects_media','projects_media_resized', $image->src);
                    }
                }
            }

            $formattedUser = [
                'id'=> $profile['id'],
                'name' => $user->personalInfo->first_name . ' ' . $user->personalInfo->last_name,
                'job_title' => $user->personalInfo->designation,
                'location' => $user->personalInfo->location,
                'preview' => 'resumeApp/public/images/theme-holder.svg',
                'url' => $baseURL . '/' . $user->username . '/' . $profile['url'],
                // new end points:
                'avatar'=> $user->personalInfo->profile_pic,
                'hourlyRate'=> $user->paymentInfo[0]->salary,
                'projects' => $projects,
                'skills' => $user->skills,
            ];

            $users[] = $formattedUser;
        }

        return $users;
    }

}