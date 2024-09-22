<?php

return [

    'defaults' => [
        'guard' => env('AUTH_GUARD', 'web'),
        'passwords' => env('AUTH_PASSWORD_BROKER', 'users'),
    ],

    'guards' => [
        'web' => [
            'driver' => 'session',
            'provider' => 'users',
        ],

        'api' => [
            'driver' => 'token',
            'provider' => 'users',
            'hash' => false,
        ],

        'caretaker' => [
            'driver' => 'session',
            'provider' => 'caretakers',
        ],

        'mental_health_provider' => [
            'driver' => 'session',
            'provider' => 'mental_health_providers',
        ],

        'supplier' => [
            'driver' => 'session',
            'provider' => 'suppliers',
        ],

        'babysitter' => [
            'driver' => 'session',
            'provider' => 'babysitters',
        ],
    ],

    'providers' => [
        'users' => [
            'driver' => 'eloquent',
            'model' => App\Models\User::class,
        ],

        'caretakers' => [
            'driver' => 'eloquent',
            'model' => App\Models\Caretaker::class,
        ],

        'mental_health_providers' => [
            'driver' => 'eloquent',
            'model' => App\Models\MentalHealthProvider::class,
        ],

        'suppliers' => [
            'driver' => 'eloquent',
            'model' => App\Models\Supplier::class,
        ],

        'babysitters' => [
            'driver' => 'eloquent',
            'model' => App\Models\Babysitter::class,
        ],
    ],

    'passwords' => [
        'users' => [
            'provider' => 'users',
            'table' => env('AUTH_PASSWORD_RESET_TOKEN_TABLE', 'password_reset_tokens'),
            'expire' => 60,
            'throttle' => 60,
        ],

        'caretakers' => [
            'provider' => 'caretakers',
            'table' => env('AUTH_PASSWORD_RESET_TOKEN_TABLE', 'password_reset_tokens'),
            'expire' => 60,
            'throttle' => 60,
        ],

        'therapists' => [
            'provider' => 'therapists',
            'table' => env('AUTH_PASSWORD_RESET_TOKEN_TABLE', 'password_reset_tokens'),
            'expire' => 60,
            'throttle' => 60,
        ],
    ],

    'password_timeout' => env('AUTH_PASSWORD_TIMEOUT', 10800),

];
