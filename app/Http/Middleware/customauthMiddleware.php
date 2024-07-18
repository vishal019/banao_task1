<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class customauthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        $path =$request->path();
        
      
        echo(session()->has('username'));

        if(session()->has('username')){

            echo('session is not present');


            if($path == '/'){
                
  
            return redirect('dashboard');
  
           
         }
       
    }
    return $next($request);
}
}
