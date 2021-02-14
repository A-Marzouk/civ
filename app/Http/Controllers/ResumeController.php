<?php
/**
 * Created by PhpStorm.
 * User: Ahmed-pc
 * Date: 2/14/2020
 * Time: 10:30 AM
 */

namespace App\Http\Controllers;


use App\Mail\ResumeMessage;
use App\ResumeLink;
use App\Theme;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class ResumeController extends Controller
{


    public function themePreview(Request $request, $theme_id, $slug = '')
    {

        $is_preview = $request->real === 'true' ? 'false' : 'true';

        $theme = Theme::find($theme_id);

        if ($slug !== $theme->slug) {
            return redirect()->to($theme->url . '?real=' . $request->real);
        }

        if ($is_preview === 'false' && Auth::user()) {
            $user = User::withAllRelations(Auth::user()->username, Auth::user()->resume_link_id);
            if ($user) {
                return view('defaultThemes.theme' . $theme->code, compact('user', 'is_preview'));
            }
        }

        return view('defaultThemes.theme' . $theme->code, compact('is_preview'));
    }

    public function themePreviewByCode($themeCode, Request $request)
    {
        return view('defaultThemes.new.' . $themeCode);
    }


    public function downloadPDFResume($themeCode, $username, $version = '', Request $request)
    {
        // search the userdata using userName

        // if ($username) {
        $user = User::where('username', $username)->first();
        $user = User::withAllRelations($username, $this->getVersionID($version, $user->id));
        $pdf = \PDF::setOptions(['dpi' => 150, 'defaultFont' => 'Muli', 'fontDir' => public_path('fonts/')])->loadView('defaultPDFThemes.' . $themeCode, compact('user'));

        // dd($user->workExperience);
        // dd($socialLinks);

        if (ob_get_contents()) {
            ob_end_clean();
        }

        // return $pdf->stream($freelancer->userData['first_name'] . ' ' . $freelancer->userData['last_name'] . '.pdf');
        return $pdf->stream('resume-' . $username . '.pdf');
        // }

        // return view('defaultPDFThemes.' . $themeCode, compact('user'));
    }

    public function userResume($username, $version = '')
    {

        // prepare user
        $user = User::where('username', $username)->first();
        $is_preview = 'false';

        if ($user) {
            $versionID =  $this->getVersionID($version, $user->id);
            if( ! $versionID){
                return abort(404);
            }
            $user = User::withAllRelations($username, $versionID);
            $theme = Theme::find($this->getVersionThemeID($version, $user->id));
            $themeCode = $theme ? $theme->code : '1001';
            return view('defaultThemes.theme' . $themeCode, compact('user', 'is_preview'));
        } else {
            return abort(404);
        }
    }

    public function hireModalTest()
    {
        $user = User::where('username', '123workforce')->first();
        $user = User::withAllRelations('123workforce', $this->getVersionID('anton', $user->id));
        return view('hire_me_updated', compact('user'));
    }

    public function hireModalTestNoPayment()
    {
        $user = User::where('username', '123workforce')->first();
        $user = User::withAllRelations('123workforce', $this->getVersionID('nishad', $user->id));
        return view('hire_me_updated', compact('user'));
    }

    protected function getVersionThemeID($version, $user_id)
    {

        // check if this version exists:
        $whereData = [
            ['url', $version],
            ['user_id', $user_id]
        ];

        $resumeURL = ResumeLink::where($whereData)->first();
        if ($resumeURL) {
            return $resumeURL->theme_id;
        }

        return 1;
    }

    protected function getVersionID($version, $user_id)
    {
        // check if this version exists:
        $whereData = [
            ['url', $version],
            ['user_id', $user_id]
        ];

        $resumeURL = ResumeLink::where($whereData)->first();
        if ($resumeURL) {
            // version exists
            return $resumeURL->id;
        }

        return '';
    }

    public function externalReferencePage($username)
    {
        $user = User::where('username', $username)->first();
        if (!$user) {
            abort(404);
        }
        return view('resume_builder.external_reference', compact('user'));
    }

    public function sendResumeMessage(Request $request)
    {
        $emailData = [
            'header' => 'New message on resume.',
            'body' => $request->message['body'],
            'actionText' => 'Open resume',
            'actionURL' => $request->resumeURL,
            'footer' => 'Civ.ie team.'
        ];

        $from = [
            'name' => $request->message['name'],
            'email' => $request->message['email']
        ];

        $to[] = [
            'name' => '123workforce admin',
            'email' => 'conor@123workforce.com',
        ];

        $cc[] =  [
            'name' => 'Ahmed Marzouk - admin',
            'email' => 'ahmedmarzouk266@gmail.com'
        ];

        Mail::to($to)
            ->cc($cc)
            ->send(new ResumeMessage($emailData, $from));

        return ['status' => 'success'];

    }

}
