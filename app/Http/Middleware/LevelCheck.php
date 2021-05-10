<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class LevelCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $input = $request->all();
//        $levelcheck = User::where('id', Auth::user()->id)->get();
        if(isset($request->currentlevel)) $currentlevel = $request->currentlevel;
//        if(isset($request->currentlevel1)) $currentlevel = $request->currentlevel1;
//        if($currentlevel=='lvl-2'){
//            if(isset($input['check']) or isset($input['check1'])){
//                $update_level = User::where('id', Auth::user()->id)->update(['currentlevel' => 'lvl-2']);
//            }
//        }
        $user_id = User::where('id', Auth::user()->id)->get();

        if ($currentlevel!=$user_id[0]->currentlevel) return redirect()->back();

        return $next($request);
    }
}
