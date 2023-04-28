<?php

namespace MailServiceApp\services;

use MailerLite\MailerLite;

class MailerLiteService implements MailServicesInterface
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

         $this->mailerLite->subscribers->create($data);
    }
}
