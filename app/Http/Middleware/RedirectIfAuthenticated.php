<?php

namespace App\Http\Middleware;

use App\Http\Traits\ApiTrait;
use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticated
{
    use ApiTrait; 
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string ...$guards): Response
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
           if($guard == 'sanctum')
           {
            return $this->apiResponse('401' , 'You Are Already Logged In', 'null' , 'null') ;
           }
        }

        return $next($request);
    }
}