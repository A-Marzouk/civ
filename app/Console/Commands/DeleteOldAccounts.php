<?php

namespace App\Console\Commands;

use App\Mail\AccountDeleted;
use App\Mail\ActivationReminder;
use App\Mail\AdminNotification;
use App\User;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class DeleteOldAccounts extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:deleteOldAccounts';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete deactivated accounts with 30 days old';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        // get trashed users and check the deleted_at data
        $trashedUsers = User::onlyTrashed()->get();

        foreach ($trashedUsers as $user){
            $today         = new Carbon(Carbon::now()->toDateTimeString());
            $deleted_at    = new Carbon($user->deleted_at);

            $this->takeAction($today->diffInDays($deleted_at), $user);
        }

        $this->notifyAdmin();

    }


    protected function takeAction($days, $user){
        if($days === 23){
            Mail::to($user)->send(new ActivationReminder($user, '7 Days'));
        }
        elseif ($days === 29){
            Mail::to($user)->send(new ActivationReminder($user,'24 hours'));
        }
        elseif ($days === 30){
            Mail::to($user)->send(new AccountDeleted($user));
            $user->forceDelete();
        }
    }

    protected function notifyAdmin(){
        $to = [
            [
                'email' => 'ahmedmarzouk266@gmail.com',
                'name' => 'Ahmed Marzouk',
            ]
        ];
        Mail::to($to)->send(new AdminNotification('Cron job check', ' Cron job has been checking for the trashed accounts'));
    }
}
