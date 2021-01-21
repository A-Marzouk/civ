<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\PaymentMethod;
use App\Http\Resources\PaymentMethod as PaymentMethodResource;
use App\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class PaymentMethodsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function index()
    {
        // get skills of current user.
        $paymentMethods = PaymentMethod::where('user_id',Auth::user()->id)->paginate(5);
        return PaymentMethodResource::collection($paymentMethods);
    }

    public function store(Request $request)
    {

        if(!is_auth($request)){
            throw new Exception('Not Authenticated!');
        }

        $this->validator($request->all())->validate();

        if($request->isMethod('put') || $request->id != ''){
            $paymentMethod = PaymentMethod::findOrFail($request->id);
            $paymentMethod->update($request->toArray());
        }else{
            $request['resume_link_id'] = User::find($request->user_id)->resume_link_id;
            $paymentMethod =PaymentMethod::create($request->toArray());
        }

        if ($paymentMethod->id){
            return new PaymentMethodResource($paymentMethod);
        }
    }

    public function show($id)
    {
        $paymentMethod = PaymentMethod::where([
            'id' => $id,
        ])->first();

        return new PaymentMethodResource($paymentMethod);
    }

    public function makePrimary(Request $request){
        $paymentMethodID   = $request->id;
        if($paymentMethodID){
            $paymentMethods = PaymentMethod::where([
                ['user_id', $request->user_id],
                ['resume_link_id', $request->resume_link_id]
            ])->get();

            foreach ($paymentMethods as $pm){
                $pm->update([
                    'is_primary' => $pm->id == $paymentMethodID
                ]);
            }
        }
    }

    public function updatePaymentMethodsOrder(Request $request){
        $paymentMethods = $request->paymentMethods ;
        foreach ($paymentMethods as $key => $paymentMethod){
            $myMethod = PaymentMethod::find($paymentMethod['id']);
            $myMethod->update([
                'order' => $key + 1
            ]);
        }
    }

    public function destroy($id)
    {
        $paymentMethod = PaymentMethod::where([
            'id' => $id,
        ])->first();

        if(!is_auth($paymentMethod)){
            throw new Exception('Not Authenticated!');
        }

        if($paymentMethod->delete()){
            return ['data' => ['id' => $paymentMethod->id] ];
        }
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:200','min:2'],
            'payment_email' => ['required', 'email','max:200','min:2'],
            'link' => ['max:200'],
            'is_active' => ['required','bool'],
            'is_primary' => ['required', 'bool'],
            'order' => ['required', 'numeric'],
        ]);
    }
}
