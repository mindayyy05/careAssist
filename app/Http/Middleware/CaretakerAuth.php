<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CaretakerAuth
{
    public function handle($request, Closure $next)
    {
        if (Auth::guard('caretaker')->check()) {
            return $next($request);
        }
        return redirect()->route('caretaker_login'); // Ensure the route is correct
    }
}
