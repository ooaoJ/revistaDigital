<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function alterarNivel(Request $request, $id)
    {
        $authUser = Auth::user();

        if ($authUser->id == $id) {
            return redirect()->back()->with('error', 'Você não pode alterar seu próprio nível.');
        }

        $request->validate([
            'nivel' => 'required|integer|min:0|max:4'
        ]);

        $usuario = Usuario::findOrFail($id);
        $usuario->nivel = $request->nivel;
        $usuario->save();

        return redirect()->back()->with('success', 'Permissão do usuário atualizada com sucesso.');
    }

}
