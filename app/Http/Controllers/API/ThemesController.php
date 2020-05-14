<?php

namespace App\Http\Controllers\API;

use App\classes\Upload;
use App\Http\Controllers\Controller;
use App\Theme;
use Exception;
use App\Http\Resources\Theme as ThemeResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ThemesController extends Controller
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
    public function themesList()
    {
        $themes = Theme::all();
        return ThemeResource::collection($themes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }



    public function store(Request $request)
    {

        $this->validator($request->all())->validate();

        if($request->isMethod('put')){
            $theme = Theme::findOrFail($request->id);
            $theme->update($request->toArray());
        }else{
            $theme = Theme::create($request->toArray());
        }


        if (isset($_FILES['image'])) {
            $pathToPicture = Upload::themePreview('image');
            if($pathToPicture){
                $theme->update([
                    'image' => '/'.$pathToPicture
                ]);
            }else{
                throw new Exception('Failed to upload image');
            }
        }

        if ($theme->id){
            return new ThemeResource($theme);
        }

        return "Couldn't create";
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        $theme = Theme::where([
            'id' => $id,
        ])->first();

        if($theme->delete()){
            return ['data' => ['id' => $theme->id] ];
        }

        return "Couldn't delete";
    }


    protected function validator(array $data)
    {
        return Validator::make($data, [
            'title' => ['sometimes','string','max:255','min:3'],
            'category' => ['sometimes','string','max:255','min:3'],
            'job_title' => ['sometimes','string','max:255','min:3'],
            'emotions' => ['sometimes','max:255','min:1'],
            'design_style' => ['sometimes','string','min:3','max:255'],
            'color' =>['sometimes','string','max:255','min:3'],
            'code' =>['sometimes','string','max:255','min:1', 'unique:themes'],
            'image' =>['sometimes','image','max:255']
        ]);
    }

    protected function availableThemesCodes(){
        $themesFiles = Storage::disk('themes')->files('');
        $themeCodes = [] ;
        foreach ($themesFiles as $file){
            preg_match_all('!\d+!', $file, $matches);
            $themeCodes[] = implode(' ', $matches[0]) ;
        }

        return $themeCodes ;
    }
}
