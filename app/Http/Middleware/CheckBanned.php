<?php

namespace App\Http\Middleware;

use Closure;
use Carbon\Carbon;
use Illuminate\Support\Str;

class CheckBanned
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
       if (auth()->check() && auth()->user()->banned_until && now()->lessThan(auth()->user()->banned_until)) {
            $banned_days = now()->diffInDays(auth()->user()->banned_until);
            auth()->logout();

            if ($banned_days > 14) {
                $message = 'Your account has been placed in lockout mode. Please contact administrator.';
            } else {
                $message = 'Your account has been placed in lockout mode for '.$banned_days.' '.Str::plural('day', $banned_days).'. Please contact administrator.';
            }

            return redirect()->route('login')->withMessage($message);
        }

        return $next($request);
    }
    
}
