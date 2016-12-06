<?php

namespace App\Http\Middleware;

use Closure;

class checkAge
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
        /**
         *中间件练习
         */
        public function handle($request, Closure $next){

            if($request->input('age') = '13'){
                return redirect('childrenOnly');
            }
            
            //可以请求处理后执行任务也可以先处理请求，再执行任务
            return $next($request);//请求处理
        }
        
    }
}
