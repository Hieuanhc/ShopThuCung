<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminLoginMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        \Log::info('AdminLoginMiddleware: Executing', [
            'is_authenticated' => Auth::check(),
            'user' => Auth::user() ? Auth::user()->toArray() : null,
        ]);

        if (Auth::check() && Auth::user()->id_phanquyen == 1) {
            return $next($request);
        }
        return redirect('/admin')->with('thongbao', 'Không có quyền truy cập.');
    }
}