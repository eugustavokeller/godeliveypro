<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\TrimStrings as Middleware;

class TrimStrings extends Middleware
{
    /**
     * Os nomes de atributos que não devem ser limpos.
     */
    protected $except = [
        'current_password',
        'password',
        'password_confirmation',
    ];
}

