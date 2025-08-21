<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class StudentProfileCompleted
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {  
        $profile = $request->user()->studentProfile;
        if (!$profile || !$profile->is_completed) {
            return response()->json(
                [
                    'status' => 'error',
                    'message' => 'Your student profile is not completed',
                ], 403);
        }
        return $next($request);
    }
}
