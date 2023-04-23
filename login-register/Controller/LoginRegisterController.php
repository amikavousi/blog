<?php

namespace LoginRegisterApp\Controller;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LoginRegisterController extends Controller
{
    public function showRegisterForm()
    {
        return view('LoginRegisterApp::register');
    }

    public function register(Request $request)
    {
        return User::query()->create($request->only('name', 'username', 'email', 'password'));
    }
}
