<?php

namespace App\Http\Controllers\API;

use App\Achievement;
use App\classes\Upload;
use Exception;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\Achievement as AchievementResource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AchievementsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function index()
    {
       $achievements = Achievement::where('user_id',Auth::user()->id)->paginate(10);
        return AchievementResource::collection($achievements);
    }

    public function store(Request $request)
    {

        if(!$this->is_auth($request)){
            throw new Exception('Not Authenticated!');
        }

        $this->validator($request->all())->validate();

        if($request->isMethod('put') || $request->id != '' ){
            // update
            $achievement = Achievement::findOrFail($request->id);
            $achievement->update($request->toArray());
        }else{
            $achievement =Achievement::create($request->toArray());
        }

        if (isset($_FILES['file'])) {
            $pathToPicture = Upload::certificate('file', $request->user_id);
            if($pathToPicture){
                $achievement->update([
                    'image_src' => '/'.$pathToPicture
                ]);
            }else{
                throw new Exception('Failed to upload image');
            }

        }

        if ($achievement->id){
            return new AchievementResource($achievement);
        }
    }

    public function show($id)
    {
        $achievement = Achievement::where([
            'id' => $id,
        ])->first();

        return new AchievementResource($achievement);
    }

    public function destroy($id)
    {
        $achievement = Achievement::where(['id' => $id])->first();

        if(!$this->is_auth($achievement)){
            throw new Exception('Not Authenticated!');
        }

        // remove the file from the directory if exists:
        if($achievement->image_src){
            if (file_exists(public_path($achievement->image_src))) {
                unlink(public_path($achievement->image_src));
            }
        }

        if($achievement->delete()){
            return ['data' => ['id' => $achievement->id] ];
        }
    }

    public function updateAchievementsOrder(Request $request){
        $achievements = $request->achievements ;
        foreach ($achievements as $key => $achievement){
            $myAchievement = Achievement::find($achievement['id']);
            $myAchievement->update([
                'order' => $key + 1
            ]);
        }
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'title' => ['sometimes', 'string', 'max:255','min:3'],
            'type' => ['nullable', 'string', 'max:255'],
            'year' => ['nullable', 'string', 'max:255'],
            'description' => ['nullable','string','min:3', 'max:2500'],
            'file' => ['nullable','file'],
            'url' => ['nullable','max:255']
        ]);
    }

    protected function is_auth($request){
        return (Auth::user()->id == $request->user_id || Auth::user()->hasRole('admin'));
    }
}
