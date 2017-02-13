<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Support\Facades\DB;

class AuthToken
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
        $user = User::withToken($request->get('token'))->first();
        if($user) {
            return $next($request);
        }

        return response(['status' => 'failed', 'message' => 'Invalid Token'], 403);


    }
}
