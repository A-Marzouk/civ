<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
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

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\ResourceCollection
     */
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

    public function store(Request $request)
    {

        if (!$this->is_auth($request)) {
            throw new Exception('Not Authenticated!');
        }


        $this->validator($request->all())->validate();

        if ($request->isMethod('put') || $request->id != '') {
            // update
            $resumeLink = ResumeLink::findOrFail($request->id);
            $resumeLink->update($request->toArray());
        } else {
            // add
            $resumeLink = ResumeLink::create($request->except('copy_from_resume_id'));
            // check if it will be copied from another user data:
            if (isset($request->copy_from_resume_id)) {
                $this->copyFromCIVResumeLink($resumeLink, $request->copy_from_resume_id);
            }
        }

        if ($resumeLink->id) {
            return new ResumeLinkResource($resumeLink);
        }
    }

    protected function copyFromCIVResumeLink($resume_link, $copy_from_resume_id)
    {
        $user = User::find($resume_link->user_id);
        // copy all hasMany relationships.
        foreach (User::$defaultOneToManyRelations as $relation) {

            if (in_array($relation, User::$excludedFromVersionFilter) || $relation === 'tabs') {
                continue;
            }

            $userRelation = $user->$relation()->where(function (Builder $query) use ($copy_from_resume_id) {
                return $query->where('resume_link_id', $copy_from_resume_id);
            })->get();

            foreach ($userRelation as $model) {
                $newModel = $model->replicate();
                $newModel->resume_link_id = $resume_link->id;
                $newModel->push();
            }
        }

        // has one relationships:
        foreach (User::$defaultOneToOneRelations as $relation) {
            if (in_array($relation, User::$excludedFromVersionFilter)) {
                continue;
            }

            $copiedFromRelationShip = $user->$relation()
                ->where(function (Builder $query) use ($copy_from_resume_id) {
                    return $query->where('resume_link_id', $copy_from_resume_id);
                })->first();

            $copiedToRelationShip = $user->$relation()
                ->where(function (Builder $query) use ($resume_link) {
                    return $query->where('resume_link_id', $resume_link->id);
                })->first();;


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

        if (!$this->is_auth($resumeLink)) {
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

    protected function is_auth($request)
    {
        return (Auth::user()->id == $request->user_id || Auth::user()->hasRole('admin'));
    }
}
