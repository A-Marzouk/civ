<?php
/**
 * Created by PhpStorm.
 * User: Ahmed-pc
 * Date: 2/14/2020
 * Time: 10:30 AM
 */

namespace App\Http\Controllers;


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

    public function userResume ($username) {
        // get user default cv code.
        $user = User::withAllRelations($username);
        $is_preview = 'false' ;
        if($user){
            // get theme code
            $themeCode = $user->theme ? $user->theme->code : '1001' ;
            return view('defaultThemes.theme' . $themeCode, compact('user','is_preview'));
        }else{
            return abort(404);
        }
    }

}
