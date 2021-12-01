<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, ...$role)
    {

        $data_user = Auth::user();
        if(!$data_user){
            return redirect('logout');
        }
        if(! in_array($data_user->role, $role)){
            return redirect('logout');
        }
        return $next($request);
        
    }
}

