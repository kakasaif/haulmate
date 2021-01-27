<?php

namespace App\Http\Middleware;

use Auth;
use Closure;

class AdminRole
{

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role1, $role2 = '', $role3 = '', $role4 = '')
    {
        $admin = Auth::user();
        // ensure that authenticated admin user has one of the required roles
        if (!empty($admin->role) && in_array($admin->role, [$role1, $role2, $role3, $role4])) {
            return $next($request);
        }

        return redirect('portal')->with(['error' => 'Unauthorized access']);
    }

}
