<?php

namespace App\Http\Middleware;

use App\User;
use Closure;
use Illuminate\Support\Facades\Auth;

class ValidateApiTokenMiddleware
{
   public static $AuthUser;
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        if ( \App::environment(['local'] ) ) {
        return $next($request);
    }
        if (!$request->header('token'))
        {
            abort(404, 'token not found');
        }
        $user = User::matchToken($request->header('token'))->get();
        if (!$user) {
            abort (404, 'token mismatch');
        }
//        self::$AuthUser = $user;
        return $next($request);
    }
}
