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
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],
    'facebook' => [
        'client_id' => '347690816516589',
        'client_secret' => 'ad020aeda3562e46bc7d4640c46d2b6c',
        'redirect' => 'http://localhost:8000/login/facebook/callback',

    ],
    // 'google' => [
    //     'client_id' => '735176153944047',
    //     'client_secret' => 'f87b7506b4895e17e3b213d0cba66a08',
    //     'redirect' => 'http://localhost:8000/login/google/callback',

    // ],

];
