<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RestrictIpAddress
{
    public $restrictedIp = [
       /* '127.0.0.1',
        '127.0.0.2',
        '127.0.0.3',*/
    ];
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (in_array($request->ip(), $this->restrictedIp)) {
            abort(403, "You are restricted to access the site.");
            // return response()->json(['message' => "You are not allowed to access this site."]);
        }
        return $next($request);
    }
}
