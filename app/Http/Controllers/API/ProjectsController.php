<?php

namespace App\Http\Controllers\API;

use App\classes\Upload;
use App\Http\Controllers\Controller;
use App\ProjectImage;
use App\Project;
use App\User;
use Illuminate\Http\Request;
use App\Http\Resources\Project as ProjectResource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Exception;
use Intervention\Image\Facades\Image;


class ProjectsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:api')->except('optimizeAllProjectImages');
    }

    /**
     * Display a listing of the resource.
     *@param  int  $user_id
     * @return \Illuminate\Http\Resources\Json\ResourceCollection
     */
    public function index()
    {
        $projects = Project::where('user_id',Auth::user()->id)->with('images')->paginate(5);
        return ProjectResource::collection($projects);
    }
    public function store(Request $request)
    {

        if(!is_auth($request)){
            throw new Exception('Not Authenticated!');
        }

        $this->validator($request->all())->validate();

        if($request->isMethod('put') || $request->id != '' ){
            // update
            $project = Project::findOrFail($request->id);
            if($request['is_public'] == false || $request['is_public'] === 'false' ){
                $request['is_public'] = false ;
            }
            else if($request['is_public'] == true || $request['is_public'] === 'true') {
                $request['is_public'] = true ;
            }
            $project->update($request->toArray());
        }else{
            // add
            $request['resume_link_id'] = User::find($request->user_id)->resume_link_id;
            $project = Project::create($request->toArray());
        }

        if($request->hasfile('images')) {
            $this->storeProjectImages(Upload::projectImages($request),$project);
        }
        $project['images'] = $project->images;


        if ($project->id){
            return new ProjectResource($project);
        }
    }

    public function storeMany(Request $request){
        if(!is_auth($request)){
            throw new Exception('Not Authenticated!');
        }

        $addedProjects = [];

        foreach($request->projects as $project){
            $project['resume_link_id'] = User::find($project['user_id'])->resume_link_id;
            $newProject = Project::create($project);
            if(isset($project['image'])){
                $newProject->images()->create([
                    'src' => $this->uploadImageFromURL($project['image'], $newProject->id),
                    'is_main' => true
                ]);
            }
            $newProject['images'] = $newProject->images;
            $addedProjects[] = $newProject;
        }

        return $addedProjects;
    }

    public function uploadImageFromURL($url, $id){
        $contents  = file_get_contents($url);
        $extension = File::extension(strtok($url, '?'));
        $name = 'projects_media/' . $id . '_' . date(time()) . '_.' . $extension;
        if(Storage::put($name, $contents)){
            return $name ;
        }
        return false ;
    }

    public function show($id)
    {
        $project = Project::where([
            'id' => $id,
            'user_id' => Auth::user()->id
        ])->first();

        return new ProjectResource($project);
    }


    public function updateProjectsOrder(Request $request){
        $projects = $request->projects ;
        foreach ($projects as $key => $project){
            $myProject = Project::find($project['id']);
            $myProject->update([
                'order' => $key + 1
            ]);
        }
    }

    public function destroy($id)
    {
        $project = Project::where([
            'id' => $id
        ])->first();

        if(!is_auth($project)){
            throw new Exception('Not Authenticated!');
        }

        if($project->delete()){
            return ['data' => ['id' => $project->id] ];
        }
    }

    public function destroyProjectImage($id)
    {
        $projectImage = ProjectImage::where([
            'id' => $id
        ])->first();
        if($projectImage->delete()){
            return ['data' => ['id' => $projectImage->id] ];
        }
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255','min:3'],
            'category' => ['required', 'string', 'max:255','min:3'],
            'description' => ['required', 'string', 'max:1000','min:3'],
            'link' => ['required', 'string','max:255','min:3'],
            'skills' => ['required', 'string','max:255','min:3'],
            'software' => ['required', 'string','max:255','min:3']
        ]);
    }

    protected function storeProjectImages($data, $project){
        $is_main = true ;
        foreach ($data as $filePath){
            if($this->image_exists('storage/' . $filePath)){
                $this->optimizeImage($filePath);
            }
            $project->images()->create([
                'src' => $filePath,
                'is_main' => $is_main
            ]);
            $is_main = false;
        }
    }

    protected function optimizeImage($imageSrc){
        $image = 'storage/' . $imageSrc;
        try{
            $img = Image::make($image);
        }catch (Exception $e){
            return false;
        }
        $img->resize(225, null, function ($constraint) {
            $constraint->aspectRatio();
        });
        $imageName = str_replace("storage/projects_media/","",$image);
        $img->stream();
        Storage::disk('local')->put(('/public/projects_media_resized/' . $imageName), $img, 'public');

        return true;
    }

    public function optimizeAllProjectImages(){
        $projects = Project::all();
        $count = 0 ;
        foreach ($projects as $project){
            $images = $project->images;
            foreach ($images as $image){
                if($this->optimizeImage($image->getRawOriginal('src'))){
                    $count++;
                }
            }
        }

        echo $count;
        echo 'done successfully';
    }

    protected function getImageSrc($src){
        if($src[0] == '/'){
            $src = substr($src, 1);
        }
        return  $src;
    }

    protected function image_exists($src){
        if(!file_exists($this->getImageSrc($src))){
            return false ;
        }
        return true;
    }


}
