<?php
/**
 * Created by PhpStorm.
 * User: Ahmed-pc
 * Date: 2/14/2020
 * Time: 10:30 AM
 */

namespace App\Http\Controllers;


use App\User;

class ResumeController extends Controller
{

    public function themePreview ($themeCode) {
        return view('defaultThemes.' . $themeCode);
    }

    public function downloadPDFResume ($themeCode, $userName) {
        // search the userdata using userName

        if ($userName) {

            // $view = \View::make('resume_pdf_themes.' . $themeCode, compact('freelancer'))->render();
            $pdf = \PDF::setOptions(['dpi' => 150, 'defaultFont' => 'Arial', 'fontDir' => public_path('fonts/')])->loadView('defaultPDFThemes.' . $themeCode);

            if (ob_get_contents()) {
                ob_end_clean();
            }

            // return $pdf->stream($freelancer->userData['first_name'] . ' ' . $freelancer->userData['last_name'] . '.pdf');
            return $pdf->stream('resume-'.$themeCode.'.pdf');
        }

        return view('defaultPDFThemes.' . $themeCode);
    }

    public function userResume ($username) {
        // get user default cv code.
        $user = User::withAllRelations($username);
        if($user){
            // get theme code
            $themeCode = $user->theme_code ;
            return view('userThemes.theme' . $themeCode, compact('user'));
        }else{
            return abort(404);
        }
    }

}
