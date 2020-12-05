<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, SparkPost and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
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

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model' => App\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
        'webhook' => [
            'secret' => env('STRIPE_WEBHOOK_SECRET'),
            'tolerance' => env('STRIPE_WEBHOOK_TOLERANCE', 300),
        ],
    ],
    'facebook' => [
        'client_id' => '208251227064009',  //client face của bạn
        'client_secret' => '2d1c4a61ec283b1e63a484860f290b59',  //client app service face của bạn
        'redirect' => 'http://localhost/tutorial_youtube/shopbanhanglaravel/admin/callback' //callback trả về
    ],
    
    'google' => [
        'client_id' => '587558366742-n2gl781eut9f848gjmfr5t6ujsghmkkd.apps.googleusercontent.com',
        'client_secret' => 'ZkIGxQR7Js7yemREjaC8LGnU',
        'redirect' => 'http://localhost/tutorial_youtube/shopbanhanglaravel/google/callback' 
    ],



];
