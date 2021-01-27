<?php

namespace App\Http\Middleware;

use Closure;
use DB;
use Auth;

class AccessLog
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

        if (Auth::user()) {
            $data = array(
                'last_visited'         => date('Y-m-d H:i:s'),
            );

            DB::table('users')->where('id', Auth::user()->id)->update($data);
        }

        return $next($request);
    }
}
