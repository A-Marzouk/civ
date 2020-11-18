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

        $agents = User::whereHas('roles', function ($q) {
            $q->where('roles.name', 'agent'); // or whatever constraint you need here
        })->get();
        $clients = User::whereHas('roles', function ($q) {
            $q->where('roles.name', 'client'); // or whatever constraint you need here
        })->get();

        $deletedUsers = User::onlyTrashed()->get();

        // get all users:
        foreach ($agents as $agent){
            $agent['can_test_builder'] = $agent->can('test.builder.users');
            $agent['subscription'] = $agent->subscription;
            if($agent->subscription){
                $agent['subscription']['promocode'] = $agent->subscription->promocode;
            }
        }

        $users['agents'] = $agents;
        $users['deletedUsers'] = $deletedUsers;
        $users['clients'] = $clients;

        return view('admin.dashboard', compact('users'));
    }

    public function userFullEdit($username){
        $user = User::where('username', $username)->first();
        $tempUser = User::withAllRelations($username, $user->defaultResumeLink->id);
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
        $senderEmail = $request->sender . '@civ.ie' ?? 'hi@civ.ie' ;
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

        Mail::to($to)->send(new CustomMail($emailSubject, $emailData, $senderEmail));
    }

    public function mailPreview(){
        $emailData = [
            'header'     => request('header') ?? 'Header placeholder',
            'body'       => request('body') ?? 'Email body placeholder | Email body placeholder | Email body placeholder',
            "actionText" => request('actionText') ?? 'Placeholder',
            "actionURL"  => request('actionURL') ?? '#',
            "footer"     => request('footer') ?? 'Footer placeholder'
        ];

        return (new CustomMail('Hi, Email preview', $emailData, 'info@civ.ie'))
            ->subject('Hi, Email preview')
            ->markdown('emails.admin.custom_mail');
    }
}
