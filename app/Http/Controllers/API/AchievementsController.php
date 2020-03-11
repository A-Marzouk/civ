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
       $achievements = Achievement::where('user_id',Auth::user()->id)->paginate(5);
        return AchievementResource::collection($achievements);
    }

    public function store(Request $request)
    {
        return $request;

        $this->validator($request->all())->validate();

        if($request->isMethod('put')){
            // update
            $achievement = Achievement::findOrFail($request->id);
            $achievement->update($request->toArray());
        }else{
            // add
            $request['user_id'] = Auth::user()->id;
            $achievement =Achievement::create($request->toArray());
        }

        if (isset($_FILES['file'])) {
            $pathToPicture = Upload::certificate('file', Auth::user()->id);
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
            'user_id' => Auth::user()->id
        ])->first();

        return new AchievementResource($achievement);
    }

    public function destroy($id)
    {
        $achievement = Achievement::where([
            'id' => $id,
            'user_id' => Auth::user()->id
        ])->first();

        if($achievement->delete()){
            return ['data' => ['id' => $achievement->id] ];
        }
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'title' => ['required', 'string', 'max:255','min:3'],
            'category' => ['required', 'string', 'max:255'],
            'description' => ['nullable','string','min:3', 'max:2500'],
            'file' => ['nullable','file'],
            'url' => ['nullable','max:255'],
        ]);
    }
}
