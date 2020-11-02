<?php
/**
 * Created by PhpStorm.
 * User: Ahmed-pc
 * Date: 2/24/2020
 * Time: 10:39 AM
 */

namespace App\Http\Controllers;


use App\Mail\CustomMail;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class AdminsController extends Controller
{
    public function __construct(){
        $this->middleware(['auth','role:admin']);
    }

    public function index(){
        // get all users:
        $users = User::all();
        foreach ($users as $user){
            $user['is_admin'] = $user->hasRole('admin');
            $user['can_test_builder'] = $user->can('test.builder.users');
            $user['subscription'] = $user->subscription;
            if($user->subscription){
                $user['subscription']['promocode'] = $user->subscription->promocode;
            }
        }

        // get deleted users:
        $deletedUsers = User::onlyTrashed()->get();
        return view('admin.dashboard', compact('users','deletedUsers'));
    }

    public function userFullEdit($username){
        $tempUser = User::withAllRelations($username);
        if(!$tempUser){
            return redirect('/workforce-admin');
        }

        $is_admin = false ;

        if(Auth::user()->hasRole('admin')){
            $is_admin = true;
        }

        return view('admin.resume-builder',compact('tempUser','is_admin'));
    }

    public function sendCustomEmail(Request $request){
        $toEmails = $request->receivers ;
        $to = [];

        foreach ($toEmails as $emailInfo){
            $to[] = [
              'name' => $emailInfo['name'],
              'email' => $emailInfo['email'],
            ];
        }
        $emailData    = $request->data ?? [] ;
        $emailSubject = $request->subject ?? [] ;

        Mail::to($to)->send(new CustomMail($emailSubject, $emailData));
    }

    public function mailPreview(){
        $emailData = [
            'header'=>'Hi, I\'am a civ freelancer!',
            'body'=>'I would like to apply to your job.',
            "actionText"=>'View My Profile',
            "actionURL"=>'https://civ.ie/user',
            "footer"=>'Civ freelancer.'
        ];

        return (new CustomMail('Hi', $emailData))
            ->subject('Test')
            ->markdown('emails.admin.custom_mail');
    }
}
