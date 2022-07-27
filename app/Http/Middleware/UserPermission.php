<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use App\Models\Post;

class UserPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $role)
    {
        $type_user = $request->user()->type;
        $check_author = 0;

        if ($role === 'post') {
            $post = Post::where('user_id', Auth::id())->where('id', $request->route('id'))->get();
            $check_author = $post->count();
        }

        if ($type_user === 'A' || $check_author === 1) {
            return $next($request);
        }

        return redirect('/');
    }
}
