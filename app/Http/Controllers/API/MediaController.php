<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Media;
use App\Http\Resources\Media as MediaResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class MediaController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:api');
    }

    /**
     * Display a listing of the resource.
     *
     *  @return \Illuminate\Http\Resources\Json\ResourceCollection
     */
    public function index()
    {
        $media = Media::where('user_id',Auth::user()->id)->paginate(5);
        return MediaResource::collection($media);
    }


    public function store(Request $request)
    {

        $this->validator($request->all())->validate();

        if($request->isMethod('put')){
            // update
            $media = Media::findOrFail($request->id);
            $media->update($request->toArray());
        }else{
            // add
            $request['user_id'] = Auth::user()->id;
            $media = Media::create($request->toArray());
        }

        if ($media->id){
            return new MediaResource($media);
        }
    }

    public function show($id)
    {
        $media = Media::where([
            'id' => $id,
            'user_id' => Auth::user()->id
        ])->first();

        return new MediaResource($media);
    }

    public function destroy($id)
    {
        $media = Media::where([
            'id' => $id,
            'user_id' => Auth::user()->id
        ])->first();

        if($media->delete()){
            return ['data' => ['id' => $media->id] ];
        }
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'title' => ['required', 'string', 'max:255','min:3'],
            'type' => ['required', 'string', 'max:255'],
            'url' => ['required', 'string','max:255'],
            'transcript' => ['string','max:2500'],
        ]);
    }
}
