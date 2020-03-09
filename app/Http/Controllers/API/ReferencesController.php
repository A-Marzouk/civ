<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Reference;
use App\Http\Resources\Reference as ReferenceResource;
use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ReferencesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    /**
     * Display a listing of the resource.
     *@param  int  $user_id
     * @return \Illuminate\Http\Resources\Json\ResourceCollection
     */
    public function index()
    {
        $references = Reference::where('user_id',Auth::user()->id)->paginate(5);
        return ReferenceResource::collection($references);
    }
    public function store(Request $request)
    {

        $this->validator($request->all())->validate();

        if($request->isMethod('put')){
            // update
            $reference = Reference::findOrFail($request->id);
            $reference->update($request->toArray());
        }else{
            // add
            $request['user_id'] = Auth::user()->id;
            $reference = Reference::create($request->toArray());
        }

        if ($reference->id){
            return new ReferenceResource($reference);
        }
    }

    public function show($id)
    {
        $reference = Reference::where([
            'id' => $id,
            'user_id' => Auth::user()->id
        ])->first();

        return new ReferenceResource($reference);
    }

    public function destroy($id)
    {
        $reference = Reference::where([
            'id' => $id,
            'user_id' => Auth::user()->id
        ])->first();

        if($reference->delete()){
            return ['data' => ['id' => $reference->id] ];
        }
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255','min:3'],
            'title' => ['required', 'string', 'max:255'],
            'phone' => ['required','min:7' , 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'company' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
            'reference_text' => ['string', 'max:2500'],
            'notes' => ['string', 'max:2500'],
        ]);
    }
}
