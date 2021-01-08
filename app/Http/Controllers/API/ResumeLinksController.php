<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Import;
use App\ResumeLink;
use App\User;
use Exception;
use App\Http\Resources\ResumeLink as ResumeLinkResource;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ResumeLinksController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function index()
    {
        $resumeLinks = ResumeLink::where('user_id', Auth::user()->id)->paginate(5);
        return ResumeLinkResource::collection($resumeLinks);
    }

    public function getLinksByCategory($category)
    {
        $resumeLinks = ResumeLink::where([
            ['user_id', '=', Auth::user()->id],
            ['category', '=', $category],
        ])->paginate(5);
        return ResumeLinkResource::collection($resumeLinks);
    }

    public function toggleWorkForcePublicity(Request $request){
        $resumeLink = ResumeLink::findOrFail($request->id);
        $resumeLink->update([
            'is_123workforce_public' => ! $resumeLink->is_123workforce_public
        ]);

        if ($resumeLink->id) {
            return new ResumeLinkResource($resumeLink);
        }
    }

    public function store(Request $request)
    {

        if (!is_auth($request)) {
            throw new Exception('Not Authenticated!');
        }


        $this->validator($request->all())->validate();

        if ($request->isMethod('put') || $request->id != '') {
            // update
            $newResumeLink = ResumeLink::findOrFail($request->id);
            $newResumeLink->update($request->toArray());
        } else {
            // add
            $newResumeLink = ResumeLink::create($request->except('copy_from_resume_id'));
            // check if it will be copied from another user data:
            if (isset($request->copy_from_resume_id)){
                $this->copyUserRelationsToNewResumeLink($newResumeLink, $request->copy_from_resume_id);
            }
        }

        if ($newResumeLink->id) {
            return new ResumeLinkResource($newResumeLink);
        }
    }

    protected function copyUserRelationsToNewResumeLink($newResumeLink, $copiedFromResumeLinkID){
        $user = User::find($newResumeLink->user_id);
        $this->copyHasManyRelationsFromResumeLink($user, $newResumeLink->id, $copiedFromResumeLinkID);
        $this->copyHasOneRelationsFromResumeLink($user, $newResumeLink->id, $copiedFromResumeLinkID);
    }

    protected function copyHasManyRelationsFromResumeLink($user, $newResumeLinkID, $copiedFromResumeLinkID){
        foreach (User::$defaultOneToManyRelations as $relation) {

            if (in_array($relation, User::$excludedFromVersionFilter) || $relation === 'tabs') {
                continue;
            }

            $userRelation = $user->$relation()->where(function (Builder $query) use ($copiedFromResumeLinkID) {
                return $query->where('resume_link_id', $copiedFromResumeLinkID);
            })->get();

            foreach ($userRelation as $model) {
                $newModel = $model->replicate();
                $newModel->resume_link_id = $newResumeLinkID;
                $newModel->push();
            }
        }
    }

    protected function copyHasOneRelationsFromResumeLink($user, $newResumeLinkID, $copiedFromResumeLinkID){
        foreach (User::$defaultOneToOneRelations as $relation) {
            if (in_array($relation, User::$excludedFromVersionFilter)) {
                continue;
            }

            $copiedFromRelationShip = $user->$relation()
                ->where(function (Builder $query) use ($copiedFromResumeLinkID) {
                    return $query->where('resume_link_id', $copiedFromResumeLinkID);
                })->first();

            $copiedToRelationShip = $user->$relation()
                ->where(function (Builder $query) use ($newResumeLinkID) {
                    return $query->where('resume_link_id', $newResumeLinkID);
                })->first();


            $copiedFromRelationShip->makeHidden(['id','resume_link_id']);
            $copiedToRelationShip->update($copiedFromRelationShip->toArray());

        }
    }

    public function show($id)
    {
        $resumeLink = ResumeLink::where([
            'id' => $id,
        ])->first();

        return new ResumeLinkResource($resumeLink);
    }

    public function destroy($id)
    {
        $resumeLink = ResumeLink::where([
            'id' => $id,
        ])->first();

        if (!is_auth($resumeLink)) {
            throw new Exception('Not Authenticated!');
        }


        if ($resumeLink->delete()) {
            return ['data' => ['id' => $resumeLink->id]];
        }
    }

    public function updateResumeLinksOrder(Request $request)
    {
        $resumeLinks = $request->resume_links;
        foreach ($resumeLinks as $key => $resumeLink) {
            $myResumeLink = ResumeLink::find($resumeLink['id']);
            $myResumeLink->update([
                'order' => $key + 1
            ]);
        }
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'url' => 'required|string|alpha_dash|max:255|min:3|unique:resume_links,url,' . $data['id'] . ',id,user_id,' . $data['user_id'],
            'is_public' => ['max:255'],
            'title' => ['max:255'],
            'order' => ['max:255'],
        ]);
    }

    public function importFromCIVResume(Request $request){
        $resumeLinkToBeCopied = $this->canFindResumeLink($request);

        if(!$resumeLinkToBeCopied){
            return [ 'errors' => [
                'civResumeURL' => 'URL can not be found.'
            ]];
        }

        $currentUser = User::find($request->user_id);
        $awayUser = User::find($resumeLinkToBeCopied->user_id);

        $currentResumeLinkID = $currentUser->resume_link_id; // to this we copy
        $awayResumeLinkID    = $resumeLinkToBeCopied->id; // to copy to

        $this->copyHasManyRelationsFromAwayUserResumeLink($currentUser, $awayUser, $currentResumeLinkID, $awayResumeLinkID);
        $this->copyHasOneRelationsFromAwayUserResumeLink($currentUser, $awayUser, $currentResumeLinkID, $awayResumeLinkID);

        $this->addImport($currentUser, $awayUser,$resumeLinkToBeCopied);

    }

    protected function addImport($currentUser, $awayUser, $resumeLinkToBeCopied){
        Import::create([
            'user_id' => $currentUser->id,
            'url' => 'https://civ.ie/' . $awayUser->username . '/' . $resumeLinkToBeCopied->url,
            'title' => 'https://civ.ie/' . $awayUser->username . '/' . $resumeLinkToBeCopied->url,
            'resume_link_id' => $currentUser->resume_link_id,
        ]);
    }

    protected function copyHasManyRelationsFromAwayUserResumeLink($currentUser, $awayUser, $currentResumeLinkID, $awayResumeLinkID){
        foreach (User::$defaultOneToManyRelations as $relation) {

            if (in_array($relation, User::$excludedFromVersionFilter) || $relation === 'tabs') {
                continue;
            }

            $userRelation = $awayUser->$relation()->where(function (Builder $query) use ($awayResumeLinkID) {
                return $query->where('resume_link_id', $awayResumeLinkID);
            })->get();

            foreach ($userRelation as $model) {
                $newModel = $model->replicate();
                $newModel->resume_link_id = $currentResumeLinkID;
                $newModel->user_id = $currentUser->id;
                $newModel->push();
            }
        }
    }

    protected function copyHasOneRelationsFromAwayUserResumeLink($currentUser, $awayUser, $currentResumeLinkID, $awayResumeLinkID){
        foreach (User::$defaultOneToOneRelations as $relation) {
            if (in_array($relation, User::$excludedFromVersionFilter)) {
                continue;
            }

            $copiedFromRelationShip = $awayUser->$relation()
                ->where(function (Builder $query) use ($awayResumeLinkID) {
                    return $query->where('resume_link_id', $awayResumeLinkID);
                })->first();

            $copiedToRelationShip = $currentUser->$relation()
                ->where(function (Builder $query) use ($currentResumeLinkID) {
                    return $query->where('resume_link_id', $currentResumeLinkID);
                })->first();


            $copiedFromRelationShip->makeHidden(['id','resume_link_id','user_id']);
            $copiedToRelationShip->update($copiedFromRelationShip->toArray());

        }
    }

    protected function canFindResumeLink($request){
        $userFound = false;
        $versionFound = false;
        $user = [];
        $resumeLink = [];

        if(isset($request->username)){
            $user = User::where('username', $request->username)->first();
            if($user){
                $userFound = true;
            }
        }

        if($userFound){
            if (isset($request->version)){
                $resumeLink = $user->resumeLinks->where('url', $request->version)->first();
                if($resumeLink){
                    $versionFound = true;
                }
            }else{
                $resumeLink = $user->resumeLinks->where('url', '')->first();
                if($resumeLink){
                    $versionFound = true;
                }
            }
        }

        if($userFound && $versionFound){
            return $resumeLink;
        }

        return false;
    }

}
