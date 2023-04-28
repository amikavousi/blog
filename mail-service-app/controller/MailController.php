<?php

namespace MailServiceApp\controller;

use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use MailServiceApp\services\MailServicesInterface;

class MailController extends Controller
{
    public function __invoke(MailServicesInterface $mail)
    {
        try {
            $mail->newSub(request('email'));
            return redirect()->back()->with('success', 'You are now subscribed');
        } catch (\Exception $exception) {
            $error = Str::between($exception->getMessage(), 'title":"', '",') ?? 'something wrongs :(';
            return redirect()->back()->with('failed', $error);
        }
    }
}
