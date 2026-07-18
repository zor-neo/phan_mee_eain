<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Upload Storage Write Check
    |--------------------------------------------------------------------------
    |
    | When enabled, /health writes and deletes a tiny file on the configured
    | uploads disk. Leave disabled for normal uptime checks to avoid adding
    | storage traffic on every probe.
    |
    */

    'storage_write' => env('HEALTH_CHECK_STORAGE_WRITE', false),

];
