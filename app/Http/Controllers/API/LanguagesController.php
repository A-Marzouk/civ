<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Language;
use App\Http\Resources\Language as LanguageResource;
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
        Auth::user()->languages()->attach($request->language_id);
        return ['language' => Language::find($request->language_id)];
    }


    public function destroy($id)
    {
        // detach a language from user:
        Auth::user()->languages()->detach($id);
        return ['data' => ['id' => $id] ];
    }
}
