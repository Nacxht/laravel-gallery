<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'mailgun' => [
        'domain' => $_SERVER('MAILGUN_DOMAIN'),
        'secret' => $_SERVER('MAILGUN_SECRET'),
        'endpoint' => $_SERVER('MAILGUN_ENDPOINT', 'api.mailgun.net'),
        'scheme' => 'https',
    ],

    'postmark' => [
        'token' => $_SERVER('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => $_SERVER('AWS_ACCESS_KEY_ID'),
        'secret' => $_SERVER('AWS_SECRET_ACCESS_KEY'),
        'region' => $_SERVER('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

];
