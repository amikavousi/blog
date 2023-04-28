<?php

namespace MailServiceApp\controller;

use App\Http\Controllers\Controller;
use Illuminate\Validation\ValidationException;
use MailServiceApp\services\MailerLiteService;

class MailController extends Controller
{
    public function __invoke(MailerLiteService $mailer)
    {
        try {
            $mailer->newSub(request('email'));
        } catch (\Exception $exception) {
            throw ValidationException::withMessages($exception);
        }
    }
}
