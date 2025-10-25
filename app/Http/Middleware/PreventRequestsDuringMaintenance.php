<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\PreventRequestsDuringMaintenance as Middleware;

class PreventRequestsDuringMaintenance extends Middleware
{
    /**
     * Os URIs que devem ser acessíveis durante manutenção.
     */
    protected $except = [
        //
    ];
}

