<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Aqui estão registradas as rotas web da aplicação.
| Todas as rotas (exceto API) servem a mesma view para SPA Vue.js
|
*/

// Rota catch-all para SPA - todas as rotas web servem a mesma view
Route::any('/{any}', function () {
    return view('welcome');
})->where('any', '^(?!api).*$');
