<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/login');
});

Route::get('/register', function () {
    return view('auth.register');
})->name('register');

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::get('/pagina-principal', function () {
    return response()->file(
        resource_path('views/Pagina_principal.php')
    );
})->name('pagina.principal');