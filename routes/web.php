<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;


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


Route::get('/reservas/{aula}', function ($aula) {

    $aulas = [
    'laboratorio-a' => 'Laboratorio de cómputo A',
    'laboratorio-b' => 'Laboratorio de cómputo B',
    'laboratorio-c' => 'Laboratorio de cómputo C',
    'auditorio-p2' => 'Auditorio P2',
    'auditorio-pb' => 'Auditorio PB',
];

    if (!array_key_exists($aula, $aulas)) {
        abort(404);
    }

    return view('reservas.calendario', [
        'nombreAula' => $aulas[$aula],
        'aula' => $aula
    ]);

})->name('reservas.calendario');
