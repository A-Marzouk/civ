<?php

namespace App\Http\Controllers\API;

use App\classes\Upload;
use App\Http\Controllers\Controller;
use App\Http\Resources\PersonalInfo as PersonalInfoResource;
use App\PersonalInfo;
use App\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;



class PersonalInfoController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:api');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \App\Http\Resources\PersonalInfo
     */
    public function index()
    {
        $personalInfo = PersonalInfo::where('user_id',Auth::user()->id)->first();
        return new PersonalInfoResource($personalInfo);
    }

    public function store(Request $request)
    {

        if(!is_auth($request)){
            throw new Exception('Not Authenticated!');
        }

        $attributes = $this->validator($request->all())->validate();

        $user = User::find($request->user_id);

        $personalInfo = PersonalInfo::where([
            ['user_id',$user->id],
            ['resume_link_id', $user->resume_link_id]
        ])->first();

        if($request->file('profile_pic')){
            $attributes['profile_pic'] = $request->file('profile_pic')->store('avatars');
        }

        $personalInfo->update($attributes);

        if (isset($personalInfo)){
            return new PersonalInfoResource($personalInfo);
        }

    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'first_name' => ['sometimes', 'string', 'max:255','min:2'],
            'last_name' => ['sometimes', 'string', 'max:255','min:2'],
            'date_of_birth' => ['sometimes', 'string', 'max:255','min:3'],
            'email' => ['email','max:255','unique:users'],
            'designation' => ['sometimes', 'string','max:255','min:2'],
            'profile_pic' => ['sometimes'],
            'phone' => ['sometimes', 'numeric','min:7'],
            'location' => ['sometimes', 'string', 'max:255','min:3'],
            'hometown' => ['sometimes', 'string', 'max:255','min:3'],
            'nationality' => ['sometimes', 'string', 'max:255','min:3'],
            'about' => ['sometimes','string','max:1000'],
            'overview' => ['sometimes','string','max:1000'],
            'quote' => ['sometimes','string','max:1000'],
        ]);
    }



}
