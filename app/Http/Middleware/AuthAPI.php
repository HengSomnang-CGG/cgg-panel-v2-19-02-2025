<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\User;

class AuthAPI
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
       $apiToken =$request->header('x-api-token');
       $email= 'test@example.com';
       if($apiToken) {
         $user =User::where('api_token',$apiToken)->first();
         if($user) {
            return $next($request);
         }
       }
       return response()->json(['cgg' => 'forbidden area'], 403);
    }
}
