<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class AdminMiddleware
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
        if (Auth::check() && Auth::user()->type_user == 'admin') {

            return $next($request);

        }

        return redirect(url('/'))->with('class', 'alert alert-warning')->with('message', trans('dash.login_firstly'));

    }
}
