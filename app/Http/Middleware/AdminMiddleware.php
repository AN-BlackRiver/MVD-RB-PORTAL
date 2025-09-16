<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        if (! Auth::check()) {
            return redirect()->route('login')->with('error', 'Требуется авторизация');
        }

        /** @var User $user */
        $user = Auth::user();

        if (! $user->isAdmin()) {

            abort(403, 'Доступ запрещен. Требуются права администратора.');
        }

        return $next($request);
    }
}
