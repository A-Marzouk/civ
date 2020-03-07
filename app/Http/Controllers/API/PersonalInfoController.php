<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\PersonalInfo as PersonalInfoResource;
use App\PersonalInfo;
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

        if($request->isMethod('put')){
            // update
            $personalInfo = Auth::user()->personalInfo;
            $personalInfo->update($request->toArray());
        }

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
            'phone' => ['required', 'numeric','min:7'],
            'about' => ['required','string','min:30','max:2500'],
        ]);
    }
}
