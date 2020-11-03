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
            'header'     => request('header') ?? 'Header placeholder',
            'body'       => request('body') ?? 'Email body placeholder | Email body placeholder | Email body placeholder',
            "actionText" => request('actionText') ?? 'Placeholder',
            "actionURL"  => request('actionURL') ?? '#',
            "footer"     => request('footer') ?? 'Footer placeholder'
        ];

        return (new CustomMail('Hi, Email preview', $emailData))
            ->subject('Hi, Email preview')
            ->markdown('emails.admin.custom_mail');
    }
}
