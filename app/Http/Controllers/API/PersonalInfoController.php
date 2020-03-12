<?php

namespace App\Http\Controllers\API;

use App\classes\Upload;
use App\Http\Controllers\Controller;
use App\Http\Resources\PersonalInfo as PersonalInfoResource;
use App\PersonalInfo;
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


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \App\Http\Resources\PersonalInfo
     */
    public function store(Request $request)
    {
        // here we will not save new we will directly update info.
        $this->validator($request->all())->validate();
        $personalInfo = Auth::user()->personalInfo;

        if($request->isMethod('put')){
            $personalInfo->update($request->toArray());
        }

        if (isset($_FILES['profile_pic'])) {
            $pathToPicture = Upload::profilePicture('profile_pic', Auth::user()->id);
            if($pathToPicture){
                $personalInfo->update([
                    'profile_pic' => '/' . $pathToPicture
                ]);
            }else{
                throw new Exception('Failed to upload image');
            }

        }

        if (isset($personalInfo)){
            return new PersonalInfoResource($personalInfo);
        }

    }


    public function storeLocation(Request $request){
        $personalInfo = Auth::user()->personalInfo;
        $this->locationValidator($request->all())->validate();
        $personalInfo->update($request->toArray());

        if (isset($personalInfo)){
            return new PersonalInfoResource($personalInfo);
        }
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'full_name' => ['required', 'string', 'max:255','min:3'],
            'email' => ['email','max:255','unique:users'],
            'designation' => ['required', 'string','max:255','min:3'],
            'profile_pic' => ['required'],
            'phone' => ['required', 'numeric','min:7'],
            'about' => ['required','string','min:30','max:2500'],
        ]);
    }

    protected function locationValidator(array $data)
    {
        return Validator::make($data, [
            'location' => ['required', 'string', 'max:255','min:3'],
        ]);
    }
}
