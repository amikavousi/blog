<?php

namespace MailServiceApp\services;

use MailerLite\MailerLite;

class MailerLiteService
{
    private $apikey;

    public function __construct($apikey)
    {
        $this->apikey = $apikey;
    }

    public function newSub($email)
    {
        $mailerLite = new MailerLite(['api_key' => $this->apikey]);

        $data = [
            'email' => $email,
        ];

        $response = $mailerLite->subscribers->create($data);
        dd($response);
    }

    public function allSub()
    {
        $mailerLite = new MailerLite(['api_key' => config('services.mail.mailer_lite.key')]);

        $response = $mailerLite->subscribers->get();
        dd($response);
    }
}
