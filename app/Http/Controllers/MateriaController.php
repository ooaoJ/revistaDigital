<?php

namespace App\Http\Controllers;

use App\Models\Materia;
use Illuminate\Http\Request;


class MateriaController extends Controller
{
    public function show($id)
    {
        $materia = Materia::with(['noticias' => function ($query){
            $query->where('status', 1);
        }])->findOrFail($id);
        
        return view('notice', compact('materia'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:100'
        ]);

        Materia::create([
            'nome' => $request->nome
        ]);

        return redirect()->back()->with('success', 'Matéria criada com sucesso!');
    }

    public function destroy($id)
    {
        $materia = Materia::findOrFail($id);
        $materia->delete();
    
        return redirect()->back()->with('success', 'Matéria deletada com sucesso!');
    }

}

