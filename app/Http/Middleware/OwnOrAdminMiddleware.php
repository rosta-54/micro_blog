<?php

namespace App\Http\Middleware;

use Closure;

class OwnOrAdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @param $parameter
     * @return mixed
     * @internal param $model
     * @internal param $id
     */
    public function handle($request, Closure $next, $parameter)
    {

        if ($request->user()->inRole('Admin')||$request->route()->parameter($parameter)->user_id == $request->user()->id) {
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