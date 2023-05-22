<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RestrictIpAddress
{
    public $restrictedIp = [
        '192.168.0.211'
    ];

    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
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
