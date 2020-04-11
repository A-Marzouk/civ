<?php

namespace App\Http\Controllers\API;

use App\classes\Upload;
use App\Http\Controllers\Controller;
use App\Http\Resources\ProjectImage;
use App\Project;
use Illuminate\Http\Request;
use App\Http\Resources\Project as ProjectResource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\Console\Input\Input;


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

        $request['user_id'] = Auth::user()->id;
        $project = Project::create($request->toArray());

        if($request->hasfile('images')) {
            $this->storeProjectImages(Upload::projectImages($request),$project);
        }

        $project['images'] = $project->images;

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
            'description' => ['sometimes','required', 'string', 'max:2500','min:3'],
            'link' => ['sometimes','required', 'string','max:255','min:3'],
            'skills' => ['sometimes','required', 'string','max:255','min:3'],
            'software' => ['sometimes','required', 'string','max:255','min:3'],
        ]);
    }

    protected function storeProjectImages($data, $project){
        $is_main = true ;
        foreach ($data as $filePath){
            $project->images()->create([
                'src' => $filePath,
                'is_main' => $is_main
            ]);
            $is_main = false;
        }
    }
}
