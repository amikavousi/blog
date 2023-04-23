<?php

namespace LoginRegisterApp\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;

class RegisterValidation
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
        if ($validator->fails()) {
            $errors = [];
            foreach ($validator->errors()->getMessages() as $field => $error) {
                $errors[] = [
                    'field' => $field,
                    'error' => $error
                ];
            }

            return response(['fail' => $errors], 422);
        }
        return $next($request);
    }

    private function getData()
    {
        return \request()->only([
            'name',
            'username',
            'email',
            'password'
        ]);
    }

    private function getRules()
    {
        return [
            'name' => ['required'],
            'username' => ['required', 'unique:users', 'alpha'],
            'email' => ['nullable', 'unique:users', 'email'],
            'password' => ['required', Password::min('8')]
        ];
    }
}
