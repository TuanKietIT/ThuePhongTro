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
        'scheme' => 'https',
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
        'client_id' => '947040113370316',  //client face của bạn
        'client_secret' => '483fd22f638ece7c6c34cb539a5cfbbb',  //client app service face của bạn
        'redirect' => 'http://localhost/project/thanhvien/facebook/callback' //callback trả về
    ],
    
    'google' => [
        'client_id' => '587558366742-n2gl781eut9f848gjmfr5t6ujsghmkkd.apps.googleusercontent.com',
        'client_secret' => 'ZkIGxQR7Js7yemREjaC8LGnU',
        'redirect' => 'http://localhost/tutorial_youtube/shopbanhanglaravel/google/callback' 
    ],

];
