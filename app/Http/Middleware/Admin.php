<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Admin
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
        if (Auth::user()->is_admin == true) {
            return $next($request);
        }
        $response = [
            'status' => 2,
            'message' => 'You are not permission to do this operation!!!',
        ];

        return response()->json($response, 413);
    }
}
