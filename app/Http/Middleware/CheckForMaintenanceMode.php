<?php

namespace App\Http\Middleware;

use Closure;

use Symfony\Component\HttpKernel\Exception\HttpException;
class CheckForMaintenanceMode
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
        //指定ip客户端可以访问
     /* if (app()->isDownForMaintenance() && !in_array($request->getClientIp(), ['::1', '127.0.0.1'])) {
     throw new HttpException(503);
     }*/
     //指定路由可以访问
     if(app()->isDownForMaintenance()){
     if(!$request->is('admin*','ptag*','comment*','wuliu*','zhifu*','dingdan*','shop*','flavor*','com*','cate*','pack*','tag*','user*','uaddress*','link*','lunbotu*','yhj*')){
     throw new HttpException(503);
        }
     }
 
        return $next($request);
    }
}
