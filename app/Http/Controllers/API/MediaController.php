<?php

namespace App\Http\Controllers\API;

use App\classes\Upload;
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

            if($request->hasfile('mediaFile')) {
                $path = Upload::media($request);
                $media->update([
                    'url' => $path
                ]);
            }



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

        // remove media from the system if the file exists
        if (file_exists(public_path($media->url))) {
            unlink(public_path($media->url));
        }

        if($media->delete()){
            return ['data' => ['id' => $media->id] ];
        }
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'title' => ['required', 'string', 'max:255','min:3'],
            'type' => ['required', 'string', 'max:255'],
            'url' => ['sometimes', 'string', 'max:255'],
            'mediaFile' => ['sometimes', 'file'],
            'transcript' => ['string','max:2500'],
        ]);
    }
}
