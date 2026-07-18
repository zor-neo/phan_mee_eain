<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class ReadOnlyViewMiddleware
{
    /**
     * Block all write actions when a real admin is browsing in read-only author mode.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (! Auth::check()) {
            return $next($request);
        }

        if (! Auth::user()->isAdminRole() || session('acting_view_mode', 'admin') !== 'author_readonly') {
            return $next($request);
        }

        $routeName = $request->route()?->getName() ?? '';
        $path = $request->path();
        $stateChangingGetPatterns = [
            'save.Content',
            'deleteContent#Process',
            'demote#Process',
            'promote.process',
            'deleteUserProcess',
            'delete#Process',
            'switchRole',
        ];

        $blocksUnsafeMethod = ! in_array($request->method(), ['GET', 'HEAD', 'OPTIONS'], true);
        $blocksUnsafeGet = in_array($routeName, $stateChangingGetPatterns, true)
            || str_contains($path, 'deleteContent/Process')
            || str_contains($path, 'saveContent/')
            || str_contains($path, 'demote/')
            || str_contains($path, 'promotion/')
            || str_contains($path, 'delete/user/')
            || str_contains($path, 'switchRole')
            || str_contains($path, 'category/delete/');

        // AI companion chat is not a content mutation — allow it even in read-only admin view.
        $isAiRoute = str_starts_with($path, config('ai-companion.routes.prefix', 'ai') . '/');

        if ($isAiRoute || (! $blocksUnsafeMethod && ! $blocksUnsafeGet)) {
            return $next($request);
        }

        if ($request->expectsJson()) {
            return response()->json([
                'success' => false,
                'message' => 'This author view is read-only for admins.',
            ], 403);
        }

        return redirect()->back()->withErrors([
            'readonly' => 'This author view is read-only for admins.',
        ]);
    }
}
