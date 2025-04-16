<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\NoticiaController;
use App\Http\Controllers\MateriaController;
use App\Models\Usuario;
use App\Models\Materia;
use App\Models\Noticia;

// Rota para chamar o index
Route::get('/', function () {
    if (Auth::check()) {
        return redirect()->route('main-page');
    }
    return view('index');
})->name('index');

// Rota para chamar a tela de login
Route::get('/login-page', function () {
    if (Auth::check()){
        return redirect()->route('main-page');
    }
    return view('auth.login');
})->name('tela-login');

// Rota para chamar a tela de registro
Route::get('/register-page', function () {
    if (Auth::check()){
        return redirect()->route('main-page');
    }
    return view('auth.register');
})->name('tela-registro');

// Rota para chamar a pagina principal da aplicação
Route::get('/main-page', function () {
    $noticias = Noticia::orderBy('created_at', 'desc')->limit(3)->get();
    return view('main', compact('noticias'));
})->name('main-page')->middleware('auth');

// Rota para chamar todos os usuarios na tela de painel de usuarios
Route::get('/usuarios', function () {
    $usuarios = Usuario::all();
    if(Auth::user()->nivel != 4){
        return redirect()->route('main-page');
    }
    
    return view('admin.users', compact('usuarios'));
})->name('painel-usuario')->middleware('auth');

// Rota para chamar a função de criar noticia
Route::get('/post-noticia', [NoticiaController::class, 'create'])
    ->name('painel-noticia')
    ->middleware('auth');

// Rota para chamar a função de login
Route::post('/login', [AuthController::class, 'login'])->name('login');

// Rota para chamar a função de registro
Route::post('/registrar', [AuthController::class, 'registrar'])->name('registrar');

// Rota para chamar a função de logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Rota para chamar a função de alterar permissão de um usuário
Route::post('/usuarios/{id}/alterar-permissao', [UserController::class, 'alterarNivel'])
    ->name('alterar-nivel')
    ->middleware('auth');

// Rota para chamar a função de armazenar de noticias
Route::post('/post-noticia', [NoticiaController::class, 'store'])
    ->name('noticias-store');

// Rota para chamar a a função de ver as noticias em aguardo
Route::get('/painel-noticia', [NoticiaController::class, 'painelModeracao'])
    ->name('painel-noticias')
    ->middleware('auth');

// Rota para chamar a função de aprovar uma notícia
Route::post('/painel-noticia/{id}/aprovar', [NoticiaController::class, 'aprovar'])
    ->name('noticias-aprovar');

// Rota para chamar a função de reprovar uma notícia
Route::post('/noticias/{id}/reprovar', [NoticiaController::class, 'reprovar'])
    ->name('noticias-reprovar');


// Rota para chamar a função de mostrar matéria por ID
Route::get('/materia/{id}', [MateriaController::class, 'show'])->name('materia-show');


Route::get('/noticia/{id}', [NoticiaController::class, 'show'])->name('noticia-show');


Route::get('/perfil-usuario', function(){
    $materias = Materia::all();
    $noticias = Noticia::all();
    return view('acount', compact('materias', 'noticias'));
})->name('perfil-usuario');

Route::post('/usuarios', [AuthController::class, 'registrarAdmin'])->name('registrar-admin');


Route::get('/materias', function(){
    if(Auth::user()->nivel != 4){
        return redirect()->route('main-page');
    }
    $materias = Materia::all();
    return view('admin.materias', compact('materias')); 
})->name('painel-materias');

Route::post('/materias', [MateriaController::class, 'store'])->name('materias-store');


Route::get('/noticias', function(){
    if(Auth::user()->nivel != 4){
        return redirect()->route('main-page');
    }
    $noticias = Noticia::all();
    $materias = Materia::all();
    return view('admin.noticias', compact('noticias' , 'materias')); 
})->name('painel-noticias');

Route::delete('/materias/{id}', [MateriaController::class, 'destroy'])->name('materias.destroy')->middleware('auth');;
