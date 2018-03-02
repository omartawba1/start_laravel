<?php

namespace App\Http\Middleware;

use Closure;
use Carbon\Carbon;

class Locale
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
        if (session()->has('locale')) {
            $lang = session()->get('locale');
            app()->setLocale($lang);
            Carbon::setLocale($lang);
        } else {
            session()->put('locale', config('app.locale'));
            app()->setLocale(config('app.locale'));
        }

        return $next($request);
    }
}
