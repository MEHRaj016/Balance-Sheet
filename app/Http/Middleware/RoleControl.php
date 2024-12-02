<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleControl
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role): Response
    {
        if (!Auth::check()){
            return redirect()->route("login");
        }
        $roelOfuse = Auth::user()->role;


        switch($role){
            case "admin":
                if ( $roelOfuse == 1 ){
                    return $next($request);
                }
                break;
            case "user":
                if ( $roelOfuse == 2 ){
                    return $next($request);
                }
                break;
        }

        switch ($roelOfuse) {
            case 1:
                return redirect()->route("admin");
                break;
            case 2:
                return redirect()->route("dashboard");
                break;
        }
        return redirect()->route("login");
    }
}
