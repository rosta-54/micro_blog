<?php

namespace App\Http\Middleware;

use Closure;

class PostStoreMiddleware
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
        if ($request->user()->inRole('Admin')||$request->user()->inRole('Editor')) {
            return $next($request);
        }
        else{
            return response([
                'success' => false,
                'message' => ['success' => false, 'message' => 'insufficient permission']
            ]);
        }
    }
}
