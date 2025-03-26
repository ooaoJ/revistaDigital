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
}

