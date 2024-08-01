<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class PreventRequestsDuringMaintenance
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (app()->isDownForMaintenance()) {
            return response()->json([
                'message' => 'The application is currently undergoing maintenance. Please try again later.'
            ], 503);
        }

        return $next($request);
    }
}
