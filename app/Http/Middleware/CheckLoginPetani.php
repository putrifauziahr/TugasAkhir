<?php

namespace App\Http\Middleware;

use Closure;

class CheckLoginPetani
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
        if (!session('berhasil_login')) {
            return redirect('petani/login');
        }
        return $next($request);
    }
}
