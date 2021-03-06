<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\Controller;
use App\Promocode;
use App\Http\Resources\Promocode as PromocodeResource;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class PromocodesController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth:api', 'role:admin']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\ResourceCollection
     */
    public function index()
    {
        $promocodes = Promocode::all();
        return PromocodeResource::collection($promocodes);
    }

    public function store(Request $request)
    {
        if(!is_auth($request)){
            throw new Exception('Not Authenticated!');
        }


        $this->validator($request->all())->validate();

        if($request->isMethod('put') || $request->id != '' ){
            // update
            $promocode = Promocode::findOrFail($request->id);
            $promocode->update($request->toArray());
        }else{
            // add
            $promocode = Promocode::create($request->toArray());
        }

        if ($promocode->id){
            return new PromocodeResource($promocode);
        }
    }

    public function destroy($id)
    {
        $promocode = Promocode::where([
            'id' => $id,
        ])->first();

        if(!is_auth($promocode)){
            throw new Exception('Not Authenticated!');
        }


        if($promocode->delete()){
            return ['data' => ['id' => $promocode->id] ];
        }
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255','min:3'],
            'free_period' => ['required','max:255'],
            'expires_at' => ['required','date','max:255'],
        ]);
    }


}
