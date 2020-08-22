<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\ResumeLink;
use Exception;
use App\Http\Resources\ResumeLink as ResumeLinkResource;
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
        $resumeLinks = ResumeLink::where('user_id',Auth::user()->id)->paginate(5);
        return ResumeLinkResource::collection($resumeLinks);
    }

    public function getLinksByCategory($category)
    {
        $resumeLinks = ResumeLink::where([
            ['user_id' , '=', Auth::user()->id],
            ['category' , '=', $category],
        ])->paginate(5);
        return ResumeLinkResource::collection($resumeLinks);
    }

    public function store(Request $request)
    {

        if(!$this->is_auth($request)){
            throw new Exception('Not Authenticated!');
        }


        $this->validator($request->all())->validate();

        if($request->isMethod('put') || $request->id != '' ){
            // update
            $resumeLink = ResumeLink::findOrFail($request->id);
            $resumeLink->update($request->toArray());
        }else{
            // add
            $resumeLink = ResumeLink::create($request->toArray());
        }

        if ($resumeLink->id){
            return new ResumeLinkResource($resumeLink);
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

        if(!$this->is_auth($resumeLink)){
            throw new Exception('Not Authenticated!');
        }


        if($resumeLink->delete()){
            return ['data' => ['id' => $resumeLink->id] ];
        }
    }

    public function updateResumeLinksOrder(Request $request){
        $resumeLinks = $request->resume_links ;
        foreach ($resumeLinks as $key => $resumeLink){
            $myResumeLink = ResumeLink::find($resumeLink['id']);
            $myResumeLink->update([
                'order' => $key + 1
            ]);
        }
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'url' => 'required|string|alpha_dash|max:255|min:3|unique:resume_links,url,'.$data['id'].',id,user_id,'.$data['user_id'],
            'is_public' => ['max:255'],
            'order' => ['max:255'],
        ]);
    }

    protected function is_auth($request){
        return (Auth::user()->id == $request->user_id || Auth::user()->hasRole('admin'));
    }
}
