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

    'google' => [
        'client_id' => '338040461821-kafgg0kho3s8aktganj2ebs864grsluq.apps.googleusercontent.com',
        'client_secret' => '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',
        'redirect' => 'http://127.0.0.1:8000/login/google/callback',
    ],

    'facebook' => [
        'client_id' => '1418520688561945',
        'client_secret' => '2f5fbe59554c0ab947c914ecd72edd63',
        'redirect' => 'http://127.0.0.1:8000/login/facebook/callback',
    ],

];
