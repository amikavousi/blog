<?php

namespace LoginRegisterApp\Controller;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use LoginRegisterApp\DB\FindUser;
use LoginRegisterApp\DB\StoreUser;

class LoginRegisterController extends Controller
{
    public function showRegisterForm()
    {
        return view('LoginRegisterApp::register');
    }

    public function register(Request $request)
    {
        $user = StoreUser::store($request);
        auth()->login($user);

        return redirect(route('posts.all'))->with('success', 'Your account successfully created');
    }

    public function showLoginForm()
    {
        return view('LoginRegisterApp::login');
    }

    public function login()
    {
        $user = FindUser::findUser(request(['emailOrUsername']));
        auth()->login($user);
        session()->regenerate();
        return redirect(route('posts.all'))->with('success',  "Hi " .  auth()->user()->name . ' ;)');
    }

    public function logout()
    {
        auth()->logout();
        session()->regenerate();
        return redirect(route('posts.all'))->with('success', 'GoodBye :)');
    }
}
