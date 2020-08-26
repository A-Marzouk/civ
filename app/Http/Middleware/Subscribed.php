<?php

namespace App\Http\Middleware;

use Carbon\Carbon;
use Closure;

class subscribed
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $user = auth()->user();
        $subscription = $user->subscription ?? null ;

        if($user->can('test.builder.users') || env('APP_ENV') === 'local'){
            return $next($request);
        }

        if ($subscription) {
           if($subscription->sub_status === 'active' && !$this->isExpired($subscription)){
               return $next($request);
           }
        }

        return redirect('/subscribe');
    }

    protected function isExpired($subscription){
        $expiring_date = Carbon::parse($subscription->expires_at);
        $todays_date   = Carbon::now();

        return $todays_date->gt($expiring_date);
    }
}
