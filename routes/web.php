<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\NoticiaController;
use App\Models\Usuario;

Route::get('/', function () { return view('index'); })->name('index');





Route::get('/login-page', function () { return view('auth.login'); })->name('tela-login');
Route::get('/register-page', function () { return view('auth.register'); })->name('tela-registro');

Route::get('/main-page', function (){ 
    $noticias = \App\Models\Noticia::where('status', 1)->get();
    return view('main', compact('noticias')); 
})->name('main-page')->middleware('auth');

Route::get('/usuarios', function () { $usuarios = Usuario::all(); return view('admin.users', compact('usuarios')); })->name('painel-usuario')->middleware('auth');
Route::get('/noticias', function() { return view('admin.post');})->name('painel-noticia');


Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/registrar', [AuthController::class, 'registrar'])->name('registrar');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::post('/usuarios/{id}/alterar-permissao', [UserController::class, 'alterarNivel'])->name('alterar-nivel')->middleware('auth');
Route::post('/noticias', [NoticiaController::class, 'store'])->name('noticias-store');


//noticias
Route::get('/painel-noticias', [NoticiaController::class, 'painelModeracao'])->name('painel-noticias')->middleware('auth');

Route::post('/noticias/{id}/aprovar', [NoticiaController::class, 'aprovar'])->name('noticias-aprovar');
Route::post('/noticias/{id}/reprovar', [NoticiaController::class, 'reprovar'])->name('noticias-reprovar');