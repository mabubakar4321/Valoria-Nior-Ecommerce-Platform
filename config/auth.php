<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Authentication Defaults
    |--------------------------------------------------------------------------
    */

    'defaults' => [
        // Default guard for normal users
        'guard' => 'web',

        // Default password broker
        'passwords' => 'users',
    ],

   

    'guards' => [

        // Normal users
        'web' => [
            'driver' => 'session',
            'provider' => 'users',
        ],

        // Admins (separate auth system)
        'admin' => [
            'driver' => 'session',
            'provider' => 'admins',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | User Providers
    |--------------------------------------------------------------------------
    */

    'providers' => [

        // Users table
        'users' => [
            'driver' => 'eloquent',
            'model' => App\Models\User::class,
        ],

        // Admins table
        'admins' => [
            'driver' => 'eloquent',
            'model' => App\Models\Admin::class,
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Resetting Passwords
    |--------------------------------------------------------------------------
    */

    'passwords' => [

        // User password reset
        'users' => [
            'provider' => 'users',
            'table' => 'password_reset_tokens',
            'expire' => 60,
            'throttle' => 60,
        ],

        // Admin password reset (IMPORTANT)
        'admins' => [
            'provider' => 'admins',
            'table' => 'password_reset_tokens',
            'expire' => 60,
            'throttle' => 60,
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Password Confirmation Timeout
    |--------------------------------------------------------------------------
    */

    'password_timeout' => 10800,

];