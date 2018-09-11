<?php

namespace App\Http\Middleware;

use App\User;
use Closure;
use Illuminate\Foundation\Testing\Concerns\session;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        if(\Session::has('id')){
            $user = User::findOrFail(\Session::get('id'));
            if($user['qx']==2){
                 return back()->with('error','权限不足');
            }
            if($user['qx']==3){
                 return back()->with('error','权限不足');
            }
            return $next($request);
        }else{
            return redirect('/admin/login')->with('error','您还没有登陆!!!请登陆...');
        }
    }
}
