<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Configuration\Middleware;
class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        'ajax_upd_option',
    ];
}
