<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Language;
use App\Http\Resources\Language as LanguageResource;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LanguagesController extends Controller
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
        $languages = Auth::user()->languages;
        return LanguageResource::collection($languages);
    }

    public function languagesList()
    {
        $languages = Language::all();
        return LanguageResource::collection($languages);
    }

    public function store(Request $request)
    {
       // attach a language to user:
        $user= User::find($request->user_id);
        $user->languages()->attach($request->language_id);
        return ['language' => Language::find($request->language_id)];
    }

    public function storeMany(Request $request)
    {
       // attach a language to user:
        $user= User::find($request->user_id);
        // find the language id by name:
        $languagesID = [];
        foreach($request->langs as $language){
            $languagesID[] = Language::where('label', $language)
                ->orWhere('label', 'like', '%'.$language.'%')->first()->id;
        }

        $user->languages()->sync($languagesID, false);
        return $user->languages;
    }


    public function destroy($id,$user_id)
    {
        // detach a language from user:
        $user= User::find($user_id);
        $user->languages()->detach($id);
        return ['data' => ['id' => $id] ];
    }
}
