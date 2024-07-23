<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Auth;
use Illuminate\Auth\AuthManager;
use Illuminate\Auth\SessionGuard;

class apiAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {


   

   
      $api_key=Auth::user()->api_token;


     

    
   
        if ($api_key == "helloatg") {
            
           
            return $next($request);
        }
      

        return response()->json([
            'status' => 0,
            'message' => 'Invalid API key',
        ], 401);

        
    }
}
