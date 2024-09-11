<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
class CheckTypeUesr
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(auth()->check() && (auth()->user()->type_user == 3)){
            
            return redirect()->route('admin.dashboard'); 
            

        }elseif (auth()->check() && (auth()->user()->type_user == 1)) {
            return redirect()->route('driver.dashboard'); 
        }elseif (auth()->check() && (auth()->user()->type_user == 2)) {
            return redirect()->route('seller.dashboard'); 
        }
        return $next($request);
       
        
    }
}
