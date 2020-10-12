<?php

namespace App\Http\Controllers\API;


use App\Http\Controllers\Controller;
use App\ResumeLink;
use App\User;

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
            $users[] = User::withAllRelations('123workforce', $profile->id);
        }

        return $users;
    }

}