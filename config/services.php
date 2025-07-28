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

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'resend' => [
        'key' => env('RESEND_KEY'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'slack' => [
        'notifications' => [
            'bot_user_oauth_token' => env('SLACK_BOT_USER_OAUTH_TOKEN'),
            'channel' => env('SLACK_BOT_USER_DEFAULT_CHANNEL'),
        ],
    ],

    'google_script' => [
        'url' => env('GOOGLE_SCRIPT_URL', 'https://script.google.com/macros/s/AKfycbyUm6yNoO8uoXfqJju52OkuGyTPBHPQnBfbsQE8CIPR106WA7EqpA3E5FgNjq1uxvDx/exec'),
        'timeout' => env('GOOGLE_SCRIPT_TIMEOUT', 30),
        'verify_ssl' => env('GOOGLE_SCRIPT_VERIFY_SSL', false), // Set to true in production
        'retry_times' => env('GOOGLE_SCRIPT_RETRY_TIMES', 3),
        'retry_delay' => env('GOOGLE_SCRIPT_RETRY_DELAY', 1000),
    ],

];
