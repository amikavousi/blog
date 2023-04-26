<?php

namespace LoginRegisterApp\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;

class LoginValidation
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
        $validator = Validator::make($this->getData(), $this->getRules());
        if ($validator->fails()){
            return redirect()->back()->withErrors($validator, 'login')->withInput();
        }
        return $next($request);
    }

    private function getData()
    {
        return request()->only([
            'emailOrUsername',
            'password',
        ]);
    }

    private function getRules()
    {
        return [
            'emailOrUsername' => ['required'],
            'password' => ['required', Password::min(8)]
        ];
    }

}
