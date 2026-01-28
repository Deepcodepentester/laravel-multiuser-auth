<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Auth\AuthenticationException;
class MultiUserAuth extends Middleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    /* public function handle(Request $request, Closure $next)
    {
        return $next($request);
    } */

    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            return route('login');
        }
    }

    protected function unauthenticated($request, array $guards)
    {
        /* throw new AuthenticationException(
            'Unauthenticated.', $guards, $this->redirectTo($request)
        ); */
        foreach ($guards as $guard) {
            
            if ($this->auth->guard($guard) == $this->auth->guard('admin')) {
                
                throw new AuthenticationException(
                    'Unauthenticated.', $guards, 'admin/login'
                );
            }
            if ($this->auth->guard($guard) == $this->auth->guard('vendor')) {
                
                throw new AuthenticationException(
                    'Unauthenticated.', $guards, 'vendor/login'
                );
            }
            throw new AuthenticationException(
                'Unauthenticated.', $guards, $this->redirectTo($request)
            );
        }
    }
}
