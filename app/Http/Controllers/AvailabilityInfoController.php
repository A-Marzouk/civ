<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\AvailabilityInfo;
use App\Http\Resources\AvailabilityInfo as AvailabilityInfoResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


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
        $AvailabilityInfo = AvailabilityInfo::where('user_id',Auth::user()->id)->first();
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
        // here we will not save new we will directly update info.
        $this->validator($request->all())->validate();

        if($request->isMethod('put')){
            // update
            $availabilityInfo = Auth::user()->availabilityInfo;
            $availabilityInfo->update($request->toArray());
        }

        if (isset($availabilityInfo)){
            return new AvailabilityInfoResource($availabilityInfo);
        }

    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'available_hours_frequency' => ['required', 'string','max:255','min:3'],
            'available_hours' => ['required', 'numeric','min:10','max:5000'],
        ]);
    }
}
