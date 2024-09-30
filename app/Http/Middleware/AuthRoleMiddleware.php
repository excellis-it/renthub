<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\User\UserController;

class AuthRoleMiddleware
{

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $role)
    {
        $authRole = Auth::user()->role;
        /*if($authRole=='user'){
            $role = 'user';
        }*/
        if ($authRole === $role) {
            //echo 'hi'; die;
            // Allow the request to continue if roles match
            return $next($request);
        } else {
            //echo 'bye'; die;
            // If roles don't match, redirect back
            return redirect()->back()->with('error', 'Unauthorized access.');
        }
    }
}
