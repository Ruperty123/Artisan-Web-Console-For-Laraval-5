<?php

    return [

        /*
        |--------------------------------------------------------------------------
        | Middleware that should be used on console routes
        |--------------------------------------------------------------------------
        |
        | We recommend to add middleware, that checks User`s role
        | to allow use console only for admins or something like that.
        | Always remember about your app`s security!
        |
        */

        'middleware' => [
            'web',
            'auth',
            // 'another middleware or your custom...'
        ],

        /*
        |--------------------------------------------------------------------------
        | Routes prefix that should be added to console`s page URL
        |--------------------------------------------------------------------------
        |
        | EXAMPLE: http://your-domain.com/artisan-console/interface
        |
        */

        'routes_prefix' => 'artisan-console',

        /*
        |--------------------------------------------------------------------------
        | Should package write command log
        |--------------------------------------------------------------------------
        */

        'write_log' => false,

    ];