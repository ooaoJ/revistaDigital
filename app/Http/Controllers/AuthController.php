<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function registrar(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:100',
            'email' => 'required|email|unique:usuarios,email',
            'password' => 'required|min:6',
        ], [
            'email.unique' => 'Este email já foi cadastrado.',
            'password.min' => 'A senha deve conter no mínimo 6 caracteres.'
        ]);

        Usuario::create([
            'nome' => $request->nome,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('tela-login')->with('success', 'Usuário cadastrado com sucesso!');
    }

    public function login(Request $request)
    {   
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        $usuario = Usuario::where('email', $request->email)->first();

        if ($usuario && Hash::check($request->password, $usuario->password))
        {
            Auth::login($usuario);
            
            return redirect()->route('main-page')->with('success', 'Usuário logado com sucesso!');
        }

        return back()->withErrors(['email' => 'As credenciais não são válidas.']);
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('tela-login')->with('success', 'Você saiu com sucesso.');
    }
}
