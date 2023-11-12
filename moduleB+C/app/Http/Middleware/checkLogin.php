<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;


class checkLogin
{
    
    public function handle(Request $request, Closure $next)
    {
        if (session()->has('user')) {
            return $next($request);
        } else {
            return redirect()->back()->with('error', 'Ban phai dang nhap truoc');
        }
    }
}
