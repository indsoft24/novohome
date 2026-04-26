<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    public function handle($request, Closure $next)
{
    if (!session()->has('admin')) {
        return redirect('/admin/login');
    }

    return $next($request);
}
}


