<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) {

            $user = Auth::user();

            if ($user->role_id != 1) {
                // abort(403, 'Unauthorized action.');
                return redirect()->route('show.login')->with('danger', 'Your are not authorized to perform this action.');
            }

            // if ($user->status = 12) {
            //     return redirect()->route('admin.password.change')->with('info', 'Welcome! For your security, please update your password to get started.');
            // }
        }

        return $next($request);
    }
}
