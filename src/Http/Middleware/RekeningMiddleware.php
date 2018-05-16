<?php namespace Bantenprov\Rekening\Http\Middleware;

use Closure;

/**
 * The RekeningMiddleware class.
 *
 * @package Bantenprov\Rekening
 * @author  bantenprov <developer.bantenprov@gmail.com>
 */
class RekeningMiddleware
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
        return $next($request);
    }
}
