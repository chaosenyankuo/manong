<?php

namespace App\Http\Middleware;

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

            return $next($request);
        }else{
            return redirect('/admin/login')->with('error','您还没有登陆!!!请登陆...');
        }
    }
}
