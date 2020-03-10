<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Link;
use App\Http\Resources\Link as LinkResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LinksController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:api');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\ResourceCollection
     */
    public function index()
    {
        $links = Link::where('user_id',Auth::user()->id)->paginate(5);
        return LinkResource::collection($links);
    }

    public function store(Request $request)
    {

        $this->validator($request->all())->validate();

        if($request->isMethod('put')){
            // update
            $link = Link::findOrFail($request->id);
            $link->update($request->toArray());
        }else{
            // add
            $request['user_id'] = Auth::user()->id;
            $link = Link::create($request->toArray());
        }

        if ($link->id){
            return new LinkResource($link);
        }
    }

    public function show($id)
    {
        $link = Link::where([
            'id' => $id,
            'user_id' => Auth::user()->id
        ])->first();

        return new LinkResource($link);
    }

    public function destroy($id)
    {
        $link = Link::where([
            'id' => $id,
            'user_id' => Auth::user()->id
        ])->first();

        if($link->delete()){
            return ['data' => ['id' => $link->id] ];
        }
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'link_title' => ['nullable','string', 'max:255','min:3'],
            'category' => ['required', 'string', 'max:255'],
            'link' => ['required', 'string','max:255'],
        ]);
    }
}
