<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckPermission
{
    public function handle(Request $request, Closure $next, ...$permissions)
    {
        // Check if the user is authenticated
        if (!$request->user()) {
            return response()->json(['error' => 'Unauthenticated'], 401);
        }

        // Check if the user has any of the required permissions
        foreach ($permissions as $permission) {
            if ($request->user()->hasPermission($permission)) {
                return $next($request);
            }
        }

        // User does not have the required permissions
        return response()->json(['error' => 'Forbidden'], 403);
    }
}
