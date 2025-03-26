<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\NoticiaController;
use App\Models\Usuario;

Route::get('/', function () {
    return view('index');
})->name('index');

Route::get('/login-page', function () {
    return view('auth.login');
})->name('tela-login');

Route::get('/register-page', function () {
    return view('auth.register');
})->name('tela-registro');

Route::get('/main-page', function () {
    $noticias = \App\Models\Noticia::where('status', 1)->get();
    return view('main', compact('noticias'));
})->name('main-page')->middleware('auth');

Route::get('/usuarios', function () {
    $usuarios = Usuario::all();
    return view('admin.users', compact('usuarios'));
})->name('painel-usuario')->middleware('auth');


Route::get('/post-noticia', [NoticiaController::class, 'create'])
    ->name('painel-noticia')
    ->middleware('auth');

Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/registrar', [AuthController::class, 'registrar'])->name('registrar');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::post('/usuarios/{id}/alterar-permissao', [UserController::class, 'alterarNivel'])
    ->name('alterar-nivel')
    ->middleware('auth');

Route::post('/post-noticia', [NoticiaController::class, 'store'])->name('noticias-store');

// Rotas para o painel de moderação e ações sobre notícias
Route::get('/painel-noticia', [NoticiaController::class, 'painelModeracao'])
    ->name('painel-noticias')
    ->middleware('auth');

Route::post('/painel-noticia/{id}/aprovar', [NoticiaController::class, 'aprovar'])
    ->name('noticias-aprovar');

Route::post('/noticias/{id}/reprovar', [NoticiaController::class, 'reprovar'])
    ->name('noticias-reprovar');
