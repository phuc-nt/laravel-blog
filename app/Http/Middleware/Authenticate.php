<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

use Session;

class Authenticate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->guest()) {
            if ($request->ajax() || $request->wantsJson()) {
                return response('Unauthorized.', 401);
            } else {
                //set flash data with warning message
                Session::flash('warning', 'You are not login yet!');

                // redirect to Login page
                return redirect()->guest('auth/login');
            }
        }

        return $next($request);
    }
}
