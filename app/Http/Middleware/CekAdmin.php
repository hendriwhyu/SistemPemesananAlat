<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class CekUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        $user = Auth::user();
        if(!Auth::check() || $user != '1'){
            return abort('403');
        }return $next($request);
        // if (in_array($user->id_role, $roles)) {
        //     return $next($request);
        // }
        // abort(403, 'Unauthorized action.');
    }
}
