<?php

namespace MailServiceApp\middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class EmailValidation
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $validator = Validator::make($request->only('email'), ['email' => 'required|email']);
        if ($validator->fails()){
            throw ValidationException::withMessages($validator->errors()->getMessages())->redirectTo('/posts#subscribe');
        }
        return $next($request);
    }
}
