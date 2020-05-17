<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\AvailabilityInfo;
use App\Http\Resources\AvailabilityInfo as AvailabilityInfoResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Exception;



class AvailabilityInfoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \App\Http\Resources\AvailabilityInfo
     */
    public function index()
    {
        $AvailabilityInfo = AvailabilityInfo::where('user_id',Auth::user()->id)->get();
        return new AvailabilityInfoResource($AvailabilityInfo);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \App\Http\Resources\AvailabilityInfo
     */
    public function store(Request $request)
    {
        if(!$this->is_auth($request)){
            throw new Exception('Not Authenticated!');
        }
        // here we will not save new we will directly update info.
        $this->validator($request->all())->validate();

        if($request->isMethod('put')){
            // update
            $availabilityInfo = AvailabilityInfo::findOrFail($request->id);
            $availabilityInfo->update($request->toArray());
        }

        if (isset($availabilityInfo)){
            return new AvailabilityInfoResource($availabilityInfo);
        }

    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'available_hours' => ['required', 'numeric','min:10','max:9999999']
        ]);
    }


    protected function is_auth($request){
        return (Auth::user()->id == $request->user_id || Auth::user()->hasRole('admin'));
    }
}
