<?php
/**
 * Created by PhpStorm.
 * User: Ahmed-pc
 * Date: 2/14/2020
 * Time: 10:30 AM
 */

namespace App\Http\Controllers;


use App\ResumeLink;
use App\Theme;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ResumeController extends Controller
{


    public function themePreview ( Request $request,$theme_id, $slug = '') {

        $is_preview = $request->real === 'true' ? 'false' : 'true' ;

        $theme = Theme::find($theme_id) ;

        if ($slug !== $theme->slug) {
            return redirect()->to($theme->url . '?real=' . $request->real);
        }

        if($is_preview === 'false' &&  Auth::user()){
            $user = User::withAllRelations( Auth::user()->username);
            if($user){
                return view('defaultThemes.theme' . $theme->code,compact('user','is_preview'));
            }
        }

        return view('defaultThemes.theme' . $theme->code,compact('is_preview'));
    }

    public function themePreviewByCode ($themeCode, Request $request) {
        $authUser = Auth::user();
        $is_preview = $request->real === 'true' ? 'false' : 'true' ;
        if($is_preview === 'false' && $authUser){
            $user = User::withAllRelations($authUser->username);
            if($user){
                return view('defaultThemes.' . $themeCode,compact('user','is_preview'));
            }
        }
        return view('defaultThemes.' . $themeCode,compact('is_preview'));
    }


    public function downloadPDFResume ($themeCode) {
        // search the userdata using userName

        // if ($userName) {
            // $view = \View::make('resume_pdf_themes.' . $themeCode, compact('freelancer'))->render();
            $pdf = \PDF::setOptions(['dpi' => 150, 'defaultFont' => 'Muli', 'fontDir' => public_path('fonts/')])->loadView('defaultPDFThemes.' . $themeCode);

            if (ob_get_contents()) {
                ob_end_clean();
            }

            // return $pdf->stream($freelancer->userData['first_name'] . ' ' . $freelancer->userData['last_name'] . '.pdf');
            return $pdf->stream('resume-'.$themeCode.'.pdf');
        // }

        // return view('defaultPDFThemes.' . $themeCode);
    }

    public function userResume ($username, $version = '') {

        // prepare user
        $user = User::where('username', $username)->first();
        $is_preview = 'false' ;

        if($user){
            $user = User::withAllRelations($username, $this->getVersionID($version, $user->id));
            $theme = Theme::find($this->getVersionThemeID($version, $user->id));
            $themeCode = $theme ? $theme->code : '1001' ;

            return view('defaultThemes.theme' . $themeCode, compact('user','is_preview'));
        }else{
            return abort(404);
        }
    }

    protected function getVersionThemeID($version, $user_id){

        // check if this version exists:
        $whereData = [
            ['url', $version],
            ['user_id', $user_id]
        ];

        $resumeURL = ResumeLink::where($whereData)->first();
        if($resumeURL){
           return $resumeURL->id;
        }

        return 1 ;
    }

    protected function getVersionID($version, $user_id){
        // check if this version exists:
        if($version == ''){
            return '';
        }
        $whereData = [
            ['url', $version],
            ['user_id', $user_id]
        ];

        $resumeURL = ResumeLink::where($whereData)->first();
        if($resumeURL){
            // version exists
           return $resumeURL->id;
        }

        return '' ;
    }


    public function externalReferencePage($username){
        $user = User::where('username', $username)->first();
        if(!$user){
            abort(404);
        }
        return view('resume_builder.external_reference', compact('user'));
    }

}
