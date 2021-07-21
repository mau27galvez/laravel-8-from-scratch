<?php

namespace App\Services;

use MailchimpMarketing\ApiClient;

class Newsletter
{
    public function __construct(protected ApiClient $client)
    {
        $this->client->setConfig([
            'apiKey' => config('services.mailchimp.key'),
            'server' => config('services.mailchimp.server_prefix'),
        ]);
    }

    public function suscribe($email)
    {
        return $this->client->lists->addListMember(config('services.mailchimp.main_list_id'), [
            'email_address' => $email,
            'status' => 'subscribed',
        ]);
    }
}
