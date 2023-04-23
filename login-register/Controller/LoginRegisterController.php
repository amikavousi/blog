<?php

namespace LoginRegisterApp\Controller;

use App\Models\User;

class LoginRegisterController
{
    public function showRegisterForm()
    {
        return view('LoginRegisterApp::register');
    }

    public function register()
    {
        return User::query()->create(request()->all());
    }
}
