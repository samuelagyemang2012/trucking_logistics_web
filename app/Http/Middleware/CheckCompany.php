<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckCompany
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

            if ($user->role_id != 3) {
                abort(403, 'Unauthorized action.');
            }

            if ($user->status != 11) {
                return redirect()->route('show.login')->with('info', 'Your account is pending verification.');
            }
        }

        return $next($request);

        // abort(403, 'Unauthorized action.');
    }
}
