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

        'usuarios' => [
            'driver' => 'session',
            'provider' => 'usuarios',
        ],

        'guardaparques' => [
            'driver' => 'session',
            'provider' => 'usuarios', // Asegúrate de que el provider corresponde al modelo correcto
        ],
    ],

    'providers' => [
        'users' => [
            'driver' => 'eloquent',
            'model' => App\Models\User::class,
        ],

        'usuarios' => [
            'driver' => 'eloquent',
            'model' => App\Models\Usuario::class, // Asegúrate de que el modelo Usuario existe
        ],
    ],

    'passwords' => [
        'users' => [
            'provider' => 'users',
            'table' => env('AUTH_PASSWORD_RESET_TOKEN_TABLE', 'password_reset_tokens'),
            'expire' => 60,
            'throttle' => 60,
        ],
    ],

    'password_timeout' => env('AUTH_PASSWORD_TIMEOUT', 10800),

];
