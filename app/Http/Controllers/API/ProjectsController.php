<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Project;
use Illuminate\Http\Request;
use App\Http\Resources\Project as ProjectResource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class ProjectsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:api');
    }

    /**
     * Display a listing of the resource.
     *@param  int  $user_id
     * @return \Illuminate\Http\Resources\Json\ResourceCollection
     */
    public function index()
    {
        $projects = Project::where('user_id',Auth::user()->id)->paginate(5);
        return ProjectResource::collection($projects);
    }
    public function store(Request $request)
    {

        $this->validator($request->all())->validate();

        if($request->isMethod('put')){
            // update
            $project = Project::findOrFail($request->id);
            $project->update($request->toArray());
        }else{
            // add
            $request['user_id'] = Auth::user()->id;
            $project = Project::create($request->toArray());
        }

        if ($project->id){
            return new ProjectResource($project);
        }
    }

    public function show($id)
    {
        $project = Project::where([
            'id' => $id,
            'user_id' => Auth::user()->id
        ])->first();

        return new ProjectResource($project);
    }

    public function destroy($id)
    {
        $project = Project::where([
            'id' => $id,
            'user_id' => Auth::user()->id
        ])->first();

        if($project->delete()){
            return ['data' => ['id' => $project->id] ];
        }
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['sometimes','required', 'string', 'max:255','min:3'],
            'description' => ['sometimes','required', 'string', 'max:2500'],
            'link' => ['sometimes','required', 'string','max:255'],
            'skills' => ['sometimes','required', 'string','max:255'],
            'software' => ['sometimes','required', 'string','max:255'],
        ]);
    }
}
