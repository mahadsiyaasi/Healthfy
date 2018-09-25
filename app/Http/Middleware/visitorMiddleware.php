<?php

namespace Healthfy\Http\Middleware;

use Closure;
use Sentinel;
class visitorMiddleware
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
        if (!Sentinel::check()) {
          return $next($request);
        }else{
            return redirect("/");
        }
      
    }
}
