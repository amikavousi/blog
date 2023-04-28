<?php

namespace MailServiceApp\services;

use MailchimpMarketing\ApiClient;

class MailChimpService implements MailServicesInterface
{
    /**
     * @var ApiClient
     */
    private $client;

    public function __construct(ApiClient $client)
    {
        $this->client = $client;
    }

    public function newSub($email)
    {
        $data = [
            'email_address' => $email,
            "status" => "subscribed"
        ];
        // get your list id from lists->getAllLists() list
        $sub_list_id = '19f2bbafda';

         return $this->client->lists->addListMember($sub_list_id, $data);
    }
}
