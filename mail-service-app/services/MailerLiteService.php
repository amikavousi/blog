<?php

namespace MailServiceApp\services;

use MailerLite\MailerLite;

class MailerLiteService
{
    private $mailerLite;

    public function __construct(MailerLite $mailerLite)
    {
        $this->mailerLite = $mailerLite;
    }

    public function newSub($email)
    {
        $data = [
            'email' => $email,
        ];

        $response = $this->mailerLite->subscribers->create($data);
        dd($response);
    }

    public function allSub()
    {
        $mailerLite = new MailerLite(['api_key' => config('services.mail.mailer_lite.key')]);

        $response = $mailerLite->subscribers->get();
        dd($response);
    }
}
