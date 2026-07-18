<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class UserMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (! Auth::check()) {
            return redirect('/login');
        }

        $user = Auth::user();
        $viewMode = session('acting_view_mode', $user->role === 'admin' ? 'admin' : $user->role);

        if (in_array($user->role, ['user', 'author'], true)) {
            return $next($request);
        }

        if ($user->role === 'admin' && in_array($viewMode, ['user', 'author_readonly'], true)) {
            return $next($request);
        }

        return redirect('/dashboard');

    }
}
