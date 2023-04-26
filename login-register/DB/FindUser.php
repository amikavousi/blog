<?php

namespace LoginRegisterApp\DB;

use Exception;
use App\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Client\Request;

class FindUser
{
    public static function findUser($request)
    {
        try {
            return User::query()->where('email', '=', $request['emailOrUsername'])
                ->orWhere('username', '=', $request['emailOrUsername'])
                ->first();

        } catch (ModelNotFoundException | Exception $exception) {
            report($exception);
            return abort(500, 'Bad Request');
        }
    }
}
