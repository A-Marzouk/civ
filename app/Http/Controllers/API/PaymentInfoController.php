<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\PaymentInfo;
use App\Http\Resources\PaymentInfo as PaymentInfoResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Exception;



class PaymentInfoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \App\Http\Resources\PaymentInfo
     */
    public function index()
    {
        $paymentInfo = PaymentInfo::where('user_id',Auth::user()->id)->get();
        return new PaymentInfoResource($paymentInfo);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \App\Http\Resources\PaymentInfo
     */
    public function store(Request $request)
    {
        if(!is_auth($request)){
            throw new Exception('Not Authenticated!');
        }

        // here we will not save new we will directly update info.
        $this->validator($request->all())->validate();

        if($request->isMethod('put')){
            // update
            $paymentInfo = PaymentInfo::findOrFail($request->id);
            $paymentInfo->update($request->toArray());
        }

        if (isset($paymentInfo)){
            return new PaymentInfoResource($paymentInfo);
        }

    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'currency' => ['required', 'string', 'max:255','min:2'],
            'salary' => ['required', 'numeric','min:3','max:9999999'],
        ]);
    }


}
