<?php

namespace App\Http\Middleware;

use Closure;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $roles)
    {
        $roles = explode('|', $roles);
        if(is_array(($roles))){
            foreach($roles as $role) {
                if ($request->user()->hasRole($role)) {
                    return $next($request);
                }
                // Check if user has the role This check will depend on how your roles are set up

            }
        }
        if (! $request->user()->hasRole($roles)) {
            return redirect('home');
        }
        return $next($request);

    }
}
