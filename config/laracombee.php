<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Database Id and token.
    |--------------------------------------------------------------------------
    |
    | Here where you can define your database ID and recombee token.
    |
    */

    'database' => env('LARACOMBEE_DATABASE'),
    'token'    => env('LARACOMBEE_TOKEN'),

    /*
    |--------------------------------------------------------------------------
    | Recombee Timeout.
    |--------------------------------------------------------------------------
    |
    | Here where you can define recombee response timeout in milliseconds.
    |
    */

    'timeout'  => env('LARACOMBEE_TIMEOUT'),

    'protocol' => env('LARACOMBEE_PROTOCOL'),
];
