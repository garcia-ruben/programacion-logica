<?php

namespace App\Http\Middleware;
class VerifyCsrfToken
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        'api_upd_option_esp32',
    ];
}
