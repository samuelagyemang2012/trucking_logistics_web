<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;
use App\Traits\HTTPResponses;

class CheckAPI
{
    use HTTPResponses;
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = Auth::user();

        //not a customer
        if ($user->role_id != 2) {
            return $this->error('', 'You are unauthorized to perform this action.', 401);
        }

        //not account not active
        if ($user->status != 12) {
            return $this->error('', 'This account is disabled.', 401);
        }

        return $next($request);
    }
}
