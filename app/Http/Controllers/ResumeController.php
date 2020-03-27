<?php
/**
 * Created by PhpStorm.
 * User: Ahmed-pc
 * Date: 2/14/2020
 * Time: 10:30 AM
 */

namespace App\Http\Controllers;


use App\User;
use Illuminate\Support\Facades\Auth;

class ResumeController extends Controller
{


    public function themePreview ($themeCode) {
        $authUser = Auth::user();
        $is_preview = 'true' ;
        if($authUser){
            $user = User::withAllRelations($authUser->username);
            if($user){
                return view('defaultThemes.' . $themeCode,compact('user','is_preview'));
            }
        }
        return view('defaultThemes.' . $themeCode,compact('is_preview'));
    }

    public function downloadPDFResume ($themeCode, $userName) {
        // search the userdata using userName

        if ($userName) {
            // $view = \View::make('resume_pdf_themes.' . $themeCode, compact('freelancer'))->render();
            $pdf = \PDF::setOptions(['dpi' => 150, 'defaultFont' => 'Helvetica', 'fontDir' => public_path('fonts/')])->loadView('defaultPDFThemes.theme' . $themeCode);

            if (ob_get_contents()) {
                ob_end_clean();
            }

            // return $pdf->stream($freelancer->userData['first_name'] . ' ' . $freelancer->userData['last_name'] . '.pdf');
            return $pdf->stream('resume-'.$themeCode.'.pdf');
        }

        return view('defaultPDFThemes.theme' . $themeCode);
    }
    
    public function userResume ($username) {
        // get user default cv code.
        $user = User::withAllRelations($username);
        $is_preview = 'false' ;
        if($user){
            // get theme code
            $themeCode = $user->theme_code ;
            return view('defaultThemes.theme' . $themeCode, compact('user','is_preview'));
        }else{
            return abort(404);
        }
    }

}
