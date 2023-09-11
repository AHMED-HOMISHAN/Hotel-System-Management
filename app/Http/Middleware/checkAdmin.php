<?php

namespace App\Http\Middleware;

use App\Models\staff;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class checkAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {

        if((auth()->user()->type =='admin' ||auth()->user()->type =='superAdmin') && auth()->user()->status == '1' ){

            return $next($request);
        }
        elseif(auth()->user()->type =='user'  &&  auth()->user()->status == '1'){
            return redirect('/home');
        }else{
            Auth::logout();
            return redirect()->route('login')->with('error','تم حظر حسابك');
        }
    }
}
