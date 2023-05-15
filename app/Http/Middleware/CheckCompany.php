<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

use Auth;

class CheckCompany
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = Auth::user();

        if ($user->companies->count() < 1 || !$user->memberships) {
            $request->session()->put('showCompanyModal', true);
        }else{
            $request->session()->forget('showCompanyModal');
        }

        return $next($request);
    }
}
