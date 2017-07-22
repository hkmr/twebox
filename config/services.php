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
    ],

    'ses' => [
        'key' => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => 'us-east-1',
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model' => App\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],
    
    // socialite providers...
    'facebook' => [
        'client_id' => '679079478945205',
        'client_secret' => '0716246e5bac0ea0a0f19a747dd3c239',
        'redirect' => 'http://localhost:8000/auth/facebook/callback',
    ],

    'twitter' => [
        'client_id' => 'J9DYZIPpfFhs0aMmuPdvB8RAB',
        'client_secret' => 'm0eiMJH1Y4qkpRCKXpa1i2fZZruyirpKdnjTbc2Pmnc5X9GRkM',
        'redirect' => 'http://localhost:8000/auth/twitter/callback',
    ],

    'google' => [
        'client_id' => '631544920182-jle68bd250stgqsrudjprb0liprketvg.apps.googleusercontent.com',
        'client_secret' => 'YfxsVreXlHr3HSHYJIYdI4mq',
        'redirect' => 'http://localhost:8000/auth/google/callback',
    ],

];
