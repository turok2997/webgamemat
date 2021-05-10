<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TeacherCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
//    public function handle(Request $request, Closure $next)
//    {
//        $roleName = Auth::user()->roles->first()->name;
//        if ($roleName !='teacher') return  redirect()->back();
//        return $next($request);
        public function handle(Request $request, Closure $next)
    {
        switch(Auth::user()->role_id){
            case 2:
                return $next($request);
                break;
            default:
                return abort(403);

        }
    }

}
