<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\View;

use App\Models\Notifications;
use Auth;
class Notification
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(Auth::check()){
            View::share('notifications', Notifications::where('user', Auth::user()->id)->where('status', 1)->orderByDesc('id')->limit(5)->get());
        }

        return $next($request);
    }
}
