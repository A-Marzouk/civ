<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Referee;
use App\Http\Resources\Referee as RefereeResource;
use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
class RefereeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function index()
    {
        $referee = Referee::where('user_id',Auth::user()->id)->first();
        return new RefereeResource($referee);
    }
    public function store(Request $request)
    {

        $this->validator($request->all())->validate();

        if($request->isMethod('put')){
            $referee = Auth::user()->referee;
            $referee->update($request->toArray());
        }else{
            // add
            $request['user_id'] = Auth::user()->id;
            $referee = Referee::create($request->toArray());
        }

        if ($referee->id){
            return new RefereeResource($referee);
        }
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255','min:3'],
            'title' => ['sometimes','required', 'string', 'max:255'],
            'phone' => ['sometimes','required','min:7' ,'numeric'],
            'email' => ['sometimes','required', 'email', 'max:255'],
            'contact_email' => ['sometimes','required', 'email', 'max:255'],
            'company' => ['sometimes','required', 'string', 'max:255'],
            'address' => ['sometimes','nullable', 'string', 'max:255'],
            'reference_text' => ['sometimes','nullable','string', 'max:2500'],
            'notes' => ['sometimes','nullable','string', 'max:2500'],
        ]);
    }
}