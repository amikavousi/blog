<?php

namespace LoginRegisterApp\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use LoginRegisterApp\Controller\LoginRegisterController;
use LoginRegisterApp\DB\FindUser;

class AuthCheck
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $user = FindUser::findUser(request(['emailOrUsername']));
        if ($user != null
            && ($request['emailOrUsername'] === $user->email || $request['emailOrUsername'] === $user->username)
            && Hash::check($request['password'], $user->password)) {
            return $next($request);
        }
        return redirect()->back()->with('failed', 'Information its not correct');
    }
}
