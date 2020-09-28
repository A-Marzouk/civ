<?php

namespace App\Http\Controllers\API;

use App\classes\Upload;
use App\Http\Controllers\Controller;
use App\Media;
use App\User;
use Exception;
use App\Http\Resources\Media as MediaResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
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
     * @return \Illuminate\Http\Resources\Json\ResourceCollection
     */
    public function index()
    {
        $media = Media::where('user_id', Auth::user()->id)->paginate(5);
        return MediaResource::collection($media);
    }


    public function store(Request $request)
    {

        if (!is_auth($request)) {
            throw new Exception('Not Authenticated!');
        }

        $attributes = $this->validator($request->all())->validate();

        if ($request->isMethod('put') || $request->id != '') {
            if ($request->file('mediaPreviewFile')) {
                $attributes['media_preview'] = $this->replaceMediaPreview($request);
            }
            $media = Media::findOrFail($request->id);
            $media->update($attributes);
        } else {

            $attributes['resume_link_id'] = User::find($request->user_id)->resume_link_id;

            if ($request->hasfile('mediaFile')) {
                $attributes['url'] = $request->file('mediaFile')->store('media_files');
            }

            if ($request->file('mediaPreviewFile')) {
                $attributes['media_preview'] = $request->file('mediaPreviewFile')->store('media_previews');
            }

            $media = Media::create($attributes);
        }

        if ($media->id) {
            return new MediaResource($media);
        }
    }

    public function show($id)
    {
        $media = Media::where([
            'id' => $id,
        ])->first();

        return new MediaResource($media);
    }

    public function destroy($id)
    {
        $media = Media::where([
            'id' => $id,
        ])->first();


        if (!is_auth($media)) {
            throw new Exception('Not Authenticated!');
        }

        // remove media files from the system if the file exists
        $originalFilePath = $media->getRawOriginal('url');
        $mediaFile = storage_path('app/public/' . $originalFilePath);
        if ($originalFilePath && file_exists($mediaFile)) {
            unlink($mediaFile);
        }
        $originalPreviewFilePath = $media->getRawOriginal('media_preview');
        $mediaFilePreview = storage_path('app/public/' . $originalPreviewFilePath);
        if ($originalPreviewFilePath && file_exists($mediaFilePreview)) {
            unlink($mediaFilePreview);
        }


        if ($media->delete()) {
            return ['data' => ['id' => $media->id]];
        }
    }

    protected function deleteOldPreviewImage($oldImageOriginal){
        $mediaFilePreview = storage_path('app/public/' . $oldImageOriginal);
        if ($oldImageOriginal && file_exists($mediaFilePreview)) {
            unlink($mediaFilePreview);
        }
    }

    protected function replaceMediaPreview($request){
        $oldImageOriginal =  Media::findOrFail($request->id)->getRawOriginal('media_preview');
        $newPath = $request->file('mediaPreviewFile')->store('media_previews');
        if($newPath){
            $this->deleteOldPreviewImage($oldImageOriginal);
        }
        return $newPath ;
    }

    public function updateMediaOrder(Request $request)
    {
        $medias = $request->medias;
        foreach ($medias as $key => $media) {
            $myMedia = Media::find($media['id']);
            $myMedia->update([
                'order' => $key + 1
            ]);
        }
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'user_id' => ['required'],
            'title' => ['required', 'string', 'max:255', 'min:3'],
            'type' => ['required', 'string', 'max:255'],
            'url' => ['sometimes', 'max:255'],
            'mediaFile' => ['sometimes', 'file', 'max:25600'], // maximum of 25 mega bytes
            'mediaPreviewFile' => ['sometimes', 'file', 'max:5120','image','mimes:jpeg,png,jpg,gif,svg'], // maximum of 5 mega bytes
            'transcript' => ['max:2500'],
        ]);
    }


}
