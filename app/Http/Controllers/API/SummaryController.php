<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Summary;
use App\Http\Resources\Summary as SummaryResource;
use App\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class SummaryController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:api');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \App\Http\Resources\Summary
     */
    public function index()
    {
        $summary = Auth::user()->summary;
        return new SummaryResource($summary);
    }



    public function store(Request $request)
    {
        if(!$this->is_auth($request)){
            throw new Exception('Not Authenticated!');
        }

        // here we will not save new we will directly update info.
        $this->validator($request->all())->validate();

        $user = User::find($request->user_id);
        $summary = $user->summary;
        $summary->update($request->toArray());

        if (isset($summary)){
            return new SummaryResource($summary);
        }

    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'objective' => ['nullable','string', 'max:2500','min:3'],
            'overview' =>  ['nullable','string', 'max:2500','min:3']
        ]);
    }

    protected function is_auth($request){
        return (Auth::user()->id == $request->user_id || Auth::user()->hasRole('admin'));
    }
}
