<?php namespace Bantenprov\StatusTransaksiEpurchasing\Http\Middleware;

use Closure;

/**
 * The StatusTransaksiEpurchasingMiddleware class.
 *
 * @package Bantenprov\StatusTransaksiEpurchasing
 * @author  bantenprov <developer.bantenprov@gmail.com>
 */
class StatusTransaksiEpurchasingMiddleware
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
