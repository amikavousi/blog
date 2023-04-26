<?php

namespace LoginRegisterApp\DB;

use App\Models\User;
use Illuminate\Http\Request;

class StoreUser
{
    public static function store(Request $request)
    {
        try {
           return User::query()->create($request->only('name', 'username', 'email', 'password'));
        } catch (\Exception $exception) {
            report($exception);
            return abort(500);
        }
    }
}
