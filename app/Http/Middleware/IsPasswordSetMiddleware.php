<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;

class IsPasswordSetMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {

        //force user to set password until password is set
        if(auth()->check()
            && auth()->user()->password == User::TENANT_DEFAULT_PASSWORD
            && !$request->password
            && !$request->is('setpassword')
        ){
            return redirect()->route('setpassword');
        }

        return $next($request);
    }
}
