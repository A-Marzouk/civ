<?php

namespace App\Http\Middleware;

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
           if($subscription->sub_status === 'active'){
               return $next($request);
           }
        }

        return redirect('/subscribe');
    }
}
