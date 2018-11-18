<?php
/**
 * Created by PhpStorm.
 * User: roman
 * Date: 11/15/18
 * Time: 10:35 PM
 */

namespace App\Http\Middleware;
use Closure;

class CheckByAdminMiddleware
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
    public function handle($request, Closure $next)
    {

        if ($request->user()->inRole('Admin')) {
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