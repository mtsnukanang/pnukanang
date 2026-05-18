<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

/**
 * Ensures the authenticated user has admin privileges.
 * Falls back to login route if not authenticated, or aborts 403 if logged in but not admin.
 */
class AdminMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        if (! Auth::check()) {
            return redirect()->route('admin.login');
        }

        $user = Auth::user();

        if (! $user->is_admin) {
            abort(403, 'Akses ditolak. Anda bukan admin.');
        }

        return $next($request);
    }
}
