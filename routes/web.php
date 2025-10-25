<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Aqui estão registradas as rotas web da aplicação.
|
*/

Route::get('/', function () {
    return view('welcome');
});
