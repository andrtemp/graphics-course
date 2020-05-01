<?php

namespace App\Http\Middleware;

use App\Domain\ValueObject\Role;
use Closure;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $role
     * @return mixed
     */
    public function handle($request, Closure $next, $role = Role::STUDENT)
    {
        return $role == user_role() ? $next($request) : redirect()->route('home');
    }
}
