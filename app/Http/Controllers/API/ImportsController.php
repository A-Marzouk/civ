<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Import;
use App\Http\Resources\Import as ImportResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ImportsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function index()
    {
        $imports = Import::where('user_id',Auth::user()->id)->paginate(5);
        return ImportResource::collection($imports);
    }

    public function store(Request $request)
    {

        $this->validator($request->all())->validate();

        if($request->isMethod('put')){
            // update
            $import = Import::findOrFail($request->id);
            $import->update($request->toArray());
        }else{
            // add
            $request['user_id'] = Auth::user()->id;
            $import = Import::create($request->toArray());
        }

        if ($import->id){
            return new ImportResource($import);
        }
    }

    public function show($id)
    {
        $import = Import::where([
            'id' => $id,
        ])->first();

        return new ImportResource($import);
    }

    public function destroy($id)
    {
        $import = Import::where([
            'id' => $id,
        ])->first();

        if($import->delete()){
            return ['data' => ['id' => $import->id] ];
        }
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'title' => ['required', 'string', 'max:255','min:3'],
            'category' => ['required', 'string', 'max:255'],
            'url' => ['required', 'string','max:255'],
        ]);
    }
}
