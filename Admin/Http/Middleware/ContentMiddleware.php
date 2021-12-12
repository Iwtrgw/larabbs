<?php

namespace App\Http\Middleware;

use Auth;
use Closure;
use Illuminate\Support\Facades\Log;
use Monolog\Logger;

/**
 *  内容中间件
 * Class ContentMiddleware
 * @package App\Http\Middleware
 */
class ContentMiddleware {
	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next) {

		// 如果是登录用户的话
		if (Auth::check()) {

		    // 记录用户访问内容记录
			Log::info('查看内容用户',Auth::user());
		}

		return $next($request);
	}
}
