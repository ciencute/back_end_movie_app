<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ValidateJwtToken
{

    public function handle(Request $request, Closure $next)
    {
        if(auth()->user()){
            return $next($request);
        }
        else {
            return response([
                'message' => "unauthorized",
                'success' => false,
            ], Response::HTTP_UNAUTHORIZED);
        }
    }
}
