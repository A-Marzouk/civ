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
            if($request['is_public'] == false || $request['is_public'] === 'false' ){
                $request['is_public'] = false ;
            }
            else if($request['is_public'] == true || $request['is_public'] === 'true') {
                $request['is_public'] = true ;
            }
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
        $url_regex = "/((([A-Za-z]{3,9}:(?:\/\/)?)(?:[-;:&=\+\$,\w]+@)?[A-Za-z0-9.-]+|(?:www.|[-;:&=\+\$,\w]+@)[A-Za-z0-9.-]+)((?:\/[\+~%\/.\w\-_]*)?\??(?:[-\+=&;%@.\w_]*)#?(?:[\w]*))?)/" ;
        return Validator::make($data, [
            'title' => ['required', 'string', 'max:255','min:3'],
            'type' => ['required', 'string', 'max:255','min:3'],
            'year' => ['required', 'string', 'max:255','min:3'],
            'description' => ['required','string','min:3', 'max:2500','min:3'],
            'file' => ['sometimes','file'],
            'image_src' => ['required','max:255','min:3'],
            'url' => ['required','max:255','min:3', "regex:".$url_regex]
        ]);
    }

    protected function is_auth($request){
        return (Auth::user()->id == $request->user_id || Auth::user()->hasRole('admin'));
    }
}
