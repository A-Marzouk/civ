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

        if($user->can('test.builder.users') || env('APP_ENV') === 'local' || $user->isSubscribed()){
            return $next($request);
        }

        return redirect('/subscribe');
    }

}
